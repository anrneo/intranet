<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\HelpDesk;
use App\DocuHelpDesk;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Datos;
use App\Notifications\NotiHelpDesk;
use Mail;
use Validator;

class HelpController extends Controller
{

    public function __constuct(){
        $this->middleware('auth');
    }

    public function getreportar()
    {
        $dat = new Datos;
        $sedes = $dat->sedes();
        $t_std=$dat->tiempos();
        
        return view('help.reportar', compact('sedes'));
    }

    public function postreportar(Request $request)
    {

        /*$validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha'
        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }*/
        if($request->file('archivo')){
        $path = $request->file('archivo')->store('upload_help');
        }else{
            $path = 'Sin archivo';
        }
        $dat = new Datos;
        $subarea = $dat->datos($request->input('subarea'));
        
        $comment = ([
            'usuario' => $request->input('nombre'),
            'subarea' => $subarea,
            'user_id' => Auth()->user()->id,
            'post_id' => $request->input('admin'),
            'accion' => 'reportar'
        ]);
        
        if ($comment['user_id'] != $comment['post_id']) {
        $user = User::find($request->input('admin')); 
        //dd($user);
        $user->notify(new NotiHelpDesk($comment));
        }

        $cat=$request->input('categoria');
        $t_std=$dat->tiempos();
        //dd( $cat);
        if(substr($request->input('subarea'),0,1)!='1' || $cat==null){
            
            $std=$t_std[$request->input('subarea')];
            
        }else{
            $std= $t_std[$cat]['t'];
        }


        
        
        $ingreso=array($request->input('okingreso0'), $request->input('okingreso1'),$request->input('okingreso2'),$request->input('okingreso3'),
                        $request->input('okingreso4'),$request->input('okingreso5'),$request->input('okingreso6'));
        $txtok='- ';
        foreach ($ingreso as $key => $value) {
            if ($value!=null) {
                $txtok.=$value.' - ';
            }
        }
        $retiro=array($request->input('okretiro0'), $request->input('okretiro1'),$request->input('okretiro2'),$request->input('okretiro3'),
                        $request->input('okretiro4'),$request->input('okretiro5'),$request->input('okretiro6'));
                        
            foreach ($retiro as $key => $value) {
                if ($value!=null) {
                    $txtok.=$value.' - ';
                }
            }
        if ($txtok!='- ') {
            $decripcion= $request->input('descripcion').' Tareas Pendientes: '.$txtok;
        }else{
            $decripcion= $request->input('descripcion');
        }

        
        if($request->input('area')=='Sistemas'){
            $data=array('nombre'=>'Fernando','area'=>$request->input('area'), 'usuario'=>$request->input('nombre'), 'asunto'=>$request->input('asunto'),'subarea'=>$subarea);
        Mail::send('help.mail', $data, function($msj){
            //$msj->to('fernando.padron@sumimedical.com')
            $msj->to('carlos.villa@sumimedical.com')
                ->subject('Nuevo Requerimiento del Gestor de Solicitudes: Sistemas');
            });
        }
        if($request->input('area')=='Comunicaciones'){
            $data=array('nombre'=>'Laura','area'=>$request->input('area'), 'usuario'=>$request->input('nombre'), 'asunto'=>$request->input('asunto'),'subarea'=>$subarea);
            Mail::send('help.mail', $data, function($msj){
                $msj->to('carlos.villa@sumimedical.com')
                //$msj->to('lvsumimedical@gmail.com')
                    ->subject('Nuevo Requerimiento del Gestor de Solicitudes: Comunicaciones');
                });
            }
            if($request->input('area')=='Gestión Humana'){
                $data=array('nombre'=>'Paola','area'=>$request->input('area'), 'usuario'=>$request->input('nombre'), 'asunto'=>$request->input('asunto'),'subarea'=>$subarea);
                Mail::send('help.mail', $data, function($msj){
                    $msj->to('carlos.villa@sumimedical.com')
                    //$msj->to('pfonseca@sumimedical.com')
                        ->subject('Nuevo Requerimiento del Gestor de Solicitudes: Gestión Humana');
                    });
                }
                if($request->input('area')=='Compras, Mantenimiento y Mensajería'){
                    $data=array('nombre'=>'Luisa','area'=>$request->input('area'), 'usuario'=>$request->input('nombre'), 'asunto'=>$request->input('asunto'),'subarea'=>$subarea);
                    Mail::send('help.mail', $data, function($msj){
                        //$msj->to('lgiraldo@sumimedical.com')
                        $msj->to('carlos.villa@sumimedical.com')
                            ->subject('Nuevo Requerimiento del Gestor de Solicitudes: Compras, Mantenimiento y Mensajería');
                        });
                    }
        $genreport = new HelpDesk;
        $genreport -> nombre = $request->input('nombre');
        $genreport -> email = $request->input('email');
        $genreport -> cargo = $request->input('cargo');
        $genreport -> sede = $request->input('sede');
        $genreport -> requerimiento = $request->input('requerimiento');
        $genreport -> area = $request->input('area');
        $genreport -> subarea = $subarea;
        $genreport -> categoria = $request->input('categoria');
        $genreport -> admin = $request->input('admin');
        $genreport -> asunto = $request->input('asunto');
        $genreport -> descripcion = $decripcion;
        $genreport -> users_id = Auth()->user()->id;
        $genreport -> archivo = $path;
        $genreport -> t_std = $std;
        $genreport ->save();

        $notificacion = array(
            'message' => 'Gracias! Su requerimiento se envió con exito.', 
            'alert-type' => 'success'
        );
        return back()->with($notificacion);
    }

    public function consultar()
    {
        if(isset($_GET['id'])){
            DB::table('notifications')
            ->where('id', $_GET['id'])
            ->update(['read_at' => now()]);            
        }
        
        //$reports = DB::table('help_desks')->where('users_id', Auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        $user=Auth()->user()->id;
        $reports=DB::select("SELECT *, datediff(f_respuesta, created_at) as dias, datediff(now(), created_at) as dias_sin from help_desks where users_id=$user order by updated_at desc");
        //dd(count($reports));
        $pe=DB::table('help_desks')->where([['users_id', Auth()->user()->id],['estado','!=', 2]])->get();
        $so=DB::table('help_desks')->where([['users_id', Auth()->user()->id],['estado', 2]])->get();
        $pend=$pe->count();
        $solu=$so->count();
        $tot=count($reports);
        
        $dat = new Datos;
        $categoria = $dat->tiempos();

        return view('help.consultar', compact('reports','pend','solu','tot', 'categoria'));
    }

    public function admin()
    {
        if(isset($_GET['id'])){
            DB::table('notifications')
            ->where('id', $_GET['id'])
            ->update(['read_at' => now()]);            
        }
        if(Auth()->user()->id==500 || Auth()->user()->id==2){
            $reports=DB::select("SELECT *, datediff(f_respuesta, created_at) as dias, datediff(now(), created_at) as dias_sin from help_desks order by updated_at desc");
            $in=DB::table('help_desks')->where([['requerimiento', 'Incidente'],['estado', 0]])->get();
            $so=DB::table('help_desks')->where([['requerimiento', 'Solicitud'],['estado', 0]])->get();
            $asi=DB::table('help_desks')->where('estado', 1)->get();
            $solu=DB::table('help_desks')->where('estado', 2)->get();
            $apro=DB::table('help_desks')->where('estado', 3)->get();
        }elseif(Auth()->user()->id==430){
            //$reports = DB::table('help_desks')->where('admin', Auth()->user()->id)->orderBy('updated_at', 'desc')->get();
            $user=Auth()->user()->id;
            $reports=DB::select("SELECT *, datediff(f_respuesta, created_at) as dias, datediff(now(), created_at) as dias_sin from help_desks where admin=$user or admin=501 order by updated_at desc");
            //dd(count($reports));
            $in=DB::table('help_desks')->where([['admin', Auth()->user()->id],['requerimiento', 'Incidente'],['estado', 0]])
                                        ->orWhere([['admin', 501],['requerimiento', 'Incidente'],['estado', 0]])->get();
            $so=DB::table('help_desks')->where([['admin', Auth()->user()->id],['requerimiento', 'Solicitud'],['estado', 0]])
                                        ->orWhere([['admin', 501],['requerimiento', 'Solicitud'],['estado', 0]])->get();
            $asi=DB::table('help_desks')->where([['admin', Auth()->user()->id],['estado', 1]])
                                        ->orWhere([['admin', 501],['estado', 1]])->get();
            $solu=DB::table('help_desks')->where([['admin', Auth()->user()->id],['estado', 2]])
                                        ->orWhere([['admin', 501],['estado', 2]])->get();
            $apro=DB::table('help_desks')->where([['admin', Auth()->user()->id],['estado', 3]])
                                        ->orWhere([['admin', 501],['estado', 3]])->get();
        }else{
            $user=Auth()->user()->id;
            $reports=DB::select("SELECT *, datediff(f_respuesta, created_at) as dias, datediff(now(), created_at) as dias_sin from help_desks where admin=$user order by updated_at desc");
            //dd(count($reports));
            $in=DB::table('help_desks')->where([['admin', Auth()->user()->id],['requerimiento', 'Incidente'],['estado', 0]])->get();
            $so=DB::table('help_desks')->where([['admin', Auth()->user()->id],['requerimiento', 'Solicitud'],['estado', 0]])->get();
            $asi=DB::table('help_desks')->where([['admin', Auth()->user()->id],['estado', 1]])->get();
            $solu=DB::table('help_desks')->where([['admin', Auth()->user()->id],['estado', 2]])->get();
            $apro=DB::table('help_desks')->where([['admin', Auth()->user()->id],['estado', 3]])->get();

        }
        $inci=$in->count();
        $soli=$so->count();
        $tot=count($reports);
        $num_asig=$asi->count();
        $soluci=$solu->count();
        $aprobado=$apro->count();

        
        $dat = new Datos;
        $asignados = $dat->asigna();
        $categoria = $dat->tiempos();
        $subarea = $dat->subarea();
        //dd($categoria[100]['n']);
        $rol = $dat->roles(Auth()->user()->id);
        //dd($user);
         
        return view('help.admin', compact('reports','inci','soli','tot', 'soluci', 'asignados', 'num_asig', 'rol', 'aprobado', 'categoria', 'subarea'));
    }

    public function getresponder($id)
    {
        $report = HelpDesk::find($id);

        return view('help.responder', compact('report'));
    }

    public function postresponder($id, Request $request)
    {
        
       $report = HelpDesk::find($id);
        $report->respuesta = $request->input('respuesta');
        $report->f_respuesta = now();
        $report->estado = 2;
        $report->save();

        $comment = ([
            'usuario' => Auth()->user()->name,
            'subarea' => $request->input('subarea'),
            'user_id' => Auth()->user()->id,
            'post_id' => $request->input('user_id'),
            'accion' => 'responder'
        ]);
        
        if ($comment['user_id'] != $comment['post_id']) {
        $user = User::find($request->input('user_id')); 
        //dd($user);
        $user->notify(new NotiHelpDesk($comment));
        }

        $reports = DB::table('role_user')
        ->selectRaw('role_id')
        ->where('user_id', Auth()->user()->id)->get();
        $role=compact('reports');
        foreach ($role as $key => $value) {
            $rol=($value[0]->role_id);
        }
        $notificacion = array(
            'message' => 'Gracias! Su respuesta se envió con exito.', 
            'alert-type' => 'success'
        );
        if($rol==3 || $rol==1){
            return redirect('/admin')->with($notificacion);;
        }else{
            return redirect('/resasignacionhd')->with($notificacion);;
        }
        
    }

    public function descargar($id)
    {
        $report = HelpDesk::find($id);
       
        return Storage::download($report->archivo, 'archivo.pdf');
    }

    public function postasignarhelp(Request $request)
    {
        

        $comment = ([
            'usuario' => Auth()->user()->name,
            'subarea' => $request->input('subarea'),
            'user_id' => Auth()->user()->id,
            'post_id' => $request->input('asignado_a'),
            'accion' => 'asignar'
        ]);
        
        if ($comment['user_id'] != $comment['post_id']) {
        $user = User::find($request->input('asignado_a')); 
        $user->notify(new NotiHelpDesk($comment));
        }

        $comment = ([
            'usuario' => Auth()->user()->name,
            'subarea' => $request->input('subarea'),
            'user_id' => Auth()->user()->id,
            'post_id' => $request->input('asignado_a'),
            'accion' => 'asignar_user'
        ]);
        
        if ($comment['user_id'] != $comment['post_id']) {
        $user = User::find($request->input('user_id')); 
        $user->notify(new NotiHelpDesk($comment));
        }

        $user = User::find($request->input('asignado_a')); 
        $report = HelpDesk::find($request->input('id'));
        $report->estado = 1;
        $report->asignado_a = $request->input('asignado_a');
        $report->nombre_asig = $user->name;
        $report->f_asignado = now();
        $report->save();

        $notificacion = array(
            'message' => 'Gracias! el requerimiento se asignó con exito.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificacion);
    }

    public function resasignacionhd()
    {
        if(isset($_GET['id'])){
            DB::table('notifications')
            ->where('id', $_GET['id'])
            ->update(['read_at' => now()]);            
        }

        //$reports = DB::table('help_desks')->where('asignado_a', Auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        $user=Auth()->user()->id;
        $reports=DB::select("SELECT *, datediff(f_respuesta, created_at) as dias, datediff(now(), created_at) as dias_sin from help_desks where asignado_a=$user order by updated_at desc");
            //dd(count($reports)); 
        $asi=DB::table('help_desks')->where([['asignado_a', Auth()->user()->id],['estado', 1]])->get();
            $solu=DB::table('help_desks')->where([['asignado_a', Auth()->user()->id],['estado', 2]])->get();

        $tot=count($reports);
        $num_asig=$asi->count();
        $soluci=$solu->count();
        
        $dat = new Datos;
        $asignados = $dat->asigna();
        $categoria = $dat->tiempos();

        return view('help.resasignacionhd', compact('reports', 'tot', 'soluci', 'num_asig', 'asignados', 'categoria'));
    }

    public function aprobarhelp(Request $request)
    {
       $uni=$request->input('u_tiempo');
       $val=$request->input('tiempo');
       if($uni=='Hora(s)'){
            $f_aprox=gettimeofday(true)+$val*3600;
       }
       if($uni=='Día(s)'){
        $f_aprox=gettimeofday(true)+$val*3600*24;
        }
        if($uni=='Mes(es)'){
            $f_aprox=gettimeofday(true)+$val*3600*24*30;
        }
        if($uni=='Semana(s)'){
            $f_aprox=gettimeofday(true)+$val*3600*24*7;
        }
                
        
        $report = HelpDesk::find($request->input('id'));
        $report->subarea = $request->input('subarea');
        if($request->input('aprobado')=='No Aprobado'){
            $report->estado = 2;
            $report->respuesta = 'No Aprbado :'.$request->input('res_aprobado');
            $report->f_respuesta = now();
        }else{
            $report->estado = 3;
        }
        
        $report->res_aprobado = $request->input('res_aprobado');
        $report->aprobado = $request->input('aprobado');
        $report->u_tiempo = $request->input('u_tiempo');
        $report->tiempo = $request->input('tiempo');
        $report->f_aprobado = now();
        $report->f_aproxsolu = date('Y-m-d H:i:s', $f_aprox);
        $report->save();

        $comment = ([
            'usuario' => Auth()->user()->name,
            'subarea' => $request->input('subarea'),
            'user_id' => Auth()->user()->id,
            'post_id' => $request->input('user_id'),
            'accion' => 'aprobar'
        ]);
        
        if ($comment['user_id'] != $comment['post_id']) {
        $user = User::find($request->input('user_id')); 
        //dd($user);
        $user->notify(new NotiHelpDesk($comment));
        }

        $notificacion = array(
            'message' => 'Gracias! Su Aprobación se envió con exito.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificacion);
    }

    public function matriz()
    {
        $tec = DB::table('help_desks')->where('area', 'Sistemas')->get();
        $reports=DB::select("SELECT id, estado, datediff(f_respuesta, created_at) as dias, datediff(now(), created_at) as dias_sin from help_desks");

        $comu = DB::table('help_desks')->where('area', 'Comunicaciones')->get();
        $comp = DB::table('help_desks')->where('area', 'Compras, Mantenimiento y Mensajería')->get();
        $soli = DB::table('help_desks')->where('requerimiento', 'Solicitud')->get();
        $inci = DB::table('help_desks')->where('requerimiento', 'Incidente')->get();
        
        $sistemas=$tec->count();
        $comun=$comu->count();
        $compras=$comp->count();
        $solicitud=$soli->count();
        $incidencia=$inci->count();
        //dd($reports);
        return view('help.matriz',  compact('sistemas', 'comun', 'compras', 'solicitud', 'incidencia', 'reports'));
    }

    public function documentar(Request $request)
    {
        

        $comment = ([
            'usuario' => Auth()->user()->name,
            'subarea' => $request->input('subarea'),
            'user_id' => Auth()->user()->id,
            'post_id' => $request->input('user_id'),
            'accion' => 'documentar1'
        ]);
        
        if ($comment['user_id'] != $comment['post_id']) {
        $user = User::find($request->input('user_id')); 
        $user->notify(new NotiHelpDesk($comment));
        
        }

        $comment = ([
            'usuario' => Auth()->user()->name,
            'subarea' => $request->input('subarea'),
            'user_id' => Auth()->user()->id,
            'post_id' => $request->input('admin_id'),
            'accion' => 'documentar2'
        ]);
        if ($comment['user_id'] != $comment['post_id']) {
            $user = User::find($request->input('admin_id')); 
            $user->notify(new NotiHelpDesk($comment));
            
            }
        $report = new DocuHelpDesk;
        $report->help_id = $request->input('id');
        $report->docu = $request->input('docu');
        $report->f_docu = now();
        $report->save();

        $notificacion = array(
            'message' => 'Gracias! el requerimiento se documentó con exito.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificacion);
    }

    public function felicitar()
    {
        $user = User::all(); 
        return $user[0];
    }

    public function borrarhd($id)
    {
        $report = HelpDesk::find($id);
        $report->delete();
        return back();
    }

    public function mail()
    {
       
               
            return view('help.mail');
        
    }
}

