@extends('layouts.app')
@section('content')
<div class="col-sm-12">  
    <h5>Mis Requerimientos al Gestor de Solicitudes</h5>
    <br>
    @php
         /*$servername = "192.168.0.6";
$username = "root";
$password = "1lipCIJVrnD7m10S";
$dbname = "intranet";*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intranet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    @endphp
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
        <div class="row text-center" style="margin:0 33px 8px 10px">
            <div class="col-sm-1"><b>Id</b></div>
            <div class="col-sm-1"><b>Fecha</b></div>
            <div class="col-sm-1"><b>Dias</b></div>
            <div class="col-sm-1"><b>Tipo</b></div>
            <div class="col-sm-2"><b>Area</b></div>
            <div class="col-sm-2"><b>Subárea</b></div>
            <div class="col-sm-2"><b>Estado</b></div>
            <div class="col-sm-1"><b>Descripción</b></div>
        </div>
        <!-- Pendientes -->
        <div id="home" class="container tab-pane fade col-sm-12">
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
                                    <div class="col-sm-1"><a href="/borrarhd/{{ $row->id }}">borrar</a></div>   
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
    
 

@endsection