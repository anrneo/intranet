<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Notifications\NotiHelpDesk;

class HomeController extends Controller
{
    

    public function ajax()
    {
        return view('ajax');
    }

    public function datajax()
    {
        $cc=$_GET['cc'];
        $reports=DB::select("SELECT * FROM users where cedula=$cc");      
          return  $reports;
    }

    public function datajax1()
    {
        $cc=$_POST['cc'];
        $users = DB::connection('sqlsrv')->select("SELECT * FROM sis_paci where fecha_naci='20030213' and num_id='1000100081'");

        //$reports=DB::select("SELECT * FROM users where cedula=$cc");      
          return  $users;
    }
   
    public function felicita($id)
    {
        $report = User::find($id);
        $comment = ([
            'usuario' => Auth()->user()->name,
            'user_id' => Auth()->user()->id,
            'post_id' => $report->id,
            'nom_cumple' => $report->name,
            'accion' => 'felicitar'
        ]);
        
        if ($comment['user_id'] != $comment['post_id']) {
        $user = User::find($id); 
        //dd($user);
        $user->notify(new NotiHelpDesk($comment));
        }

        $notificacion = array(
            'message' => 'Gracias! Su felicitación se envió con exito.', 
            'alert-type' => 'success'
        );
        return redirect('/')->with($notificacion);
    }

    public function borrarfeli($id)
    {
        
        DB::table('notifications')
        ->where('id', $id)
        ->update(['read_at' => now()]);   

        $notificacion = array(
            'message' => 'Gracias! Su felicitación se envió con exito.', 
            'alert-type' => 'success'
        );
        return back();
    }
    public function index()
    {
        
        $reports=DB::select("SELECT name, cumple,sede, id,  DAYOFYEAR(nacimi) as dia, nacimi FROM users having dia>=DAYOFYEAR(now()) order by dia limit 6");
        foreach ($reports as $key => $value) {
            # code...
        }
        $a=explode('-',$value->nacimi);
        $b=explode('-',date('Y-m-d'));
            //dd($a,$b);
        return view('welcome', compact('reports'));
    }

    public function excel()
    {
        /** Fuente de Datos Eloquent */
        $data = User::all();
        $data1=collect(DB::select("SELECT * from users"));
        //dd($data, $data1);
        /** Creamos nuestro archivo Excel */
        Excel::create('usuarios', function ($excel) use ($data) {
            /** Creamos una hoja */
            $excel->sheet('Hoja Uno', function ($sheet) use ($data) {
                /**
                 * Insertamos los datos en la hoja con el método with/fromArray
                 * Parametros: (
                 * Datos,
                 * Valores del encabezado de la columna,
                 * Celda de Inicio,
                 * Comparación estricta de los valores del encabezado
                 * Impresión de los encabezados
                 * )*/
                $sheet->with($data, null, 'A1', false, false);
            });
            /** Descargamos nuestro archivo pasandole la extensión deseada (xls, xlsx) */
        })->download('xlsx');
    }

   

    public function certificado()
    {

        $ced=Auth()->user()->cedula;
        $users = DB::connection('sqlsrv1')->select('SELECT * FROM certificado_emp where Identificacion ='.$ced.'');
        
        $letras = NumeroALetras::convertir($users[0]->SueldoBasico);
      if($users[0]->SueldoBasico%1000000==0){
        $letras .= 'DE ';
      }
        //dd($letras);
       
        $pdf = PDF::loadView('pdf', ['letras' => $letras], ['users' => $users]);

        return $pdf->download('certificado_'.$users[0]->Identificacion.'.pdf');
        
         
    }
}
