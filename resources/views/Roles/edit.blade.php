@extends('layouts.app')
@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b>Editar usuario de la Intranet</b>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-success pull-right">
                    Regresar
                </a>
            </div>
            <div class="panel-body">
                <div class="card-body">
                    <div class="row">
                        {!! Form::model($role, ['route' => ['roles.update', $role->id],
                        'method' => 'PUT']) !!}

                        @include('roles.partials.form')

                        {!! Form::close() !!}      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
