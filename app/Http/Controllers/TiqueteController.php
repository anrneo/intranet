<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Datos;
use Illuminate\Support\Facades\DB;
use App\Tiquete;

class TiqueteController extends Controller
{
    public function __constuct(){
        $this->middleware('auth');
    }

    public function reportartiq()
    {
        $dat = new Datos;
        $sedes = $dat->sedes();
        
        return view('tiquetes.reportar', compact('sedes'));
    }

    public function consultacc(Request $req)
    {
       
        $cc=$req->cc;
        $users = DB::connection('sqlsrv')->select("SELECT  
        SOD.tipo_id,
        SOD.MedicoAsignado,
        SOD.primer_nom,
        SOD.segundo_nom,
        SOD.primer_ape,
        SOD.segundo_ape,
        SOD.telefono,
        SOD.celular,
        SOD.direccion,
        SOD.PuntoAtencion,
        SOD.email,
        SOD.num_id,
        SOD.NombreCompleto,
        PA.nombre as puntoAtencion,
        SOD.fecha_naci
       FROM sis_paci SOD 
       INNER JOIN puntoAtencion PA ON SOD.PuntoAtencion = PA.Id
       WHERE SOD.num_id = '$cc'
       AND EstadoAfiliado = 1
       ");        //dd($users);
        return $users;
    }

    public function cc()
    {
        //$users = DB::connection('sqlsrv')->select("SELECT top 1000 num_id FROM sis_paci WHERE EstadoAfiliado = 1");
        //$users = DB::connection('sqlsrv')->select("SELECT * FROM sis_paci WHERE num_id = '1000100081'");
        $users = DB::connection('sqlsrv')->select("select name from sysobjects where type='U'");
        dd($users);
        return $users;
        /*CREATE PROC BuscaValorEnBBDD
        (
        @StrValorBusqueda nvarchar(100)
        )
        AS
        BEGIN
        
        CREATE TABLE #Resultado (NombreColumna nvarchar(370), ValorColumna nvarchar(3630))
        SET NOCOUNT ON
        
        DECLARE @NombreTabla nvarchar(256),
        @NombreColumna nvarchar(128),
        @StrValorBusqueda2 nvarchar(110)
        
        SET  @NombreTabla = ''
        SET @StrValorBusqueda2 = QUOTENAME('%' + @StrValorBusqueda + '%','''')
        
        WHILE @NombreTabla IS NOT NULL
             BEGIN
             SET @NombreColumna = ''
             SET @NombreTabla =
             (SELECT MIN(QUOTENAME(TABLE_SCHEMA) + '.' + QUOTENAME(TABLE_NAME))
             FROM INFORMATION_SCHEMA.TABLES
             WHERE TABLE_TYPE = 'BASE TABLE'
             AND QUOTENAME(TABLE_SCHEMA) + '.' + QUOTENAME(TABLE_NAME) > @NombreTabla
             AND OBJECTPROPERTY(
             OBJECT_ID(QUOTENAME(TABLE_SCHEMA) + '.' + QUOTENAME(TABLE_NAME)), 'IsMSShipped') = 0)
            
             WHILE (@NombreTabla IS NOT NULL) AND (@NombreColumna IS NOT NULL)
                 BEGIN
                 SET @NombreColumna =
                 (SELECT MIN(QUOTENAME(COLUMN_NAME))
                 FROM INFORMATION_SCHEMA.COLUMNS
                 WHERE TABLE_SCHEMA = PARSENAME(@NombreTabla, 2)
                 AND TABLE_NAME = PARSENAME(@NombreTabla, 1)
                 AND DATA_TYPE IN ('char', 'varchar', 'nchar', 'nvarchar')
                 AND QUOTENAME(COLUMN_NAME) > @NombreColumna)
            
                 IF @NombreColumna IS NOT NULL
                      BEGIN
                      INSERT INTO #Resultado
                      EXEC
                      ('SELECT ''' + @NombreTabla + '.' + @NombreColumna + ''', LEFT(' + @NombreColumna + ', 3630)
                      FROM ' + @NombreTabla + ' (NOLOCK) ' + ' WHERE ' + @NombreColumna + ' LIKE ' + @StrValorBusqueda2)
                      END 
                 END
             END
             SELECT NombreColumna, ValorColumna FROM #Resultado
        END
        EXEC dbo.BuscaValorEnBBDD 'texto'*/ 
    }

    public function postreportartiq(Request $req)
    {
      
            $path1 = $req->file('copy_his')->store('upload_tiquete');
            $path2 = $req->file('copy_cc')->store('upload_tiquete');
            $path3 = $req->file('copy_os')->store('upload_tiquete');
            
        
            $genreport = new Tiquete;
            $genreport -> nom_user = $req->input('nom_user');
            $genreport -> pa_user = $req->input('pa_user');
            $genreport -> id_user = $req->input('id_user');
            $genreport -> cel_user = $req->input('cel_user');
            $genreport -> naci_user = $req->input('naci_user');
            $genreport -> mail_user = $req->input('mail_user');
            $genreport -> sede = $req->input('sede');
            $genreport -> t_trans = $req->input('t_trans');
            $genreport -> dpto1 = $req->input('dpto1');
            $genreport -> ciudad1 = $req->input('ciudad1');
            $genreport -> dpto2 = $req->input('dpto2');
            $genreport -> ciudad2 = $req->input('ciudad2');
            $genreport -> obs = $req->input('obs');
            $genreport -> nom_ase = Auth()->user()->name;
            $genreport -> id_ase = Auth()->user()->id;
            $genreport -> path1 = $path1;
            $genreport -> path2 = $path2;
            $genreport -> path3 = $path3;
            $genreport ->save();

        $notificacion = array(
            'message' => 'Gracias! Su solcitud se envió con exito.', 
            'alert-type' => 'success'
        );
        return back()->with($notificacion);
    }

    public function solicitudestiq()
    {
        $dat = Tiquete::where([['t_trans', 'Aéreo'],['estado', 0]])
               ->get();
        return view('tiquetes.solicitudesae', compact('dat'));
    }

    public function solicitudesterr()
    {
        $dat = Tiquete::where([['t_trans', 'Terrestre'],['estado', 0]])
        ->get();
        return view('tiquetes.solicitudeste', compact('dat'));
    }
}
