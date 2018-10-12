@extends('layouts.app')
@section('content')

<style>
    .modal-contentasignar {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border-radius: .3rem;
    outline: 0;
    width: 755px;
    margin-left: -126px;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<div class="col-sm-12">  
    <h5>Administración Gestor de Solicitudes área de {{$rol}} <span class="badge badge-primary">{{$tot}}</span></h5>
      <br>
      @php
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
        <a class="nav-link" data-toggle="tab" href="#menu2">Pendientes <span class="badge badge-primary">{{$inci+$soli}}</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#home">Incidentes <span class="badge badge-primary">{{$inci}}</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Solicitudes <span class="badge badge-primary">{{$soli}}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu5">Aprobados <span class="badge badge-primary">{{$aprobado}}</span></a>
      </li>
    <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#menu4">Asignados <span class="badge badge-primary">{{$num_asig}}</span></a>
        </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu3">Solucionados <span class="badge badge-primary">{{$soluci}}</span></a>
    </li>
    <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#menu6">Consultas</a>
        </li>
  </ul>
  <br>
  <!-- Tab panes -->
    <div class="tab-content">
        <!-- Incidentes -->
        <div id="home" class="container tab-pane fade col-sm-12">
            <div class="row text-center" style="margin:0 8px 8px 8px"> 
                <div class="col-sm-1"><b>Id</b></div>
                <div class="col-sm-1"><b>Fecha</b></div>
                <div class="col-sm-1"><b>Dias</b></div>
                <div class="col-sm-2"><b>Usuario</b></div>
                <div class="col-sm-2"><b>Subárea</b></div>
                <div class="col-sm-1"><b>Descripción</b></div>
                <div class="col-sm-2"><b>Opciones</b></div>        
            </div>
            <div class="accordion" id="Examplehome">
                @foreach($reports as $row)
                    @if ($row->requerimiento=='Incidente' && $row->estado==0)
                        <div class="card">
                            <div class="card-header" id="heading{{ $row->id }}">
                                <div class="row text-center"> 
                                    <div class="col-sm-1">{{ $row->id }}</div>
                                    @php  $d=strtotime($row->created_at);   @endphp
                                    <div class="col-sm-1">{{ date("Y.m.d", $d) }}</div>
                                    <div class="col-sm-1">{{ $row->dias_sin }}</div>
                                    <div class="col-sm-2">{{ $row->nombre }}</div>
                                    <div class="col-sm-2">{{ $row->subarea }}</div>
                                    <div class="col-sm-1">  
                                                    <a href=""   class="collapsed" data-toggle="collapse" data-target="#collapse{{ $row->id }}" aria-expanded="false" aria-controls="collapse{{ $row->id }}">
                                                        Ver <i class="fa fa-plus"></i>
                                                    </a>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm">Opciones</button>
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            @include('help.otros.opciones')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse{{ $row->id }}" class="collapse" aria-labelledby="heading{{ $row->id }}" data-parent="#Examplehome">
                                @include('help.otros.ver')
                            </div>
                        </div>
                    @endif
                @endforeach
            </div><br><br><br><br>
        </div>
        <!-- solicitudes -->
        <div id="menu1" class="container tab-pane fade col-sm-12">
            <div class="row text-center" style="margin:0 8px 8px 8px"> 
                <div class="col-sm-1"><b>Id</b></div>
                <div class="col-sm-1"><b>Fecha</b></div>
                <div class="col-sm-1"><b>Dias</b></div>
                <div class="col-sm-2"><b>Usuario</b></div>
                <div class="col-sm-2"><b>Subárea</b></div>
                <div class="col-sm-1"><b>Descripción</b></div>
                <div class="col-sm-2"><b>Opciones</b></div>        
            </div>
            <div class="accordion" id="Examplemenu1">
                @foreach($reports as $row)
                    @if ($row->requerimiento=='Solicitud' && $row->estado==0)
                        <div class="card">
                            <div class="card-header" id="heading{{ $row->id }}">
                                <div class="row text-center"> 
                                    <div class="col-sm-1">{{ $row->id }}</div>
                                    @php  $d=strtotime($row->created_at);   @endphp
                                    <div class="col-sm-1">{{ date("Y.m.d", $d) }}</div>
                                    <div class="col-sm-1">{{ $row->dias_sin }}</div>
                                    <div class="col-sm-2">{{ $row->nombre }}</div>
                                    <div class="col-sm-2">{{ $row->subarea }}</div>
                                    <div class="col-sm-1">  
                                        <a href=""   class="collapsed" data-toggle="collapse" data-target="#collapse{{ $row->id }}" aria-expanded="false" aria-controls="collapse{{ $row->id }}">
                                            Ver <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-2">  
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm">Opciones</button>
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            @include('help.otros.opciones')
                                        </div>
                                    </div>   
                                </div>
                            </div>
                            <div id="collapse{{ $row->id }}" class="collapse" aria-labelledby="heading{{ $row->id }}" data-parent="#Examplemenu1">
                                <div class="card-body">
                                    @include('help.otros.ver')
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div><br><br><br><br>
        </div>
        <!-- Pendientes -->
        <div id="menu2" class="container tab-pane fade col-sm-12">
            <div class="row text-center" style="margin:0 8px 8px 8px"> 
                <div class="col-sm-1"><b>Id</b></div>
                <div class="col-sm-1"><b>Fecha</b></div>
                <div class="col-sm-1"><b>Dias</b></div>
                <div class="col-sm-2"><b>Usuario</b></div>
                <div class="col-sm-1"><b>Tipo</b></div>
                <div class="col-sm-2"><b>Subárea</b></div>
                <div class="col-sm-2"><b>Estado</b></div>
                <div class="col-sm-1"><b>Descripción</b></div>
                <div class="col-sm-1"><b>Opciones</b></div>       
            </div>
            <div class="accordion" id="Examplemenu2">
                @foreach($reports as $row)
                    @if ($row->estado==0)
                        <div class="card">
                            <div class="card-header" id="{{ $row->id }}heading{{ $row->id }}">
                                <div class="row text-center"> 
                                    <div class="col-sm-1">{{ $row->id }}</div>
                                    @php  $d=strtotime($row->created_at);   @endphp
                                    <div class="col-sm-1" style="margin-left:0">{{ date("Y.m.d", $d) }}</div>
                                    <div class="col-sm-1">
                                        @if ($row->estado==2)
                                            {{ $row->dias }}
                                        @else
                                            {{ $row->dias_sin }}
                                        @endif
                                    </div>
                                    <div class="col-sm-2">{{ $row->nombre }}</div>
                                    <div class="col-sm-1">{{ $row->requerimiento }}</div>
                                    <div class="col-sm-2">{{ $row->subarea }}</div>
                                    <div class="col-sm-2">  
                                        @include('help.otros.estado')
                                    </div>
                                    <div class="col-sm-1">  
                                        <a href=""   class="collapsed" data-toggle="collapse" data-target="#{{ $row->id }}collapse{{ $row->id }}" aria-expanded="false" aria-controls="{{ $row->id }}collapse{{ $row->id }}">
                                            Ver <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1" style="margin: 0 0 0 0">
                                        @if ($row->estado!=2)
                                            <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm">Opciones</button>
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                    </button>
                                                    @include('help.otros.opciones')
                                            </div>
                                        @endif    
                                    </div>         
                                </div>   
                            </div>
                            <div id="{{ $row->id }}collapse{{ $row->id }}" class="collapse" aria-labelledby="{{ $row->id }}heading{{ $row->id }}" data-parent="#Examplemenu2">
                                @include('help.otros.ver')
                            </div>
                        </div>
                    @endif
                @endforeach
            </div><br><br><br><br>   
        </div>
        <!-- Solucionados -->
        <div id="menu3" class="container tab-pane fade col-sm-12">
            <div class="row text-center" style="margin:0 8px 8px 8px"> 
                <div class="col-sm-1"><b>Id</b></div>
                <div class="col-sm-1"><b>Fecha</b></div>
                <div class="col-sm-1"><b>Dias</b></div>
                <div class="col-sm-1"><b>Tipo</b></div>  
                <div class="col-sm-2"><b>Area</b></div>
                <div class="col-sm-2"><b>Subárea</b></div>
                <div class="col-sm-2"><b>Usuario</b></div>
                <div class="col-sm-1"><b>Descripción</b></div>
            </div>
            <div class="accordion" id="Examplemenu3">
                @foreach($reports as $row)
                    @if ($row->estado==2)
                        <div class="card">
                            <div class="card-header" id="heading{{ $row->id }}">
                                <div class="row text-center">
                                    <div class="col-sm-1">{{ $row->id }}</div>
                                    @php  $d=strtotime($row->created_at);   @endphp
                                    <div class="col-sm-1" style="margin-left:0">{{ date("Y.m.d", $d) }}</div> 
                                    <div class="col-sm-1">  
                                            {{ $row->dias }}
                                    </div>
                                    <div class="col-sm-1">{{ $row->requerimiento }}</div>
                                    <div class="col-sm-2">{{ $row->area }}</div>
                                    <div class="col-sm-2">{{ $row->subarea }}</div>
                                    <div class="col-sm-2">{{ $row->nombre }}</div>
                                    <div class="col-sm-1">  
                                        <a href=""   class="collapsed" data-toggle="collapse" data-target="#collapse{{ $row->id }}" aria-expanded="false" aria-controls="collapse{{ $row->id }}">
                                            Ver <i class="fa fa-plus"></i>
                                        </a>
                                    </div>      
                                </div>   
                            </div>
                            <div id="collapse{{ $row->id }}" class="collapse" aria-labelledby="heading{{ $row->id }}" data-parent="#Examplemenu3">
                                <div class="card-body">
                                    @include('help.otros.ver')
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- Asignados -->
        <div id="menu4" class="container tab-pane fade col-sm-12">
            <div class="row text-center" style="margin:0 8px 8px 8px">
                <div class="col-sm-1"><b>Id</b></div>
                <div class="col-sm-1"><b>Fecha</b></div>
                <div class="col-sm-1"><b>Dias</b></div>
                <div class="col-sm-2"><b>Usuario</b></div>
                <div class="col-sm-1"><b>Tipo</b></div>
                <div class="col-sm-2"><b>Subárea</b></div>
                <div class="col-sm-1"><b>Descripción</b></div>
                <div class="col-sm-2"><b>Asignado a</b></div>
                <div class="col-sm-1"><b>Opciones</b></div>
            </div>
            <div class="accordion" id="Examplemenu4">
                @foreach($reports as $row)
                    @if ($row->estado==1)
                        <div class="card">
                            <div class="card-header" id="1heading{{ $row->id }}">
                                <div class="row text-center">
                                    <div class="col-sm-1">{{ $row->id }}</div> 
                                    @php  $d=strtotime($row->created_at);   @endphp
                                    <div class="col-sm-1" style="margin-left:0">{{ date("Y.m.d", $d) }}</div>
                                    <div class="col-sm-1">{{ $row->dias_sin }}</div>
                                    <div class="col-sm-2">{{ $row->nombre }}</div>
                                    <div class="col-sm-1">{{ $row->requerimiento }}</div>
                                    <div class="col-sm-2">{{ $row->subarea }}</div>
                                    <div class="col-sm-1">  
                                        <a href=""   class="collapsed" data-toggle="collapse" data-target="#1collapse{{ $row->id }}" aria-expanded="false" aria-controls="1collapse{{ $row->id }}">
                                            Ver <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-2">  
                                        @foreach ($asignados[$row->subarea] as $key)
                                           @if ($key['id']==$row->asignado_a)
                                                {{$key['nombre']}}
                                           @endif
                                        @endforeach
                                    </div>
                                    <div class="col-sm-1" style="margin:0 0 0 -20px">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm">Opciones</button>
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                </button>
                                                @include('help.otros.opciones')
                                            </div>
                                    </div>   
                                </div>
                            </div>
                            <div id="1collapse{{ $row->id }}" class="collapse" aria-labelledby="1heading{{ $row->id }}" data-parent="#Examplemenu4">
                                @include('help.otros.ver')
                            </div>
                        </div>
                    @endif
                @endforeach
            </div><br><br><br><br>
        </div> 
        <!-- Aprobados -->
        <div id="menu5" class="container tab-pane fade col-sm-12">
            <div class="row text-center" style="margin:0 8px 8px 8px">
                <div class="col-sm-1"><b>Id</b></div>
                <div class="col-sm-1"><b>Fecha</b></div>
                <div class="col-sm-1"><b>Dias</b></div>
                <div class="col-sm-2"><b>Usuario</b></div>
                <div class="col-sm-1"><b>Tipo</b></div>
                <div class="col-sm-2"><b>Subárea</b></div>
                <div class="col-sm-1"><b>Descripción</b></div>
                <div class="col-sm-1"><b>Opciones</b></div>
            </div>
            <div class="accordion" id="Examplemenu5">
                @foreach($reports as $row)
                    @if ($row->estado==3)
                        <div class="card">
                            <div class="card-header" id="3heading{{ $row->id }}">
                                <div class="row text-center"> 
                                    <div class="col-sm-1">{{ $row->id }}</div>
                                    @php  $d=strtotime($row->created_at);   @endphp
                                    <div class="col-sm-1" style="margin-left:0">{{ date("Y.m.d", $d) }}</div>
                                    <div class="col-sm-1">{{ $row->dias_sin }}</div>
                                    <div class="col-sm-2">{{ $row->nombre }}</div>
                                    <div class="col-sm-1">{{ $row->requerimiento }}</div>
                                    <div class="col-sm-2">{{ $row->subarea }}</div>
                                    <div class="col-sm-1">  
                                        <a href=""   class="collapsed" data-toggle="collapse" data-target="#3collapse{{ $row->id }}" aria-expanded="false" aria-controls="3collapse{{ $row->id }}">
                                            Ver <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1" style="margin:0 0 0 -20px">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm">Opciones</button>
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            @include('help.otros.opciones')
                                        </div>
                                            
                                    </div>   
                                </div>
                            </div>
                            <div id="3collapse{{ $row->id }}" class="collapse" aria-labelledby="3heading{{ $row->id }}" data-parent="#Examplemenu5">
                                @include('help.otros.ver')
                            </div>
                        </div>
                    @endif
                @endforeach
            </div><br><br><br><br>
        </div> 
         <!-- filtros -->
        <div id="menu6" class="container tab-pane active col-sm-12">
            @if(count($consulta)>0)
            Por favor selecciona para ver las asignaciones en tu área
                <select class="custom-select custom-select-sm" id="consulta">
                    @foreach ($consulta as $item)
                        <option value="{{$item->nombre_asig}}">{{$item->nombre_asig}} ({{$item->cant}})</option>
                    @endforeach
                </select>
                <br><br>
                <div class="row text-center" style="margin:0 8px 8px 8px">
                        <div class="col-sm-1"><b>Id</b></div>
                        <div class="col-sm-1"><b>Fecha</b></div>
                        <div class="col-sm-1"><b>Dias</b></div>
                        <div class="col-sm-2"><b>Usuario</b></div>
                        <div class="col-sm-1"><b>Tipo</b></div>
                        <div class="col-sm-2"><b>Subárea</b></div>
                        <div class="col-sm-1"><b>Descripción</b></div>
                        <div class="col-sm-1"><b>Opciones</b></div>
                </div>
                <div class="accordion" id="resultconsulta">

                </div>
                @else 
                    <div class="alert alert-primary" role="alert">
                        No tienes requerimientos asignados, gracias
                    </div>
                @endif
                
        </div> 
    </div>
</div>

<!-- Modal Asignar-->
@foreach($reports as $row)
    <div class="modal fade" id="Modalasignar{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelasignar" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-contentasignar">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabelasignar">Asignación de Requerimientos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <form action="/asignarhelp" method="post">
            {{csrf_field()}}
                <div class="form-group row">
                    <label for="asunto" class="col-sm-2 col-form-label">Subarea</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="subarea" value="{{ $row->subarea }}" readonly>
                    </div>
                </div>
                <input type="text" value="{{ $row->id }}" name="id" hidden>
                <input type="text" value="{{ $row->users_id }}" name="user_id" hidden>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Asunto</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{ $row->asunto }}" readonly>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" readonly>{{ $row->descripcion }}</textarea>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Asignar</label>
                        <div class="col-sm-10">
                                <select class="form-control" name="asignado_a">
                                    @foreach ($asignados[$row->subarea] as $key)
                                        <option value="{{$key['id']}}">{{$key['nombre']}}</option>
                                    @endforeach
                                </select>
                        </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Asignar</button>
          </div>
        </form>
        </div>
      </div>
    </div>
@endforeach

<!-- Modal Aprobar-->
@foreach($reports as $row)
    <div class="modal fade" id="Modalaprobar{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelasignar" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-contentasignar">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabelasignar">Aprobación de Requerimientos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                
           <form action="/aprobarhelp" method="post">
            {{csrf_field()}}
                <div class="form-group row">
                    <label for="asunto" class="col-sm-2 col-form-label">Subarea</label>
                    <div class="col-sm-10">
                        @if ($row->area=='Sistemas')
                            <select class="form-control" name="subarea">
                                @foreach ($subarea as $item)
                                    @if ($item==$row->subarea)
                                        <option selected>{{$item}}</option>
                                    @else
                                        <option>{{$item}}</option>
                                    @endif
                                @endforeach
                                    
                            </select>
                        @else 
                        <input type="text" class="form-control" name="subarea" value="{{ $row->subarea }}" readonly>  
                        @endif
                        
                    </div>
                </div>
                <input type="text" value="{{ $row->id }}" name="id" hidden>
                <input type="text" value="{{ $row->users_id }}" name="user_id" hidden>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Asunto</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{ $row->asunto }}" readonly>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" readonly>{{ $row->descripcion }}</textarea>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">
                                <select class="form-control" name="aprobado">
                                        <option>Aprobado</option>
                                        <option>Aprobado Parcialmente</option>
                                        <option>No Aprobado</option>
                                </select>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Respuesta Inicial</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="res_aprobado" required></textarea>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Tiempo Aprox. de Solución</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6">
                                    Unidad: <select class="form-control" name="u_tiempo">
                                                  <option>Hora(s)</option>
                                                  <option>Día(s)</option>
                                                  <option>Semana(s)</option>
                                                  <option>Mes(es)</option>
                                          </select>
                                </div>   
                                <div class="col-sm-6">
                                    Valor: <select class="form-control" name="tiempo">
                                                  @for ($i=1; $i < 31; $i++) 
                                                    <option>{{{$i}}}</option>
                                                  @endfor
                                          </select>
                                </div> 
                            </div>   
                        </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Aprobar</button>
          </div>
        </form>
        </div>
      </div>
    </div>
@endforeach

<!-- Modal Documentar-->
@foreach($reports as $row)
    <div class="modal fade" id="Modaldocu{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabeldocu" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-contentasignar">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabelasignar">Documentación de Requerimientos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <form action="/documentar" method="post">
            {{csrf_field()}}
                <div class="form-group row">
                    <label for="asunto" class="col-sm-2 col-form-label">Subarea</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="subarea" value="{{ $row->subarea }}" readonly>
                    </div>
                </div>
                <input type="text" value="{{ $row->id }}" name="id" hidden>
                <input type="text" value="{{ $row->users_id }}" name="user_id" hidden>
                <input type="text" value="{{ $row->admin }}" name="admin_id" hidden>

                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Asunto</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{ $row->asunto }}" readonly>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" readonly>{{ $row->descripcion }}</textarea>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Documentación</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="docu" required></textarea>
                        </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Documentar</button>
          </div>
        </form>
        </div>
      </div>
    </div>
@endforeach

<!-- Modal cambio area-->
@foreach($reports as $row)
    <div class="modal fade" id="Modalcambioa{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelcambioa" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-contentasignar">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabelasignar">Cambio de área de Requerimiento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <form action="/cambioarea" method="post">
            {{csrf_field()}}
                <div class="form-group row">
                    <label for="asunto" class="col-sm-2 col-form-label">Area</label>
                    <div class="col-sm-10">
                            <select class="form-control" id="camareahd" name="area" onchange="cambioarea()">
                                    <option value="Sistemas">Sistemas</option>
                                    <option value="Comunicaciones">Comunicaciones</option>
                                    <option value="Gestión Humana">Gestión Humana</option>
                                    <option value="Compras, Mantenimiento y Mensajería">Compras, Mantenimiento y Mensajería</option>
                                  </select>
                     
                    </div>
                </div>
                <div class="form-group row">
                    <label for="asunto" class="col-sm-2 col-form-label">Subarea</label>
                    <div class="col-sm-10">
                            <select class="form-control" id="camsubareahd" name="subarea">
                                    <option>Redes e Internet</option>
                                    <option>Telefonía</option>
                                    <option>Correo</option>
                                    <option>Impresoras</option>
                                    <option>Equipos de cómputo</option>
                                    <option>Servidores</option>
                                    <option>Sistemas de Información</option>
                                    <option>Zeus</option>
                                    <option>Intranet</option>
                                    <option>Ingreso de Empleado</option>
                                    <option>Retiro de Empleado</option>
                                  </select>
                    </div>
                </div>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Asunto</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{ $row->asunto }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="asunto" class="col-sm-2 col-form-label">Descripción</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" readonly>{{ $row->descripcion }}</textarea>
                            </div>
                        </div>
                    <input type="text" value="{{ $row->id }}" name="id" hidden>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Cambiar área</button>
          </div>
        </form>
        </div>
      </div>
    </div>
@endforeach

<script>
    function cambioarea() {
        area = document.getElementById("camareahd").value;
        if(area=='Sistemas'){
            document.getElementById("camsubareahd").innerHTML = '<option>Redes e Internet</option>\
                                    <option>Telefonía</option>\
                                    <option>Correo</option>\
                                    <option>Impresoras</option>\
                                    <option>Equipos de cómputo</option>\
                                    <option>Servidores</option>\
                                    <option>Sistemas de Información</option>\
                                    <option>Zeus</option>\
                                    <option>Intranet</option>\
                                    <option>Ingreso de Empleado</option>\
                                    <option>Retiro de Empleado</option>'
        }else if(area=='Comunicaciones'){
            document.getElementById("camsubareahd").innerHTML = '<option>Publicación de Contenidos en Intranet</option>\
                                        <option>Publicación de Contenidos Página Web</option>\
                                        <option>Revisión y/o Creación de Contenido</option>\
                                        <option>Mantenimiento y/o Instalación de contenido Imagen Corporativa</option>\
                                        <option>Solicitud de Piezas Publicitarias</option>\
                                        <option>Creación de Campaña Publicitaria</option>\
                                        <option>Creación de Videos Institucionales</option>'
        }else if(area=='Gestión Humana'){
            document.getElementById("camsubareahd").innerHTML = '<option>PQRSF Empleado</option>'
        }else if(area=='Compras, Mantenimiento y Mensajería'){
            document.getElementById("camsubareahd").innerHTML = '<option>Mantenimiento</option>\
                                            <option>Compras</option>\
                                            <option>Mensajeria</option>'
        }
        
    }
</script>
{!! Html::script('/js/jquery.min.js') !!}

<script>
$(function(){


$('#consulta').click(function(){
    html=''

    $.ajax({
        method: "POST",
        url: "api/consultahd",
        data: { name: $(this).val() }
      })
        .done(function( msg ) {
            $('#resultconsulta').html('')
            msg.forEach(dat => {
                $('#resultconsulta').append('<div class="card">\
                            <div class="card-header" id="123heading'+dat.id+'">\
                                <div class="row text-center">\
                                    <div class="col-sm-1">'+dat.id+'</div>\
                                    <div class="col-sm-1" style="margin-left:0">'+dat.created_at+'</div>\
                                    <div class="col-sm-1">'+dat.dias_sin+'</div>\
                                    <div class="col-sm-2">'+dat.nombre+'</div>\
                                    <div class="col-sm-1">'+dat.requerimiento+'</div>\
                                    <div class="col-sm-2">'+dat.subarea+'</div>\
                                    <div class="col-sm-1"> \
                                        <a href=""   class="collapsed" data-toggle="collapse" data-target="#123collapse'+dat.id+'" aria-expanded="false" aria-controls="123collapse'+dat.id+'">\
                                            Ver <i class="fa fa-plus"></i>\
                                        </a>\
                                    </div>\
                                    <div class="col-sm-1" style="margin:0 0 0 -20px">\
                                            <div class="btn-group">\
                                                <button type="button" class="btn btn-primary btn-sm">Opciones</button>\
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">\
                                                    <span class="caret"></span>\
                                                </button>\
                                                <div class="dropdown-menu ">\
                                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#Modaldocu'+dat.id+'">Documentar</a>\
                                                     <a class="dropdown-item" href="" data-toggle="modal" data-target="#Modalasignar'+dat.id+'">Reasignar</a>\
                                                             <a class="dropdown-item" href="/responder/'+dat.id+'">Finalizar</a>\
                                                    </div>\
                                            </div>\
                                    </div>\
                                </div>\
                            </div>\
                            <div id="123collapse'+dat.id+'" class="collapse" aria-labelledby="123heading'+dat.id+'" data-parent="#resultconsulta">\
                                    <div class="card-body">\
    <p>\
            <b>Sede: </b>'+dat.sede+'<br>\
            <b >Asunto: </b>'+dat.asunto+'<br>\
    <b >Tiempo de Solución: </b>'+dat.t_std+' hora(s)<br>\
    <b>Fecha asignación: </b>'+dat.f_asignado+'<br>\
    <b>Prerespuesta Aprobación: </b>'+dat.res_aprobado+'<br>\
    <b>Fecha de Aprobación: </b>'+dat.f_aprobado+'<br>\
    <b>Descripción: </b>'+dat.descripcion+'<br>\
     </p>\
            </div>\
                            </div>\
                        </div>')     
            });
        });
})
})
</script>

@endsection