<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('cedula', 'Número de Identificación') !!}
                {!! Form::text('cedula', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
              {!! Form::label('celular', 'Celular') !!}
              {!! Form::text('celular', null, ['class' => 'form-control', 'required' => 'required']) !!}
          </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('sede', 'Sede') !!}
            {!! Form::text('sede', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('cargo', 'Cargo') !!}
            {!! Form::text('cargo', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('area', 'Area') !!}
            {!! Form::text('area', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('camisa', 'Camisa') !!}
            {!! Form::text('camisa', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('pantalon', 'Pantalon') !!}
            {!! Form::text('pantalon', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('zapato', 'Zapato') !!}
            {!! Form::text('zapato', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('sedetipoD', 'SedetipoD') !!}
            {!! Form::text('sedetipoD', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('fechaingreso', 'Fecha de Ingreso') !!}
            {!! Form::text('fechaingreso', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('salario', 'Salario') !!}
            {!! Form::text('salario', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('tipoequipo', 'Tipo de Equipo') !!}
            {!! Form::text('tipoequipo', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('serial', 'Serial') !!}
            {!! Form::text('serial', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('email', 'Correo Corporativo') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('password', 'Contraseña') !!}<br>
                {!! Form::password('password', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
    </div>
<h3>Permiso Especial</h3>
    <div class="form-group">
        <label>{{ Form::radio('special', 'all-access') }} Acceso Total</label>
        <label>{{ Form::radio('special', 'no-access') }} Ningún Acceso</label>
    </div>
    <hr>
<h3 class="text-center">Lista de Roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($roles as $role)
        <li>
            <label>
                {!! Form::checkbox('roles[]', $role->id, null)  !!}
                {{ $role->name }}
                <em>({{ $role->description ?: 'Sin descripción del rol' }})</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg btn-block'])}}
</div>
</div>