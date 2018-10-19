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
</style>
<div class="col-sm-12">  
  <h5>Mis Asignaciones del Gestor de Solicitudes</h5>
  <br>
  
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu4">Asignados <span class="badge badge-primary">{{$num_asig}}</span></a>
        </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu3">Solucionados <span class="badge badge-primary">{{$soluci}}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#menu2">Total <span class="badge badge-primary">{{$tot}}</span></a>
    </li>
  </ul>
  @if ($tot>0)
    <br>
  <!-- Tab panes -->
    <div class="tab-content">
        <!-- Total -->
        <div id="menu2" class="container tab-pane active col-sm-12">
            <div class="row text-center" style="margin:0 8px 8px 8px"> 
                <div class="col-sm-1"><b>Id</b></div>
                <div class="col-sm-1"><b>Fecha</b></div>
                <div class="col-sm-1"><b>Dias</b></div>
                <div class="col-sm-1"><b>Tipo</b></div>
                <div class="col-sm-2"><b>Area</b></div>
                <div class="col-sm-2"><b>Subárea</b></div>
                <div class="col-sm-2"><b>Usuario</b></div>
                <div class="col-sm-1"><b>Descripción</b></div>
                <div class="col-sm-1"><b>Opciones</b></div>       
            </div>
            <div class="accordion" id="Examplemenu2">
                @foreach($reports as $row)
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
                                <div class="col-sm-1">{{ $row->requerimiento }}</div>
                                <div class="col-sm-2">{{ $row->area }}</div>
                                <div class="col-sm-2">{{ $row->subarea }}</div>
                                <div class="col-sm-2">{{ $row->nombre }}</div>
                                <div class="col-sm-1">  
                                    <a href=""   class="collapsed" data-toggle="collapse" data-target="#{{ $row->id }}collapse{{ $row->id }}" aria-expanded="false" aria-controls="{{ $row->id }}collapse{{ $row->id }}">
                                        Ver <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="col-sm-1" style="margin: 0 0 0 -12px">  
                                    @if ($row->estado!=2)
                                       <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm">Opciones</button>
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                </button>
                                                @include('help.otros.opciones')
                                        </div>
                                    @else
                                        Solucionado
                                    @endif
                                </div>         
                            </div>   
                        </div>
                        <div id="{{ $row->id }}collapse{{ $row->id }}" class="collapse" aria-labelledby="{{ $row->id }}heading{{ $row->id }}" data-parent="#Examplemenu2">
                            @include('help.otros.ver')
                        </div>
                    </div>
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
                                        @if ($row->estado==2)
                                            {{ $row->dias }}
                                        @else
                                            {{ $row->dias_sin }}
                                        @endif
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
                                @include('help.otros.ver')
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
                <div class="col-sm-1"><b>Tipo</b></div>
                <div class="col-sm-2"><b>Area</b></div>
                <div class="col-sm-2"><b>Subárea</b></div>
                <div class="col-sm-2"><b>Usuario</b></div>
                <div class="col-sm-1"><b>Descripción</b></div>
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
                                    <div class="col-sm-2">{{ $row->nombre }}</div>
                                    <div class="col-sm-1">  
                                        <a href=""   class="collapsed" data-toggle="collapse" data-target="#1collapse{{ $row->id }}" aria-expanded="false" aria-controls="1collapse{{ $row->id }}">
                                            Ver <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1" style="margin:0 0 0 -12px">
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
    </div> 
</div>
@else
<br>
<div class="alert alert-primary">
    <strong>No Tienes Asignaciones por Responder del  Gestor de Solicitudes, gracias</strong>
</div> 
</div>    
@endif
<!-- Modal -->
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
                        <label for="asunto" class="col-sm-2 col-form-label">Respuesta</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="res_aprobado" required></textarea>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="asunto" class="col-sm-2 col-form-label">Fecha de Entrega</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="f_entrega">
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

@endsection