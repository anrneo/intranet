@extends('layouts.app')
@section('content')
<style>
.modal-content-permiso{
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
	width: 903px;
	margin-left: -200px;
}
</style>
<div class="col-sm-12">
	<div class="card">
		<img class="card-img-top" src="/img/sites/12.jpg" style="height:249px; border-top:3px solid #8abc37"">
		</div>
		<div class="row">
			<div class="col-sm-5">
				<div class="card" style="font-size:16px; border-top:3px solid #8abc37">
					Eventos
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card" style="font-size:16px; border-top:3px solid #8abc37">
					Temas
				</div>
			</div>
			<div class="col-sm-3">
				<div id="accordion">
					<div class="card">
						<div class="card-header" style="font-size:16px; border-top:3px solid #8abc37">
							<a class="card-link" data-toggle="collapse" href="#collapseOne">
								Tramites y Solicitudes
							</a>
						</div>
						<div id="collapseOne" class="collapse show" data-parent="#accordion">
							<div class="card-body col-12">
								<button type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#certificado" data-whatever="@mdo">Generar Certificado Laboral</button>
								<button type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#Permiso" data-whatever="@mdo">Permiso - Licencia - Vacaciones</button>
							</div>
						</div>
					</div>
				<!--<div class="card">
					<div class="card-header">
						<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
							Formatos
						</a>
					</div>
					<div id="collapseTwo" class="collapse" data-parent="#accordion">
						<div class="card-body">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
							Collapsible Group Item #3
						</a>
					</div>
					<div id="collapseThree" class="collapse" data-parent="#accordion">
						<div class="card-body">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</div>
					</div>
				</div>-->
			</div>
		</div>
		<!-- Inicio del modal de Solicitud de Permisos -->
		<div class="modal fade" id="Permiso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content-permiso" style="border-top:4px solid #312782">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Sistema de Solicitud de Permisos, Licencias o Vacaciones</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<img src="/img/noticias/permiso.jpg" style="width:870px">
						 <form method="post" enctype="multipart/form-data">
					        @csrf
					        <div class="row">
					            <div class="form-group col-md-5">
					              <label for="nombre">Nombre del Funcionario:</label>
					              <input type="text" class="form-control" name="nombre" value="{{ Auth::user()->name }}" disabled>
					            </div>
						        <div class="form-group col-md-4">
						            <label for="sede">Sede:</label>
						            <input type="text" class="form-control" name="sede" value="{{ Auth::user()->sede }}" disabled>
						          </div>
					            <div class="form-group col-md-3">
					              <label for="cedula">Cédula:</label>
					              <input type="text" class="form-control" name="cedula" value="{{ Auth::user()->cedula }}" disabled>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-md-5">
					              <label for="cargo">Cargo del Funcionario:</label>
					              <input type="text" class="form-control" name="cargo" value="{{ Auth::user()->cargo }}" disabled>
					            </div>
						        <div class="form-group col-md-4">
						            <label for="area">Area:</label>
						            <input type="text" class="form-control" name="area" value="{{ Auth::user()->area }}" disabled>
						          </div>
					            <div class="form-group col-md-3">
					              <label for="fecha">Fecha de Solicitud:</label>
					              <input type="text" class="form-control" name="fecha" value="{{ now() }}" disabled>
					            </div>
					        </div>
					        <div class="row">
					        	<div class="form-group col-md-4">
					                <lable>Tipo de Permiso</lable>
					                <select name="office" class="form-control">
					                  <option value="Mumbai">Permiso</option>
					                  <option value="Chennai">Licencia</option>
					                  <option value="Delhi">Vacaciones</option>
					                </select>
					            </div>
					            <div class="form-group col-md-4">
					            	<strong>Date : </strong>  
					            	<input class="date form-control"  type="text" id="datepicker" name="date">   
					         	</div>
					            <div class="form-group col-md-4">
					            	<strong>Date : </strong>  
					            	<input class="date form-control"  type="text" id="datepicker" name="date">   
					         	</div>
					        </div>
					        <div class="row">
					          
					        </div>
					         <div class="row">
					            <div class="form-group col-md-4">
					            <input type="file" name="filename">    
					         </div>
					        </div>
					        <div class="row">
					          <div class="form-group col-md-4" style="margin-top:60px">
					            <button type="submit" class="btn btn-success">Submit</button>
					          </div>
					        </div>
					      </form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Send message</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin del modal de Solicitud de Permisos -->

	<!-- Inicio del modal de Solicitud de Permisos -->
	<div class="modal fade" id="certificado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content-permiso" style="border-top:4px solid #312782">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Descargar Certificado Laboral</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="jumbotron">
						<b>Nota:</b> Recuerde Sr(a) {{ Auth::user()->name }} que este Certificado es extraido con el usuario que se encuentre logueado en la intranet
						por securidad no divulgue sus creenciales de ingreso a la intranet!
					</div>
					<a href="{{ url('/pdf') }}"><button type="button" class="btn btn-success"> Generar Certificado</button></a>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Fin del modal de Solicitud de Permisos -->
</div>
</div>
</div>
@stop