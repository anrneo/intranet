<div class="col-sm-12">
    <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('name', 'Nombre')}}
            {{ Form::text('name', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{ Form::label('slug', 'Url amigable')}}
            {{ Form::text('slug', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Descripción')}}
            {{ Form::textarea('description', null, ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <ul class="list-unstyled">
                @foreach($permissions as $permission)
                <li>
                    <label>
                        {{ Form::checkbox('permissions[]', $permission->id, null) }}
                        {{ $permission->name }}
                        <em>({{ $permission->description ?: 'Sin descripción del rol' }})</em>
                    </label>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <hr>
    <h3>Permiso Especial</h3>
    <div class="form-group">
        <label>{{ Form::radio('special', 'all-access') }} Acceso Total</label>
        <label>{{ Form::radio('special', 'no-access') }} Ningún Acceso</label>
    </div>
    <hr>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg btn-block'])}}
</div>