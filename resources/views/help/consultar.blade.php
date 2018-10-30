@extends('layouts.app')
@section('content')

<div class="col-sm-12">  
    <h5>Mis Requerimientos al Gestor de Solicitudes</h5>
    <br>
   
<!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#home">Pendientes <span class="badge badge-primary">{{$pend}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Solucionados <span class="badge badge-primary">{{$solu}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#menu2">Todos <span class="badge badge-primary">{{$tot}}</a>
        </li>
    </ul>
    @if ($tot>0)
    <br>
        <!-- Tab panes -->
    <div class="tab-content">
        
        <!-- Pendientes -->
        <div id="home" class="container tab-pane fade col-sm-12">
                <div class="row text-center" style="margin:0 20px 8px 10px">
                        <div class="col-sm-1"><b>Id</b></div>
                        <div class="col-sm-1"><b>Fecha</b></div>
                        <div class="col-sm-1"><b>Dias</b></div>
                        <div class="col-sm-1"><b>Tipo</b></div>
                        <div class="col-sm-2"><b>Area</b></div>
                        <div class="col-sm-2"><b>Subárea</b></div>
                        <div class="col-sm-2"><b>Estado</b></div>
                        <div class="col-sm-1"><b>Descripción</b></div>
                </div>
                <div class="accordion" id="Examplehome">
                        @foreach($reports as $row)
                            @if ($row->estado!=2)
                            <div class="card">
                                <div class="card-header" id="heading{{ $row->id }}">
                                    <div class="row text-center"> 
                                        <div class="col-sm-1">{{ $row->id }}</div>
                                        @php  $d=strtotime($row->created_at);   @endphp
                                        <div class="col-sm-1" style="margin-left:0">{{ date("Y.m.d", $d) }}</div>
                                        <div class="col-sm-1">{{ $row->dias_sin }}</div>
                                        <div class="col-sm-1">{{ $row->requerimiento }}</div>
                                        <div class="col-sm-2">{{ $row->area }}</div>
                                        <div class="col-sm-2">{{ $row->subarea }}</div>
                                        <div class="col-sm-2">  
                                           @include('help.otros.estado')
                                        </div>
                                        <div class="col-sm-1">  
                                            <a href=""   class="collapsed" data-toggle="collapse" data-target="#collapse{{ $row->id }}" aria-expanded="false" aria-controls="collapse{{ $row->id }}">
                                                Ver <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>   
                                </div>
                                <div id="collapse{{ $row->id }}" class="collapse" aria-labelledby="heading{{ $row->id }}" data-parent="#Examplehome">
                                    @include('help.otros.ver')
                                </div>
                            </div>
                            @endif
                        @endforeach
                </div>
        </div>
        <!-- Solucionadas -->
        <div id="menu1" class="container tab-pane fade col-sm-12">
                <div class="row text-center" style="margin:0 20px 8px 10px">
                        <div class="col-sm-1"><b>Id</b></div>
                        <div class="col-sm-1"><b>Fecha</b></div>
                        <div class="col-sm-1"><b>Dias</b></div>
                        <div class="col-sm-1"><b>Tipo</b></div>
                        <div class="col-sm-2"><b>Area</b></div>
                        <div class="col-sm-2"><b>Subárea</b></div>
                        <div class="col-sm-2"><b>Estado</b></div>
                        <div class="col-sm-1"><b>Descripción</b></div>
                        <div class="col-sm-1"><b>Evaluación</b></div>
                </div>
                <div class="accordion" id="Examplemenu1">
                     @foreach($reports as $row)
                         @if ($row->estado==2)
                         <div class="card">
                             <div class="card-header" id="heading{{ $row->id }}">
                                <div class="row text-center"> 
                                    <div class="col-sm-1">{{ $row->id }}</div>
                                    @php  $d=strtotime($row->created_at);   @endphp
                                    <div class="col-sm-1">{{ date("Y-m-d", $d) }}</div>
                                    <div class="col-sm-1">{{ $row->dias }}</div>
                                    <div class="col-sm-1">{{ $row->requerimiento }}</div>
                                    <div class="col-sm-2">{{ $row->area }}</div>
                                    <div class="col-sm-2">{{ $row->subarea }}</div>
                                    <div class="col-sm-2">  
                                            @include('help.otros.estado')
                                    </div>
                                    <div class="col-sm-1">  
                                        <a href=""   class="collapsed" data-toggle="collapse" data-target="#collapse{{ $row->id }}" aria-expanded="false" aria-controls="collapse{{ $row->id }}">
                                            Ver <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1">
                                            @include('help.otros.evaluar')
                                    </div>
                                </div>   
                             </div>
                             <div id="collapse{{ $row->id }}" class="collapse" aria-labelledby="heading{{ $row->id }}" data-parent="#Examplemenu1">
                                @include('help.otros.ver')
                             </div>
                         </div>
                         @endif
                     @endforeach
                </div>
        </div>
        <!-- Todos -->
         <div id="menu2" class="container tab-pane active col-sm-12">
                <div class="row text-center" style="margin:0 20px 8px 10px">
                        <div class="col-sm-1"><b>Id</b></div>
                        <div class="col-sm-1"><b>Fecha</b></div>
                        <div class="col-sm-1"><b>Dias</b></div>
                        <div class="col-sm-1"><b>Tipo</b></div>
                        <div class="col-sm-2"><b>Area</b></div>
                        <div class="col-sm-2"><b>Subárea</b></div>
                        <div class="col-sm-2"><b>Estado</b></div>
                        <div class="col-sm-1"><b>Descripción</b></div>
                        <div class="col-sm-1"><b>Evaluación</b></div>
                </div>
                <div class="accordion" id="Examplemenu2">
                    @foreach($reports as $row)
                        <div class="card">
                            <div class="card-header" id="{{ $row->id }}heading{{ $row->id }}">
                                <div class="row text-center"> 
                                    <div class="col-sm-1">{{ $row->id }}</div>
                                    @php  $d=strtotime($row->created_at);   @endphp
                                    <div class="col-sm-1">{{ date("Y-m-d", $d) }}</div>
                                    <div class="col-sm-1">
                                        @if ($row->estado==2)
                                            {{ $row->dias }}
                                        @else
                                            {{ $row->dias_sin }}
                                        @endif
                                    </div>
                                    <div class="col-sm-1">{{ $row->requerimiento }}</div>
                                    <div class="col-sm-2">{{ $row->area }}</div>
                                    <div class="col-sm-2">{{ $row->subarea }}</div>
                                   <div class="col-sm-2">  
                                        @include('help.otros.estado')
                                    </div>
                                    <div class="col-sm-1">  
                                        <a href=""   class="collapsed" data-toggle="collapse" data-target="#{{ $row->id }}collapse{{ $row->id }}" aria-expanded="false" aria-controls="{{ $row->id }}collapse{{ $row->id }}">
                                            Ver <i class="fa fa-plus"></i>
                                        </a>
                                    </div> 
                                    <div class="col-sm-1">
                                            @include('help.otros.evaluar1')
                                        <a href="/borrarhd/{{ $row->id }}">borrar</a>
                                    </div>   
                                </div>   
                            </div>
                            <div id="{{ $row->id }}collapse{{ $row->id }}" class="collapse" aria-labelledby="{{ $row->id }}heading{{ $row->id }}" data-parent="#Examplemenu2">
                                @include('help.otros.ver')
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>
    @else
    <br>
    <div class="alert alert-primary">
        <strong>No Tienes Requerimientos al Gestor de Solicitudes, </strong> Puedes Reportar una Incidencia <a href="reportar" class="alert-link">aqui</a>.
    </div> 
</div>    
    @endif
    
 

    <script>
       
       function mOver1(obj) {
       id1='star1-'+obj
       document.getElementById(id1).style.color = "red";
        }
        function mOut1(obj) {
            id1='star1-'+obj
       document.getElementById(id1).style.color = "";
        }
        
        function mOver2(obj) {
       id1='star1-'+obj
       id2='star2-'+obj
       document.getElementById(id1).style.color = "red";
       document.getElementById(id2).style.color = "red";
        }
        function mOut2(obj) {
            id1='star1-'+obj
            id2='star2-'+obj
       document.getElementById(id1).style.color = "";
       document.getElementById(id2).style.color = "";
        }

        function mOver3(obj) {
       id1='star1-'+obj
       id2='star2-'+obj
       id3='star3-'+obj
       document.getElementById(id1).style.color = "gold";
       document.getElementById(id2).style.color = "gold";
       document.getElementById(id3).style.color = "gold";
        }
        function mOut3(obj) {
            id1='star1-'+obj
            id2='star2-'+obj
            id3='star3-'+obj
       document.getElementById(id1).style.color = "";
       document.getElementById(id2).style.color = "";
       document.getElementById(id3).style.color = "";
        }

        function mOver4(obj) {
       id1='star1-'+obj
       id2='star2-'+obj
       id3='star3-'+obj
       id4='star4-'+obj
       document.getElementById(id1).style.color = "green";
       document.getElementById(id2).style.color = "green";
       document.getElementById(id3).style.color = "green";
       document.getElementById(id4).style.color = "green";
        }
        function mOut4(obj) {
            id1='star1-'+obj
            id2='star2-'+obj
            id3='star3-'+obj
            id4='star4-'+obj
       document.getElementById(id1).style.color = "";
       document.getElementById(id2).style.color = "";
       document.getElementById(id3).style.color = "";
       document.getElementById(id4).style.color = "";
        }

        function mOver5(obj) {
       id1='star1-'+obj
       id2='star2-'+obj
       id3='star3-'+obj
       id4='star4-'+obj
       id5='star5-'+obj
       document.getElementById(id1).style.color = "green";
       document.getElementById(id2).style.color = "green";
       document.getElementById(id3).style.color = "green";
       document.getElementById(id4).style.color = "green";
       document.getElementById(id5).style.color = "green";
        }
        function mOut5(obj) {
            id1='star1-'+obj
            id2='star2-'+obj
            id3='star3-'+obj
            id4='star4-'+obj
            id5='star5-'+obj
       document.getElementById(id1).style.color = "";
       document.getElementById(id2).style.color = "";
       document.getElementById(id3).style.color = "";
       document.getElementById(id4).style.color = "";
       document.getElementById(id5).style.color = "";
        }
       

       function mOver11(obj) {
       id11='star11-'+obj
       document.getElementById(id11).style.color = "red";
        }
        function mOut11(obj) {
            id11='star11-'+obj
       document.getElementById(id11).style.color = "";
        }
        
        function mOver22(obj) {
       id11='star11-'+obj
       id22='star22-'+obj
       document.getElementById(id11).style.color = "red";
       document.getElementById(id22).style.color = "red";
        }
        function mOut22(obj) {
            id11='star11-'+obj
            id22='star22-'+obj
       document.getElementById(id11).style.color = "";
       document.getElementById(id22).style.color = "";
        }

        function mOver33(obj) {
       id11='star11-'+obj
       id22='star22-'+obj
       id33='star33-'+obj
       document.getElementById(id11).style.color = "gold";
       document.getElementById(id22).style.color = "gold";
       document.getElementById(id33).style.color = "gold";
        }
        function mOut33(obj) {
            id11='star11-'+obj
            id22='star22-'+obj
            id33='star33-'+obj
       document.getElementById(id11).style.color = "";
       document.getElementById(id22).style.color = "";
       document.getElementById(id33).style.color = "";
        }

        function mOver44(obj) {
       id11='star11-'+obj
       id22='star22-'+obj
       id33='star33-'+obj
       id44='star44-'+obj
       document.getElementById(id11).style.color = "green";
       document.getElementById(id22).style.color = "green";
       document.getElementById(id33).style.color = "green";
       document.getElementById(id44).style.color = "green";
        }
        function mOut44(obj) {
            id11='star11-'+obj
            id22='star22-'+obj
            id33='star33-'+obj
            id44='star44-'+obj
       document.getElementById(id11).style.color = "";
       document.getElementById(id22).style.color = "";
       document.getElementById(id33).style.color = "";
       document.getElementById(id44).style.color = "";
        }

        function mOver55(obj) {
       id11='star11-'+obj
       id22='star22-'+obj
       id33='star33-'+obj
       id44='star44-'+obj
       id55='star55-'+obj
       document.getElementById(id11).style.color = "green";
       document.getElementById(id22).style.color = "green";
       document.getElementById(id33).style.color = "green";
       document.getElementById(id44).style.color = "green";
       document.getElementById(id55).style.color = "green";
        }
        function mOut55(obj) {
            id11='star11-'+obj
            id22='star22-'+obj
            id33='star33-'+obj
            id44='star44-'+obj
            id55='star55-'+obj
       document.getElementById(id11).style.color = "";
       document.getElementById(id22).style.color = "";
       document.getElementById(id33).style.color = "";
       document.getElementById(id44).style.color = "";
       document.getElementById(id55).style.color = "";
        }
       
   
</script>
@endsection