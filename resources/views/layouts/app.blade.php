<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Intranet | Sumimedical</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="/img/sumi/favicon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">       
{!! Html::style('/css/bootstrap.min.css') !!}        
        <!-- Font Awesome CSS -->
        {!! Html::style('/font-awesome/css/font-awesome.min.css') !!}        
        <!-- Custom CSS -->
        {!! Html::style('/css/style.css') !!}        
        <!-- BEGIN CSS for this page -->
        {!! Html::style('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css') !!}
        <!-- END CSS for this page -->
        
       
        <style>
            #filtrararchivos {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('https://www.w3schools.com/howto/searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

#filtrararchivos:focus {
    width: 95%;
}
            .border-effect { height:15px;width:20%;margin-top: 2px; }

      * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }

      .item {
        position: relative;  
        overflow: hidden;
        width: 100%;
      }
      
      .item img {
        max-width: 100%;  
        -moz-transition: all 0.3s;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
      }
      body {
    font-size: 0.9rem;
    background-color: #ffffff;
    padding-bottom: 50px;
}
#sidebar-menu > ul > li > a {
    color: #ffffff;
    display: block;
    padding: 12px 12px 15px 12px;
    font-weight: 400;
    font-size: 0.90rem;
    border-left: 2px solid transparent;
}
        </style>
</head>

<body class="adminbody">
@include('layouts.directorio')
<div id="main">

    <!-- top bar navigation -->
    <div class="headerbar">

        <!-- LOGO -->
        <div class="headerbar-left">
            <a href="/" class="logo"><img alt="Logo" src="/img/sumi/logo-sumi.png" /> <span style="color:black"><b>Sumintranet</b></span></a>
        </div>
            <nav class="navbar-custom">
                <ul class="list-inline float-right mb-0">                       
                    @guest
                        @else
                            @if(Auth::check())
                                <li class="list-inline-item dropdown notif">
                                    <a href="#" class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" role="button"  aria-haspopup="false" aria-expanded="false">
                                        <i class="fa fa-bell"></i> 
                                        @if(count(Auth::user()->unreadNotifications)>0)
                                        <small><span class="badge badge-light">{{count(Auth::user()->unreadNotifications)}}</span></small>
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right profile-dropdown" style="width:300px;margin-right:-150px">
                                        <li>
                                            @foreach (Auth::user()->unreadNotifications as $notification)
                                                @if ($notification->data["notihelp"]["accion"]=='reportar')
                                                    <a href="/admin?id={{$notification->id}}" class="dropdown-item notify-item">
                                                        <b>{{ $notification->data["notihelp"]["usuario"] }}</b> reportó un requerimiento a <b>{{ $notification->data["notihelp"]["subarea"] }}</b>
                                                    </a>
                                                @endif
                                                @if ($notification->data["notihelp"]["accion"]=='responder')
                                                    <a href="/consultar?id={{$notification->id}}" class="dropdown-item notify-item">
                                                        <b>{{ $notification->data["notihelp"]["usuario"] }}</b> respondió tu requerimiento de <b>{{ $notification->data["notihelp"]["subarea"] }}</b>
                                                    </a>
                                                @endif
                                                @if ($notification->data["notihelp"]["accion"]=='asignar')
                                                    <a href="/resasignacionhd?id={{$notification->id}}" class="dropdown-item notify-item">
                                                        <b>{{ $notification->data["notihelp"]["usuario"] }}</b> te asignó un requerimiento de <b>{{ $notification->data["notihelp"]["subarea"] }}</b>
                                                    </a>
                                                @endif
                                                @if ($notification->data["notihelp"]["accion"]=='aprobar')
                                                    <a href="/consultar?id={{$notification->id}}" class="dropdown-item notify-item">
                                                        <b>{{ $notification->data["notihelp"]["usuario"] }}</b> verificó tu requerimiento de <b>{{ $notification->data["notihelp"]["subarea"] }}</b>
                                                    </a>
                                                @endif
                                                @if ($notification->data["notihelp"]["accion"]=='asignar_user')
                                                    <a href="/consultar?id={{$notification->id}}" class="dropdown-item notify-item">
                                                        <b>{{ $notification->data["notihelp"]["usuario"] }}</b> asignó tu requerimiento de <b>{{ $notification->data["notihelp"]["subarea"] }}</b>
                                                    </a>
                                                @endif
                                                @if ($notification->data["notihelp"]["accion"]=='documentar1')
                                                    <a href="/consultar?id={{$notification->id}}" class="dropdown-item notify-item">
                                                        <b>{{ $notification->data["notihelp"]["usuario"] }}</b> documentó tu requerimiento de <b>{{ $notification->data["notihelp"]["subarea"] }}</b>
                                                    </a>
                                                @endif 
                                                @if ($notification->data["notihelp"]["accion"]=='documentar2')
                                                    <a href="/admin?id={{$notification->id}}" class="dropdown-item notify-item">
                                                        <b>{{ $notification->data["notihelp"]["usuario"] }}</b> documentó un requerimiento de <b>{{ $notification->data["notihelp"]["subarea"] }}</b>
                                                    </a>
                                                @endif
                                                @if ($notification->data["notihelp"]["accion"]=='felicitar')
                                                    <a href="/borrarfeli/{{$notification->id}}" class="dropdown-item notify-item">
                                                        <b>{{ $notification->data["notihelp"]["usuario"] }}</b> te desea un feliz cumpleaños.
                                                    </a>
                                                @endif
                                            @endforeach
                                        </li>
                                    </ul>
                                </li>
                                
                            @endif
                            
                            <li class="list-inline-item dropdown notif">
                                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="fa fa-fw fa fa-user"></i>
                                        <span style="font-size:12px; color:black"> {{ Auth::user()->name }} </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5 class="text-overflow"><small>Bienvenido</small> </h5>
                                        </div>
                                        <!-- item-->
                                        <a href="#" class="dropdown-item notify-item">
                                            <i class="fa fa-user"></i> <span>Profile</span>
                                        </a>
                                        <!-- item-->
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                            <i class="fa fa-power-off"></i> <span>{{ __('Cerrar sesión') }}</span><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                                </form>
                                        </a>
                                    </div>
                            </li>
                    @endguest
                </ul>
                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left" id="boton_menu">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </li>
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <ol class="breadcrumb float-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li class="breadcrumb-item"><a href="http://www.sumimedical.com/" target="_blank"><img src="/img/sumi/logointra.png" style="width:50px" /></i></li></a>
                                <li class="breadcrumb-item"><a href="http://192.168.0.5/ZeusSalud/ips/iniciando.php" target="_blank"><img src="/img/sumi/logoZ.png" style="width:80px" /></i></li></a>
                                <li class="breadcrumb-item"><a href="https://redvitalut.com/" target="_blank"><img src="/img/sumi/logored.png" style="width:90px" /></i></li></a>
                                <li class="breadcrumb-item"><a href="https://sumimedical.mymailsrvr.com/index.php" target="_blank"><img src="/img/sumi/email.png" style="width:60px" /></i></li></a>
                                <li class="breadcrumb-item"><a href="https://redvitalut.com/consultaips/" target="_blank"><img src="/img/sumi/ips.png" style="width:90px" /></i></li></a>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </ul>
            </nav>
    </div>
    <!-- End Navigation -->
 
    <!-- Left Sidebar -->
    <div class="left main-sidebar">
    
        <div class="sidebar-inner leftscroll">

            <div id="sidebar-menu">
        
            <ul>

                    <li class="submenu">
                        <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i><span> Home </span> </a>
                    </li>
                    @if(!Auth::check())
                        <li class="submenu">
                            <a class="{{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}"><i class="fa fa-fw fa-user"></i><span> Iniciar Sesión </span> </a>
                        </li>
                    @endif
                    <li class="submenu">
                            <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-sitemap"></i><span> Directorio </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fa fa-comments"></i> <span> PQRS-F </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="https://redvitalut.com/pqrsf/buzon.php" target="_blank"><i class="fa fa-bullhorn"></i><span> Crear Pqrsf </span></a></li>
                                <li><a href="/adminpqrsf" target="_blank"><i class="fa fa-line-chart"></i><span> Admin PQRSF</span></a></li>
                                <li><a href="/videopqrsf"><i class="fa fa-youtube-play"></i><span>Video Tutorial</span></a></li>
                                @if(Auth::check())
                                <li><a href="/intrapqr/index.php?id={{ Auth::user()->id }}" target="_blank"><i class="fa fa-line-chart"></i><span> Local</span></a></li>
                                @endif
                            </ul>
                    </li>
                   
                   
                    
                   
                    @can('reint.admin')
                        <li class="submenu">
                            <a href="#" ><i class="fa fa-thumbs-o-up"></i><span> Reintegros </span> <span class="menu-arrow"></span> </a>
                            <ul class="list-unstyled">
                                <li><a href="/reintegros" target="_blank"><i class="fa fa-edit"></i>Formulario</a></li>
                                <li><a href="/reintegros/login.php?id={{ Auth::user()->id }}" target="_blank">Administración</a></li>
                                <li><a href="https://redvitalut.com/reintegros/" target="_blank">Formulario red</a></li>
                                <li><a href="https://redvitalut.com/reintegros/login.php?id={{ Auth::user()->id }}" target="_blank">Administración red</a></li>
                            </ul>
                        </li>
                    @endcan
                    <li class="submenu">
                        <a class="{{ request()->is('documento') ? 'active' : '' }}" href="{{ url('documento') }}"><i class="fa fa-fw fa fa-book"></i><span> Documentos </span> </a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-medkit"></i> <span> Gestor de Solicitudes </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="/reportar">Generar Solicitud</a></li>
                                <li><a href="/consultar">Mis Solicitudes</a></li>
                                <li><a href="/videoreportar">Videos Tutoriales</a></li>
                                <li><a href="/matriz">Indicadores</a> </li>
                                    @can('help.admin')
                                        <li>
                                            <a href="/admin">Administración</a>
                                        </li>
                                       
                                    @endcan
                                    @can('help.asigna')
                                        <li>
                                            <a href="/resasignacionhd">Mis Asignaciones</a>
                                        </li>
                                    @endcan
                            </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-universal-access"></i> <span> Gestión Humana</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="/certificado"><i class="fa fa-check-square-o"></i> <span> Certificado Laboral</span> </a>
                            </li>
                        </ul>
                    </li>
                    
                   
                    
                    @can('users.index')
                    <li class="submenu">
                        <a href="{{ route('users.index')}}"><i class="fa fa-fw fa fa-user"></i><span> Usuarios </span> </a>
                    </li>
                    
                    <li class="submenu">
                        <a href="{{ route('roles.index')}}"><i class="fa fa-fw fa fa-users"></i><span> Roles </span> </a>
                    </li>
                    @endcan
                   

            </ul>

            <div class="clearfix"></div>

            </div>
        
            <div class="clearfix"></div>

        </div>

    </div>
    <div class="content-page">
    
        <!-- Start content -->
        <div class="content">
            
            <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                                <div class="breadcrumb-holder">
                                       
                                        <div class="clearfix"></div>
                                </div>
                        </div>
                        </div>
                            <div class="row">   
                                @yield('content')
                            </div>
                            <!-- end row -->


            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->
    
    <footer class="footer">
        <span class="text-right">
        Copyright <a target="_blank" href="http://www.sumimedical.com/" target="_blank"> SUMIMEDICAL.COM</a>
        </span>
        <!--<span class="float-right">
        Developer by <b>Cr7 | Cvilla</b></a>
        </span>-->
    </footer>

</div>

<!-- END main -->
{!! Html::script('/js/modernizr.min.js') !!}
{!! Html::script('/js/jquery.min.js') !!}
{!! Html::script('/js/moment.min.js') !!}
{!! Html::script('/js/popper.min.js') !!}       
{!! Html::script('/js/bootstrap.min.js') !!}
{!! Html::script('/js/detect.js') !!}
{!! Html::script('/js/fastclick.js') !!}
{!! Html::script('/js/jquery.blockUI.js') !!}
{!! Html::script('/js/jquery.nicescroll.js') !!}
{!! Html::script('/assets/js/directorio.js') !!}

<!-- App js -->
{!! Html::script('/js/pikeadmin.js') !!}

<!-- BEGIN Java Script for this page -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $("#dataformajax").submit(function(event){
                event.preventDefault();
                cc=$('#ccajax').val()
               $.get('/api/datajax?cc='+cc, function(data){
                  console.log(data);
               })
            });

            $("#dataformajax1").submit(function(event){
                event.preventDefault();
                cc1=$('#ccajax1').val()
               $.post('/api/datajax1',{ cc: cc1 }, function(data){
                  console.log(data);
               })
             });

            $('#felicitar').on({
                click:function(){
                    $.get( "/felicitar", function(data){
                          console.log(data);
                    });
                }
            })

            $('#ingreso').hide()
            $('#retiro').hide()
            $('#subareahd').on({
            change:function(){
                if($(this).val()=='3B'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show() 
                    $('#categoriahd').html('<option value="301">Muebles y Enseres</option>\
                                        <option value="302">Equipos de Computo</option>\
                                        <option value="303">Telefonía</option>\
                                        <option value="304">Redes</option>\
                                        <option value="305">Aseo</option>\
                                        <option value="306">Cafetería</option>\
                                        <option value="307">Dotación de Consultorio</option>\
                                        <option value="308">Logistica y Eventos</option>\
                                        <option value="309">Papeleria</option>\
                                        <option value="100">Otros</option>\
                                       ')
                }else if($(this).val()=='3A' || $(this).val()=='3C'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').hide() 
                }else if($(this).val()=='1A'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="101">Restricciones de páginas web</option>\
                                        <option value="102">Limitaciones de ancho de banda</option>\
                                        <option value="103">Adquisición o ampliación de canal de internet</option>\
                                        <option value="104">Configuración de VPN</option>\
                                        <option value="105">WIFI (Cambiar nombre o contraseña)</option>\
                                        <option value="106">Equipo o sede sin internet</option>\
                                        <option value="107">Lentitud de internet en equipo o sede</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1B'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="108">Creación de extensión telefónica</option>\
                                        <option value="109">Grabación de llamada</option>\
                                        <option value="110">Cambiar nombre a extensión telefónica</option>\
                                        <option value="111">Desvío de llamadas</option>\
                                        <option value="112">Modificación de audio en IVR</option>\
                                        <option value="113">Informe de Telefonía</option>\
                                        <option value="1131">Problemas al realizar llamada</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1C'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="114">Creación, configuración o eliminación de cuenta de correo</option>\
                                        <option value="115">Configuración o modificación de firma corporativa</option>\
                                        <option value="1151">Problemas con correo electrónico</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1D'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="116">Cambio de tóner</option>\
                                        <option value="117">Informe de impresión</option>\
                                        <option value="118">Adquisición o reemplazo de impresora</option>\
                                        <option value="119">Instalación y configuración de impresora</option>\
                                        <option value="120">Revisión de impresora</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1E'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="121">Asignación o cambio de equipo</option>\
                                        <option value="122">Instalación o activación de Office</option>\
                                        <option value="123">Instalación o activación de Windows</option>\
                                        <option value="124">Instalación o activación de Antivirus</option>\
                                        <option value="125">Backup de información</option>\
                                        <option value="126">Instalación o actualización de programas</option>\
                                        <option value="127">Problemas en pantalla, puertos USB, mouse o teclado</option>\
                                        <option value="128">Bajo rendimiento de equipo</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1F'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="129">Creación de usuario de dominio</option>\
                                        <option value="130">Ingreso de equipo al dominio</option>\
                                        <option value="131">Creación o actualización de servidor</option>\
                                        <option value="132">Configuración de servicios (DNS, FS, FTP)</option>\
                                        <option value="133">Informe de servicios</option>\
                                        <option value="134">Problemas con servicios DNS, archivos en el File Server o Directorio Activo</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1G'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="135">Estadísticas e Informes de RIPS</option>\
                                            <option value="136">Inconsistencias en RIPS</option>\
                                            <option value="100">Otro</option>')
                }else if($(this).val()=='1H'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="137">Levantamiento de restricciones</option>\
                                        <option value="138">Permisos adicionales en Zeus</option>\
                                        <option value="139">Nuevas implementaciones o mejoras en el aplicativo</option>\
                                        <option value="140">Problemas para ingresar al aplicativo o módulo</option>\
                                        <option value="141">Lentitud en alguno de los módulos del aplicativo</option>\
                                        <option value="100">Otro</option>')
                                        $('#divreque').show()
                }else if($(this).val()=='1I'){
                    $('#divcategoria').show()
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#categoriahd').html('<option value="142">Crear usuario</option>\
                                        <option value="143">Permiso de acceso a módulo</option>\
                                        <option value="144">No puedo acceder a la intranet</option>\
                                        <option value="100">Otro</option>')
                    }else if($(this).val()=='1J'){
                    $('#ingreso').show()
                    $('#retiro').hide()
                    $('#divcategoria').hide()
                }else if($(this).val()=='1K'){
                    $('#retiro').show()
                    $('#ingreso').hide()
                    $('#divcategoria').hide()
                }
            }
            })
            
             $('#categoriahd').on({
                click:function(){
                    if($(this).val()==null){
                        toastr.options = { "closeButton":true, "progressBar": true};
                        toastr.warning("Selecciona primero el requerimiento");
                    }
                }
            })

            if(window.location.href!='http://localhost/'){
                $('.button-menu-mobile').click();
            }
            
      
        

        $('#requerimientohd').on({
            change:function(){
                if($('#requerimientohd').val()=='Solicitud'){
                    toastr.options = { "closeButton":true, "progressBar": true};
                toastr.info("Solicitud: Tarea o actividad que no conlleva a la suspensión de un servicio o actividad diaria");
                
                }

                if($('#requerimientohd').val()=='Incidente'){
                    toastr.options = { "closeButton":true, "progressBar": true};
                toastr.info("Incidente: Evento que impide la realización normal de actividades");
               
                                        
                }
                 if($('#requerimientohd').val()=='Solicitud' &&  $('#subareahd').val()=='1A'){
                $('#categoriahd').html('<option value="101">Restricciones de páginas web</option>\
                                        <option value="102">Limitaciones de ancho de banda</option>\
                                        <option value="103">Adquisición o ampliación de canal de internet</option>\
                                        <option value="104">Configuración de VPN</option>\
                                        <option value="105">WIFI (Cambiar nombre o contraseña)</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' &&  $('#subareahd').val()=='1A'){ 
                $('#categoriahd').html('<option value="106">Equipo o sede sin internet</option>\
                                        <option value="107">Lentitud de internet en equipo o sede</option>\
                                        <option value="100">Otro</option>')
                                        }
                
               if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1B'){
                $('#categoriahd').html('<option value="108">Creación de extensión telefónica</option>\
                                        <option value="109">Grabación de llamada</option>\
                                        <option value="110">Cambiar nombre a extensión telefónica</option>\
                                        <option value="111">Desvío de llamadas</option>\
                                        <option value="112">Modificación de audio en IVR</option>\
                                        <option value="113">Informe de Telefonía</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1B'){
                $('#categoriahd').html('<option value="1131">Problemas al realizar llamada</option>\
                                        <option value="100">Otro</option>')
                                        }

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1C'){
                $('#categoriahd').html('<option value="114">Creación, configuración o eliminación de cuenta de correo</option>\
                                        <option value="115">Configuración o modificación de firma corporativa</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1C'){
                $('#categoriahd').html('<option value="1151">Problemas con correo electrónico</option>\
                                        <option value="100">Otro</option>')
                                        }

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1D'){
                $('#categoriahd').html('<option value="116">Cambio de tóner</option>\
                                        <option value="117">Informe de impresión</option>\
                                        <option value="118">Adquisición o reemplazo de impresora</option>\
                                        <option value="119">Instalación y configuración de impresora</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1D'){
                $('#categoriahd').html('<option value="120">Revisión de impresora</option>\
                                        <option value="100">Otro</option>')
                                        }

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1E'){
                $('#categoriahd').html('<option value="121">Asignación o cambio de equipo</option>\
                                        <option value="122">Instalación o activación de Office</option>\
                                        <option value="123">Instalación o activación de Windows</option>\
                                        <option value="124">Instalación o activación de Antivirus</option>\
                                        <option value="125">Backup de información</option>\
                                        <option value="126">Instalación o actualización de programas</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1E'){
                $('#categoriahd').html('<option value="127">Problemas en pantalla, puertos USB, mouse o teclado</option>\
                                        <option value="128">Bajo rendimiento de equipo</option>\
                                        <option value="100">Otro</option>')
                                        }

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1F'){
                $('#categoriahd').html('<option value="129">Creación de usuario de dominio</option>\
                                        <option value="130">Ingreso de equipo al dominio</option>\
                                        <option value="131">Creación o actualización de servidor</option>\
                                        <option value="132">Configuración de servicios (DNS, FS, FTP)</option>\
                                        <option value="133">Informe de servicios</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1F'){
                $('#categoriahd').html('<option value="134">Problemas con servicios DNS, archivos en el File Server o Directorio Activo</option>\
                                        <option value="100">Otro</option>')
                                        }

               

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1G'){
                $('#categoriahd').html('<option value="135">Estadísticas e Informes de RIPS</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1G'){
                $('#categoriahd').html('<option value="136">Inconsistencias en RIPS</option>\
                                        <option value="100">Otro</option>')
                                        }
                
                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1H'){
                $('#categoriahd').html('<option value="137">Levantamiento de restricciones</option>\
                                        <option value="138">Permisos adicionales en Zeus</option>\
                                        <option value="139">Nuevas implementaciones o mejoras en el aplicativo</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1H'){
                $('#categoriahd').html('<option value="140">Problemas para ingresar al aplicativo o módulo</option>\
                                        <option value="141">Lentitud en alguno de los módulos del aplicativo</option>\
                                        <option value="100">Otro</option>')
                                        }

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1I'){
                $('#categoriahd').html('<option value="142">Crear usuario</option>\
                                        <option value="143">Permiso de acceso a módulo</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1I'){
                $('#categoriahd').html('<option value="144">No puedo acceder a la intranet</option>\
                                        <option value="100">Otro</option>')
                                        }
            }
        })

        $('#reportehd').on('submit', function(event){
            if($('#requerimientohd').val()=='Selecciona...'){
                $('#requeri').css("color", "red")
                toastr.options = { "closeButton":true, "progressBar": true};
                toastr.error("Por favor selecciona el tipo de requerimiento");
                event.preventDefault();
            }
            if($('#subareahd').val()=='1H'){
                $('#admin').val(501) //Jorge Arboleda Vallejo
            }
            else if($('#areahd').val()=='Comunicaciones'){
                $('#categoriahd').val('')
                $('#admin').val(502) //laura vasquez
            }
            else if($('#areahd').val()=='Gestión Humana'){
                $('#categoriahd').val('')
                $('#admin').val(475) //Paola Fonseca
            }
            else if($('#areahd').val()=='Compras, Mantenimiento y Mensajería'){
                $('#admin').val(476) //luisa giraldo
            }
            else if($('#subareahd').val()=='3A' || $('#subareahd').val()=='3C'){
                $('#categoriahd').val('')
            }
            else{
                 $('#admin').val(430) //fernando padron
            }
        })

        $('#areahd').on({
                change:function(){
                if($(this).val()=='Comunicaciones'){
                        $('#ingreso').hide()
                        $('#retiro').hide()
                        $('#divcategoria').hide()
                        $('#subareahd').html('<option value="2A">Publicación de Contenidos en Intranet</option>\
                                        <option value="2B">Publicación de Contenidos Página Web</option>\
                                        <option value="2C">Revisión y/o Creación de Contenido</option>\
                                        <option value="2D">Mantenimiento y/o Instalación de contenido Imagen Corporativa</option>\
                                        <option value="2E">Solicitud de Piezas Publicitarias</option>\
                                        <option value="2F">Creación de Campaña Publicitaria</option>\
                                        <option value="2G">Creación de Videos Institucionales</option>')
                }
                else if($(this).val()=='Sistemas'){
                        $('#ingreso').hide()
                        $('#retiro').hide()
                        $('#divcategoria').show()
                        $('#subareahd').html('<option value="1A">Redes e Internet</option>\
                                                <option value="1B">Telefonía</option>\
                                                <option value="1C">Correo</option>\
                                                <option value="1D">Impresoras</option>\
                                                <option value="1E">Equipos de cómputo</option>\
                                                <option value="1F">Servidores</option>\
                                                <option value="1G">Sistemas de Información</option>\
                                                <option value="1H">Zeus</option>\
                                                <option value="1I">Intranet</option>\
                                                <option value="1J">Ingreso de Empleado</option>\
                                                <option value="1K">Retiro de Empleado</option>') 
                        $('#categoriahd').html('')
                    }
                else if($(this).val()=='Gestión Humana'){
                        $('#ingreso').hide()
                        $('#retiro').hide()
                        $('#divcategoria').hide()
                        $('#subareahd').html('<option value="4A">PQRSF Empleado</option>') 
                    }
                    else{
                        $('#ingreso').hide()
                        $('#retiro').hide()
                        $('#divcategoria').hide()
                        $('#subareahd').html('<option value="3A">Mantenimiento</option>\
                                            <option value="3B">Compras</option>\
                                            <option value="3C">Mensajeria</option>')
                    }
                 }
                 })

                $('#filtrararchivos').keyup(function () {
             
             var rex = new RegExp($(this).val(), 'i');
             $('.buscar tr').hide();
             $('.buscar tr').filter(function () {
                 return rex.test($(this).text());
             }).show();
            
            })
            
        $(document).on('change','#archivohd',function(){
	    // this.files[0].size recupera el tamaño del archivo
	    // alert(this.files[0].size);
	
	    var fileName = this.files[0].name;
	    var fileSize = this.files[0].size;

	    if(fileSize > 3000000){
            toastr.error("El archivo no debe superar los 3MB");
		this.value = '';
		this.files[0].name = '';
	    }else{
		// recuperamos la extensión del archivo
		var ext = fileName.split('.').pop();

		// console.log(ext);
		switch (ext) {
            case 'xls':
             case 'xlsm':
            case 'xlsx':
            case 'docx':
            case 'doc':
            case 'jpg':
            case 'jpeg':
            case 'PDF':
			case 'pdf': break;
			default:
            toastr.options = { "closeButton":true, "progressBar": true};
            toastr.error("El archivo no tiene la extensión adecuada");
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	    }
        });
        });
        
    </script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
@if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.options = { "closeButton":true, "progressBar": true};
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
        toastr.options = { "closeButton":true, "progressBar": true};
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
        toastr.options = { "closeButton":true, "progressBar": true};
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
        toastr.options = { "closeButton":true, "progressBar": true};
            toastr.error("{{ Session::get('message') }}");
            break;
    }

    @endif
    </script>
<!-- END Java Script for this page -->

</body>
</html>