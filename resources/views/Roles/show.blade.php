@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <b>Detalle del Role</b>
            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-success pull-right">
                Regresar
            </a>
        </div>
        <div class="panel-body">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col text-left"><p><strong>Nombre : </strong><input class="form-control text-center" id="    disabledInput" type="text" placeholder="{{ $role->name }}" disabled>
                        </div>
                        <div class="col text-left"><p><strong>Url Amigable : </strong     ><input class="form-control text-center" id="    disabledInput" type="text" placeholder="{{ $role->slug }}" disabled>
                        </div>
                        <div class="col text-left"><p><strong>Descripción : </strong     ><input class="form-control text-center" id="        disabledInput" type="text" placeholder="{{ $role->description }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection