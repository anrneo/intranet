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
i {
  font-size: 15px;
}
</style>
<div class="col-sm-12">
    <div class="card-header text-center">
      <h5>Aprobación Médica de Solicitudes de Traslados Aéreos</h5> 
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
     <li class="nav-item">
        <a class="nav-link active" id="Verificados-tab" data-toggle="tab" href="#Verificados" role="tab" aria-controls="Verificados" aria-selected="false">Verificados <span class="badge badge-primary">{{$datos[0]}}</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="Aprobados-tab" data-toggle="tab" href="#Aprobados" role="tab" aria-controls="Aprobados" aria-selected="false">Aprobados <span class="badge badge-primary">{{$datos[1]}}</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="Total-tab" data-toggle="tab" href="#Total" role="tab" aria-controls="Total" aria-selected="false">Total <span class="badge badge-primary">{{$datos[2]}}</span></a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Verificados" role="tabpanel" aria-labelledby="Verificados-tab">
          <table class="table table-hover table-sm">
              <thead class="text-center">
                <tr>
                  <th scope="col">Usuario</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Sede</th>
                  <th scope="col">Origen</th>
                  <th scope="col">Destino</th>
                  <th scope="col">Archivos</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody class="text-center">
                  @foreach ($dat as $da)
                    @if ($da->estado==1)
                      <tr>
                        <th>{{$da->nom_user}}</th>
                        <th>{{$da->created_at}}</th>
                        <td>{{$da->sede}}</td>
                        <td>{{$da->ciudad1}}</td>
                        <td>{{$da->ciudad2}}</td>
                        <td><a href="#" id="files{{$da->id}}"><i class="fas fa-paperclip"></i></a></td>
                        <td><a href="#" data-toggle="modal" data-target="#Modalaprobar1{{ $da->id }}"><i class="fas fa-user-check" style="color:blue"></i></a></td>
                       </tr>
                    @endif
                  @endforeach
              </tbody>
          </table>
      </div>
      <div class="tab-pane fade" id="Aprobados" role="tabpanel" aria-labelledby="Aprobados-tab">
          <table class="table table-hover table-sm">
              <thead class="text-center">
                <tr>
                  <th scope="col">Usuario</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Sede</th>
                  <th scope="col">Origen</th>
                  <th scope="col">Destino</th>
                  <th scope="col">Archivos</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody class="text-center">
                  @foreach ($dat as $da)
                    @if ($da->estado==3 || $da->estado==31)
                      <tr>
                        <th>{{$da->nom_user}}</th>
                        <th>{{$da->created_at}}</th>
                        <td>{{$da->sede}}</td>
                        <td>{{$da->ciudad1}}</td>
                        <td>{{$da->ciudad2}}</td>
                        <td><a href="#" id="files{{$da->id}}"><i class="fas fa-paperclip"></i></a></td>
                        @if ($da->estado==3)
                        <td><i class="fas fa-plane" style="color:green"></i></td>
                        @else
                        <td><i class="fas fa-plane" style="color:red"></i></td>
                        @endif
                        
                      </tr>
                    @endif
                  @endforeach
              </tbody>
          </table>
      </div>
      <div class="tab-pane fade" id="Total" role="tabpanel" aria-labelledby="Total-tab">
          <table class="table table-hover table-sm">
              <thead class="text-center">
                <tr>
                  <th scope="col">Usuario</th>
                  <th scope="col">Identificación</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Sede</th>
                  <th scope="col">Origen</th>
                  <th scope="col">Destino</th>
                  <th scope="col">Archivos</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody class="text-center">
                  @foreach ($dat as $da)
                    @if ($da->estado==3 || $da->estado==31 || $da->estado==1)
                      <tr>
                        <th>{{$da->nom_user}}</th>
                        <th>{{$da->id_user}}</th>
                        <th>{{$da->created_at}}</th>
                        <td>{{$da->sede}}</td>
                        <td>{{$da->ciudad1}}</td>
                        <td>{{$da->ciudad2}}</td>
                        <td><a href="#" id="files{{$da->id}}"><i class="fas fa-paperclip"></i></a></td>
                          @if ($da->estado==1)
                          <td><a href="#" data-toggle="modal" data-target="#Modalaprobar1{{ $da->id }}"><i class="fas fa-user-check" style="color:blue"></i></a></td>
                          @elseif($da->estado==3)
                        <td><i class="fas fa-plane" style="color:green"></i></td>
                        @elseif($da->estado==31)
                        <td><i class="fas fa-plane" style="color:red"></i></td>
                        @endif
                      </tr>
                      @endif
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
   

 <!-- Modal Aprobación-->
@foreach($dat as $row)
    @if ($row->estado==1)
        <div class="modal fade" id="Modalaprobar1{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelaprobar1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-contentasignar">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabelaprobar1">Aprobación Médica de Traslados Aéreos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <b>Nombre:                </b>{{ $row->nom_user }} <br>
                    <b>Punto de Atención:     </b> {{ $row->pa_user }} <br>
                    <b>Sede de Radicación:     </b> {{ $row->sede }} <br>
                    <b>Tipo de Identificación:     </b> {{ $row->tipoid_user }} <br>
                    <b>Número de Identificación:     </b> {{ $row->id_user }} <br>
                    <b>Correo:     </b> {{ $row->mail_user }} <br>
                    <b>Origen del Traslado:     </b> {{ $row->ciudad1 }} ({{ $row->dpto1 }}) <br>
                    <b>Destino del Traslado:     </b> {{ $row->ciudad2 }} ({{ $row->dpto2 }}) <br>
                

            <form action="/apruebatiqae" method="post">
                {{csrf_field()}}
                    <input type="text" value="{{ $row->id }}" name="id" hidden>
                    
                    <div class="form-group row">
                            <label for="asunto" class="col-sm-2 col-form-label">Estado</label>
                            <div class="col-sm-10">
                                    <select class="form-control" name="estado">
                                            <option value="3">Aprobado</option>
                                            <option value="31">No Aprobado</option>
                                    </select>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="asunto" class="col-sm-2 col-form-label">Observaciones</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="res_aprueba" required></textarea>
                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    @endif
@endforeach
</div>


{!! Html::script('/js/jquery.min.js') !!}
<script>
  dat=@json($dat);
  $(function(){
   
  $('a').click(function(){
    
      idf=$(this).attr('id')
   
      
      dat.forEach(da => {
        id='files'+da.id
         if (id==idf) {
           window.open('/intranet/public/storage/'+da.path1);
           window.open('/intranet/public/storage/'+da.path2);
           window.open('/intranet/public/storage/'+da.path3);
         }
    })
    })
    })
 
  
  
</script>
@endsection

