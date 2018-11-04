@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

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
      <h5>Verificación de Solicitudes de Traslados Aéreos</h5> 
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link " id="Nuevos-tab" data-toggle="tab" href="#Nuevos" role="tab" aria-controls="Nuevos" aria-selected="true">Nuevos <span class="badge badge-primary">{{$datos[0]}}</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="Verificados-tab" data-toggle="tab" href="#Verificados" role="tab" aria-controls="Verificados" aria-selected="false">Verificados <span class="badge badge-primary">{{$datos[1]}}</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="Aprobados-tab" data-toggle="tab" href="#Aprobados" role="tab" aria-controls="Aprobados" aria-selected="false">Aprobados <span class="badge badge-primary">{{$datos[2]}}</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="Total-tab" data-toggle="tab" href="#Total" role="tab" aria-controls="Total" aria-selected="false">Total <span class="badge badge-primary">{{$datos[4]}}</span></a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade " id="Nuevos" role="tabpanel" aria-labelledby="Nuevos-tab">
        <table class="table table-hover table-sm">
          <thead class="text-center">
            <tr>
              <th>Usuario</th>
              <th>Fecha</th>
              <th>Sede</th>
              <th>Origen</th>
              <th>Destino</th>
              <th>Archivos</th>
              <th>Verificar</th>
            </tr>
          </thead>
          <tbody class="text-center">
              @foreach ($dat as $da)
                @if ($da->estado==0)
                  <tr>
                    <th>{{$da->nom_user}}</th>
                    <th>{{$da->created_at}}</th>
                    <td>{{$da->sede}}</td>
                    <td>{{$da->ciudad1}}</td>
                    <td>{{$da->ciudad2}}</td>
                    <td><a href="#" id="files{{$da->id}}"><i class="fas fa-paperclip"></i></a></td>
                    <td><a href="#" data-toggle="modal" data-target="#Modalaprobar{{ $da->id }}"><i class="far fa-check-square"></i></a></td>
                  </tr>
                @endif
              @endforeach
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="Verificados" role="tabpanel" aria-labelledby="Verificados-tab">
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
                    @if ($da->estado==1 || $da->estado==2)
                      <tr>
                        <th>{{$da->nom_user}}</th>
                        <th>{{$da->created_at}}</th>
                        <td>{{$da->sede}}</td>
                        <td>{{$da->ciudad1}}</td>
                        <td>{{$da->ciudad2}}</td>
                        <td><a href="#" id="files{{$da->id}}"><i class="fas fa-paperclip"></i></a></td>
                        @if ($da->estado==1)
                        <td><i class="fas fa-user-check" style="color:blue"></i></td>
                        @else
                        <td><i class="fas fa-user-times" style="color:red"></i></td>
                        @endif
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
                        <td><a href="#" data-toggle="modal" data-target="#Modalaprobar1{{ $da->id }}"><i class="fas fa-plane" style="color:green"></i></a></td>
                        @elseif($da->estado==31)
                        <td><i class="fas fa-plane" style="color:red"></i></td>
                        @endif
                      </tr>
                    @endif
                  @endforeach
              </tbody>
          </table>
      </div>
      <div class="tab-pane fade show active" id="Total" role="tabpanel" aria-labelledby="Total-tab">
          <select class="form-control form-control-sm" id="consultiq" name="consultiq">
              @foreach ($consul as $con )
                <option value="{{$con->estado}}">({{$con->cant}})</option>
              @endforeach
           
          </select>
          <div id="result">
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
                          <tr>
                            <th>{{$da->nom_user}}</th>
                            <th>{{$da->id_user}}</th>
                            <th>{{$da->created_at}}</th>
                            <td>{{$da->sede}}</td>
                            <td>{{$da->ciudad1}}</td>
                            <td>{{$da->ciudad2}}</td>
                            <td><a href="#" id="files{{$da->id}}"><i class="fas fa-paperclip"></i></a></td>
                              @if ($da->estado==1)
                            <td><i class="fas fa-user-check" style="color:blue"></i></td>
                              @elseif($da->estado==2)
                            <td><i class="fas fa-user-times" style="color:red"></i></td>
                              @elseif($da->estado==0)
                            <td><a href="#" data-toggle="modal" data-target="#Modalaprobar{{ $da->id }}"><i class="far fa-check-square"></i></a></td>
                              @elseif($da->estado==3)
                            <td><a href="#" data-toggle="modal" data-target="#Modalaprobar1{{ $da->id }}"><i class="fas fa-plane" style="color:green"></i></a></td>
                            @elseif($da->estado==31)
                            <td><i class="fas fa-plane" style="color:red"></i></td>
                              @elseif($da->estado==4)
                          <td><a href="/intranet/public/storage/{{$da->path4}}" target="_blank"><i class="far fa-check-circle text-success" style="color:DodgerBlue"></i></a></td>
                              @endif
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
         
      </div>
    </div>
   
   <!-- Modal Verificar-->
@foreach($dat as $row)
  <div class="modal fade" id="Modalaprobar{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelaprobar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-contentasignar">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabelaprobar">Verificación de Traslados Aéreos</h5>
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
            

        <form action="/verificartiqae" method="post">
          {{csrf_field()}}
              <input type="text" value="{{ $row->id }}" name="id" hidden>
              <input type="text" value="{{ $row->nom_user }}" name="nom_user" hidden>
              <input type="text" value="{{ $row->mail_user }}" name="mail_user" hidden>
              <input type="text" value="{{ $row->ciudad1 }}" name="ciudad1" hidden>
              <input type="text" value="{{ $row->dpto1 }}" name="dpto1" hidden>
              <input type="text" value="{{ $row->ciudad2 }}" name="ciudad2" hidden>
              <input type="text" value="{{ $row->dpto2 }}" name="dpto2" hidden>
              <input type="text" value="{{ $row->sede }}" name="sede" hidden>
              <div class="form-group row">
                      <label for="asunto" class="col-sm-2 col-form-label">Estado</label>
                      <div class="col-sm-10">
                              <select class="form-control" name="estado">
                                      <option value="1">Cumple los requisitos</option>
                                      <option value="2">No cumple los requisitos</option>
                              </select>
                      </div>
              </div>
              <div class="form-group row">
                      <label for="asunto" class="col-sm-2 col-form-label">Respuesta Inicial</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="res_verifica" required></textarea>
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

 <!-- Modal Confirmación-->
@foreach($dat as $row)
 <div class="modal fade" id="Modalaprobar1{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelaprobar1" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-contentasignar">
       <div class="modal-header">
         <h5 class="modal-title" id="ModalLabelaprobar1">Confirmar Tiquetes de Traslados Aéreos</h5>
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
           

       <form action="/confirmartiqae" method="post" enctype="multipart/form-data">
         {{csrf_field()}}
             <input type="text" value="{{ $row->id }}" name="id" hidden>
             <input type="text" value="{{ $row->nom_user }}" name="nom_user" hidden>
              <input type="text" value="{{ $row->mail_user }}" name="mail_user" hidden>
              <input type="text" value="{{ $row->ciudad1 }}" name="ciudad1" hidden>
              <input type="text" value="{{ $row->dpto1 }}" name="dpto1" hidden>
              <input type="text" value="{{ $row->ciudad2 }}" name="ciudad2" hidden>
              <input type="text" value="{{ $row->dpto2 }}" name="dpto2" hidden>
              <input type="text" value="{{ $row->sede }}" name="sede" hidden>
             <div class="form-group row">
                     <label for="asunto" class="col-sm-2 col-form-label">Valor Ticket</label>
                     <div class="col-sm-10">
                        <input class="col-sm-10" type="number" name="valor_confirm" required>
                     </div>
             </div>
             <div class="form-group row">
                <label for="asunto" class="col-sm-2 col-form-label">N° Id Ticket</label>
                <div class="col-sm-10">
                   <input class="col-sm-10" type="number" name="idtiq" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="asunto" class="col-sm-2 col-form-label">Reserva</label>
                <div class="col-sm-10">
                   <input class="col-sm-10" type="text" name="reserva" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="asunto" class="col-sm-4 col-form-label">Copia de Ticket <small style="color:red">(Max. 3Mb, Pdf)</small></label>
                <div class="col-sm-8">
                   <input class="form-control-file" type="file" name="file_tick" required>
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
@endforeach
</div>


{!! Html::script('/js/jquery.min.js') !!}
<script>

  dat=@json($dat);

$('#consultiq').change(function(){
  $('#result').html('<table class="table table-hover table-sm">\
                  <thead class="text-center">\
                    <tr>\
                      <th scope="col">Id</th>\
                      <th scope="col">Usuario</th>\
                      <th scope="col">Identificación</th>\
                      <th scope="col">Fecha</th>\
                      <th scope="col">Sede</th>\
                      <th scope="col">Origen</th>\
                      <th scope="col">Destino</th>\
                      <th scope="col">Archivos</th>\
                      <th scope="col">Estado</th>\
                    </tr>\
                  </thead>\
                  <tbody class="text-center">')
  dat.forEach(da => {
    if (da.estado==$(this).val()) {
      $('#result').append('<tr>\
                            <th>'+da.id+'</th>\
                            <th>'+da.nom_user+'</th>\
                            <th>'+da.id_user+'</th>\
                            <th>'+da.created_at+'</th>\
                            <td>'+da.sede+'</td>\
                            <td>'+da.ciudad1+'</td>\
                            <td>'+da.ciudad2+'</td>\
                            <td><a href="#" id="files'+da.id+'"><i class="fas fa-paperclip"></i></a></td>\
                             <td><a href="#" data-toggle="modal" data-target="#Modalaprobar'+da.id+'"><i class="far fa-check-square"></i></a></td>\
                          </tr>')
    }
  });
  $('#result').append('</tbody></table>')
      })


  
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
 
    $(document).on('change','input[type="file"]',function(){
	    // this.files[0].size recupera el tamaño del archivo
	    // alert(this.files[0].size);
	
	    var fileName = this.files[0].name;
	    var fileSize = this.files[0].size;

	    if(fileSize > 3000000){
            toastr.options = { "closeButton":true, "progressBar": true};
            toastr.error("El archivo no debe superar los 3MB");
		this.value = '';
		this.files[0].name = '';
	    }else{
		// recuperamos la extensión del archivo
		var ext = fileName.split('.').pop();

		// console.log(ext);
		switch (ext) {
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
  
</script>
@endsection

