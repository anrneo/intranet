@extends('layouts.app')
@section('content')
<div class="col-sm-12">
 <style>
 .modal-content {
  width: 912px;
}
.align-items-center {
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important;
    padding-bottom: 1px;
}
.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    padding-top: 1px;
}
.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1px;
}
.modal-content {
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
    margin-left: -20px;
}
</style>
<div class="card text-center">
  <div class="card-header">
   <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="text-center">Gestión Documental</h5>
            @can('documento.create')
            <a href="#custom-modal" class="btn btn-primary btn-sm" data-target="#customModal" data-toggle="modal">Cargar Documento</a>
             @endcan   
                <!-- Modal -->
                <div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                  <div class="modal-content">
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
                  <label for="tipo">Tipo de Documento</label>
                  <select class="form-control" id="areahd" name="tipo" required>
                    <option>Formato</option>
                    <option>Procedimiento</option>
                    <option>Historias Clinicas</option>
                    <option>Anexos</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tipo">Area</label>
                  <select class="form-control" id="areahd" name="area" required>
                    <option>Tecnología</option>
                    <option>Calidad</option>
                    <option>Gestión Humana</option>
                    <option>Comunicaciones</option>
                    <option>Administrativo</option>
                    <option>Compras y Mantenimiento</option>
                    <option>Servicio al Cliente</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Descripción del Documento:</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" name="descripcion" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Cargar Archivo</label>
                  <div class="col-md-6">
                    <input type="file" class="form-control" name="archivo" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Cargar Documento</button>
                </div>
              </div>

            </form>
                    </div>
                    
                  </div>
                  </div>
                </div>
          </div>
  </div>

  <div class="card-body">
    <!--Inicio de contenido del card -->
    
    <div class="panel-body">

        <table class="table-response table-hover table table-bordered">
          <thead>
            <tr>
              <th class="text-center" style="width:135px">Tipo</th>
              <th class="text-center" style="width:135px">Area</th>
              <th class="text-center" style="width:260px">Usuario</th>
              <th class="text-center" style="width:220px">Descripción</th>
              <th class="text-center">Descargar Archivo</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reports as $report)
            <tr>
              <td>{{ $report->tipo }}</td>
              <td>{{ $report->area }}</td>
              <td>{{ $report->nombre }}</td>
              <td>{{ $report->descripcion }}</td>
              <td> <a href="/descargar/{{ $report->id }}">{{ $report->archivo }}</a></td>
              <!-- Ver ROL-->
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $reports->render()}}
      </div>
      
    <!--Fin de contenido del card -->
    
              <!--inicio contenido -->
              
  
</div>

    </div>
  </div>
</div>
</div>
@endsection