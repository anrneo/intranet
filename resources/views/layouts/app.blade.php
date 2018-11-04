<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Intranet | Sumimedical</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="/img/sumi/favicon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">       <!-- Bootstrap CSS -->
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
                                <li><a href="https://pqrd.supersalud.gov.co/TMS.Solution.TMSPQRD" target="_blank"><i class="fa fa-check"></i><span>Pqrs Supersalud</span></a></li>
                                <li><a href="/adminpqrsf" target="_blank"><i class="fa fa-line-chart"></i><span> Admin PQRSF</span></a></li>
                                <li><a href="/videopqrsf"><i class="fa fa-youtube-play"></i><span>Video Tutorial</span></a></li>
                                @if(Auth::check())
                                <li><a href="/intrapqr/index.php?id={{ Auth::user()->id }}" target="_blank"><i class="fa fa-line-chart"></i><span> Local</span></a></li>
                                @endif
                            </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fab fa-telegram-plane"></i> <span>Traslados</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="/reportartiq"><i class="fas fa-map-marker-alt"></i><span>Reportar</span></a></li>
                                <li><a href="/test"><i class="fas fa-map-marker-alt"></i><span>test</span></a></li>
                                @can('tiqa.ver')
                                <li><a href="/solicitudestiq"><i class="fas fa-clipboard-check"></i><span>Verificación</span></a></li>
                                @endcan
                                @can('tiqa.apro')
                                <li><a href="/aprobarsolae"><i class="fas fa-plane-departure"></i><span>Aprobación</span></a></li>
                                @endcan
                                @can('tiqt.admin')
                                <li><a href="/solicitudesterr"><i class="fas fa-bus"></i><span>Terrestres</span></a></li>
                                @endcan
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

            $('#filtrararchivos').keyup(function () {
             var rex = new RegExp($(this).val(), 'i');
             $('.buscar tr').hide();
             $('.buscar tr').filter(function () {
                 return rex.test($(this).text());
             }).show();
            
            })

                if(window.location.href!='http://localhost/'){
                $('.button-menu-mobile').click();
            }

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
                    });
                }
            })

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