@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <b>Usuario y roles asignados</b>
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-success pull-right">
                                    Regresar
                                </a>
                            </div>
                            <div class="panel-body">
                                <div class="row">

                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="col text-left"><p><strong>Nombre : </strong><input class="form-control text-center" id="    disabledInput" type="text" placeholder="{{ $user->name }}" disabled>
                                                </div>
                                                <div class="col text-left"><p><strong>Correo : </strong><input class="form-control text-center" id="    disabledInput" type="text" placeholder="{{ $user->email }}" disabled>
                                            </div>
                                                <div class="col text-left"><p><strong>Cedula : </strong><input class="form-control text-center" id="    disabledInput" type="text" placeholder="{{ $user->cedula }}" disabled>
                                            </div>
                                                <div class="col text-left"><p><strong>Celular : </strong><input class="form-control text-center" id="    disabledInput" type="text" placeholder="{{ $user->celular }}" disabled>
                                            </div>
                                                <div class="col text-left"><p><strong>Sede : </strong><input class="form-control text-center" id="    disabledInput" type="text" placeholder="{{ $user->sede }}" disabled>
                                            </div>
                                                <div class="col text-left"><p><strong>Cargo : </strong><input class="form-control text-center" id="    disabledInput" type="text" placeholder="{{ $user->cargo }}" disabled>
                                            </div>
                                            </div>
                                            <div class="col-sm-6 text-center">
                                                 <span><b>Roles Asiganados</b></span>
                                            </div>
                                        </div>
                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection