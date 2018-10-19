@extends('layouts.app') 
@section('content')
<style>
    .modal-content-docu {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 900px;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border-radius: .3rem;
        outline: 0;
        margin-left: -177px;
    }
</style>

<div class="col-sm-12">
    <div class="card text-center">
        <div class="card" style="background:#3db9dc">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="text-white">Bienvenido al Sistema de Gestión Documental Sumimedical</h5> @can('documento.create')
                <a href="#custom-modal" class="btn btn-success btn-sm" data-target="#customModal" data-toggle="modal">Cargar Documento</a> @endcan
                <!-- Modal -->
                <div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content-docu">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2">Gestión Documental</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="tipo">Carpeta</label>
                                        <select class="form-control" id="areahd" name="area" required>
                                            @can('calidad.docs')
                                            <option>Atención Domiciliaria</option>
                                            <option>Administrativo</option>
                                            <option>Calidad</option>
                                            <option>Comunicaciones</option>
                                            <option>Consulta Externa</option>
                                            <option>Contratación</option>
                                            <option>Compras y Mantenimiento</option>
                                            <option>Evaluación y Mejoramiento</option>
                                            <option>Farmacia</option>
                                            <option>Gestión de Solicitudes</option>
                                            <option>Gestión del Riesgo</option>
                                            <option>Gestión Financiera</option>
                                            <option>Gestión Humana</option>
                                            <option>Medicina Laboral</option> 
                                            <option>Planeación Estrategica</option>
                                            <option>Referencia</option>
                                            <option>Seguridad y Salud en e Trabajo</option>
                                            <option>Sistemas</option>
                                            <option>Proceso</option>
                                            <option>PAMEC</option>
                                            <option>Servicio al Cliente</option>
                                            @endcan
                                            @can('juri.docs')
                                            <option>Jurídica</option>
                                            @endcan
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="tipo">Sub-Carpeta</label>
                                        <select class="form-control" id="areahd" name="tipo" required>
                                            @can('calidad.docs')
                                            <option>Manual</option>
                                            <option>Matriz</option>
                                            <option>Procedimiento</option>
                                            <option>Instructivo</option>
                                            <option>Formato</option>
                                            <option>Ficha Técnica</option>
                                            <option>Guía</option>
                                            <option>Otros Documentos</option>
                                            <option>Protocolo</option>
                                            <option>Política</option>
                                            @endcan
                                            @can('juri.docs')
                                            <option>Respuesta Tutelas</option>
                                            <option>Respuesta Desacato</option>
                                            <option>Respuesta Derechos de Petición</option>
                                            <option>Respuesta Sanción</option>
                                            <option>Acciones de Tutela</option>
                                            <option>Falló de Tutela</option>
                                            <option>Requerimientos</option>
                                            <option>Incidentes de Desacato</option>
                                            <option>Medidas Provisionales</option>
                                            <option>Respuestas Medidas Provisionales</option>
                                            <option>Sanciones</option>
                                            <option>Memoriales</option>
                                            <option>Otros</option>
                                            @endcan
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Descripción del Documento:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="descripcion" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p class="text-danger" style="font-size:17px"><i><b>Recuerde: los archivos no pueden contener tildes ni caracteres especiales en el nombre.</b></i></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Cargar Archivo (Max. 10MB, jpg, jpeg, pdf, word, excel)</label>
                                        <div class="col-md-12">
                                            <input id="documentgd" type="file" class="form-control" name="archivo" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Cargar Documento</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Inicio de contenido del card -->
        <div class="container" style="padding-right: 20px; padding-left: 20px;margin-bottom: -24px;">
                <div class="breadcrumb-holder">
                    <ol class="breadcrumb float-left" style="margin-butom:2px">
                        <a href="/documento"><li class="breadcrumb-item active">Inicio</li></a>
                        <li class="breadcrumb-item"></li>
                    </ol>
                    <div class="clearfix"></div>
                </div> 
            </div>
        <div class="col-sm-12 card-header">
            <div class="row">
                @foreach ($reports as $report)
                @if($report->area != 'Jurídica')
                   
                    <div class="col-sm-2">
                    <a href="/documento/sub/{{$report->area}}">
                        <div><img src="/img/iconos/conarchivo.png" style="width:42px"></div>
                        <div><span> <b>{{$report->area}}</b></span></div>
                    </a>
                </div>
                @else
                   @can('juri.docs')
                    <div class="col-sm-2">
                    <a href="/documento/sub/{{$report->area}}">
                        <div><img src="/img/iconos/conarchivo.png" style="width:42px"></div>
                        <div><span> <b>{{$report->area}}</b></span></div>
                    </a>
                </div>
                @endcan
                @endif

                @endforeach

            </div>
        </div>

    </div>
</div>

{!! Html::script('/js/jquery.min.js') !!}

<script>
    $(function(){ 
        $(document).on('change','#documentgd',function(){
	    // this.files[0].size recupera el tamaño del archivo
	    // alert(this.files[0].size);
	
	    var fileName = this.files[0].name;
	    var fileSize = this.files[0].size;

	    if(fileSize > 10000000){
            toastr.error("El archivo no debe superar los 10MB");
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
@endsection
