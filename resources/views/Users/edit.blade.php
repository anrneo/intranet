@extends('layouts.app')
@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b>Editar usuario de la Intranet</b>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-success pull-right">
                    Regresar
                </a>
            </div>
            <div class="panel-body">
                <div class="row">

                </div>

                <div class="card-body">
                    <div class="row">
                        {!! Form::model($user, ['route' => ['users.update', $user->id],
                        'method' => 'PUT']) !!}

                        @include('users.partials.form')

                        {!! Form::close() !!}      
                    </div>
                    
                    <div class="row">
                        {!! Form::model($user, ['route' => ['users.updatepass', $user->id],
                        'method' => 'POST']) !!}
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                            <div class="form-group">
                                {!! Form::label('password', 'Cambiar Contraseña') !!}
                                {!! Form::password('password',  ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            </div>
                             <div class="form-group">
                                {{ Form::submit('Cambiar', ['class' => 'btn btn-primary btn-lg btn-block'])}}
                            </div>

                            </div>

                        {!! Form::close() !!}      
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
