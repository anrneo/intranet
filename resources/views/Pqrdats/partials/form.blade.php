<div class="col-sm-12">
    <div class="col-sm-3">
        <div class="form-group">
            {{ Form::label('quien_eres', 'quien_eres')}}
            {{ Form::text('quien_eres', null, ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ Form::label('entidad', 'Entidad')}}
            {{ Form::text('entidad', null, ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ Form::label('regional', 'regional')}}
            {{ Form::text('regional', null, ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ Form::label('departamento', 'departamento')}}
            {{ Form::text('departamento', null, ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {{ Form::label('municipio', 'municipio')}}
            {{ Form::text('municipio', null, ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="col-sm-3">
     <div class="form-group">
        {{ Form::label('sede', 'sede')}}
        {{ Form::text('sede', null, ['class' => 'form-control'])}}
    </div> 
</div>
<div class="col-sm-3">
    <div class="form-group">
        {{ Form::label('radicado', 'radicado')}}
        {{ Form::text('radicado', null, ['class' => 'form-control'])}}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
        {{ Form::label('respuesta', 'respuesta')}}
        {{ Form::textarea('resumen_resp', null, ['class' => 'form-control'])}}
    </div>
</div>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-outline-success btn-lg btn-block'])}}
</div>