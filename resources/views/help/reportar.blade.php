@extends('layouts.app')
@section('content')

<div class="col-sm-12" style="width:800px">
  <div class="card">
      <img class="card-img-top" src="/img/sites/help.jpg" style="border-top:3px solid #8abc37">
  </div>
  <br>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="" method="post" enctype="multipart/form-data" id="reportehd">
    {{csrf_field()}}
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{Auth::user()->name}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
          <input type="text" class="form-control" id="cargo" name="cargo" value="{{Auth::user()->cargo}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="sede" class="col-sm-12 col-form-label">Selecciona la sede a la que perteneces </label>
          <select class="form-control" id="sede" name="sede">
            @foreach ($sedes as $sede)
            <option>{{ $sede }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="area" class="col-sm-12 col-form-label">Destino del requerimiento</label>
          <select class="form-control" id="areahd" name="area">
            <option>Sistemas</option>
            <option>Comunicaciones</option>
            <option>Gestión Humana</option>
            <option>Compras, Mantenimiento y Mensajería</option>
          </select>
        </div>
      </div>
      
      <div class="col-sm-4">
        <div class="form-group" id="grupsub">
          <label for="subarea" class="col-sm-12 col-form-label">Cúal es el tema</label>
          <select class="form-control" id="subareahd" name="subarea">
            <option value='1A'>Redes e Internet</option>
            <option value='1B'>Telefonía</option>
            <option value='1C'>Correo</option>
            <option value='1D'>Impresoras</option>
            <option value='1E'>Equipos de cómputo</option>
            <option value='1F'>Servidores</option>
            <option value='1G'>Sistemas de Información</option>
            <option value='1H'>Zeus</option>
            <option value='1I'>Intranet</option>
            <option value='1J'>Ingreso de Empleado</option>
            <option value='1K'>Retiro de Empleado</option>
          </select>
        </div>
      </div>

      <div class="col-sm-12" id="ingreso">
        <label for="ingreso">Selecciona los items necesarios para el INGRESO del empleado</label>
        <div class="row align-items-center shadow-sm p-3 mb-5 bg-white rounded border border-primary">
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline1" name="okingreso0" value="Necesita PC">
            <label class="custom-control-label" for="customControlInline1">Necesita PC</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline2" name="okingreso1" value="Necesita teléfono">
            <label class="custom-control-label" for="customControlInline2">Necesita teléfono</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline3" name="okingreso2" value="Necesita línea celular">
            <label class="custom-control-label" for="customControlInline3">Necesita línea celular</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline4" name="okingreso3" value="Necesita usuario Zeus">
            <label class="custom-control-label" for="customControlInline4">Necesita usuario Zeus</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline5" name="okingreso4" value="Necesita Correo">
            <label class="custom-control-label" for="customControlInline5">Necesita Correo</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline6" name="okingreso5" value="Necesita usuario Spark">
            <label class="custom-control-label" for="customControlInline6">Necesita usuario Spark</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline7" name="okingreso6" value="Necesita usuario de intranet">
            <label class="custom-control-label" for="customControlInline7">Necesita usuario de intranet</label>
          </div>
        </div>
      </div>
      <div class="col-sm-12" id="retiro">
          <label for="ingreso">Selecciona los items necesarios para el RETIRO del empleado</label>
          <div class="row align-items-center shadow-sm p-3 mb-5 bg-white rounded border border-primary">
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl1" name="okretiro0" value="Entrega de PC">
              <label class="custom-control-label" for="customControl1">Entrega de PC</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl2" name="okretiro1" value="Entrega de teléfono">
              <label class="custom-control-label" for="customControl2">Entrega de teléfono</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl3" name="okretiro2" value="Entrega de línea celular">
              <label class="custom-control-label" for="customControl3">Entrega de línea celular</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl4" name="okretiro3" value="Eliminar usuario Zeus">
              <label class="custom-control-label" for="customControl4">Eliminar usuario Zeus</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl5" name="okretiro4" value="Eliminar o bloquear Correo">
              <label class="custom-control-label" for="customControl5">Eliminar o bloquear Correo</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl6" name="okretiro5" value="Eliminar usuario Spark">
              <label class="custom-control-label" for="customControl6">Eliminar usuario Spark</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl7" name="okretiro6" value="Eliminar usuario de intranet">
              <label class="custom-control-label" for="customControl7">Eliminar usuario de intranet</label>
            </div>
          </div>
        </div>
      
      <div class="col-sm-6">
        <div class="form-group" id="divreque">
          <label for="requerimiento" class="col-sm-6 col-form-label" id="requeri">Tipo de Requerimiento</label>
          <select class="form-control" id="requerimientohd" name="requerimiento">
            <option>Selecciona...</option>
            <option>Solicitud</option>
            <option>Incidente</option>
          </select>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group" id="divcategoria">
          <label for="requerimiento" class="col-sm-12 col-form-label">Tipo de categoría</label>
          <select class="form-control" id="categoriahd" name="categoria">
          </select>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="asunto" class="col-sm-12 col-form-label">Asunto</label>
          <input type="text" class="form-control" id="asunto" name="asunto" placeholder="¿Cúal es el motivo de tu Solicitud?" required>
      </div>
        <div class="form-group">
          <label for="archivo" class="col-sm-12 col-form-label">Adjuntar Archivo (Max. 5MB, jpg, jpeg, pdf)</label>
            <input type="file" class="form-control" id="archivohd" name="archivo">
      </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="descripcion">Descripción</label>
          <textarea class="form-control" style="height: 140px; id="descripcion" name="descripcion" rows="6" required placeholder="Describe detalladamente los requerimientos de tu solicitud"></textarea>
        </div>
      </div>
      
    </div>
    <input type="text" class="form-control" id="admin" name="admin" hidden>
   

<div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn pull-right">Generar Solicitud</button>
        </div>
         <!-- @captcha
        <input type="text" id="captcha" name="captcha"> -->
        
  </form>
  
</div>

@endsection

