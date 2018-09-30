@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <b>Creación de Roles</b>
            @can('roles.create')
            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary pull-right">
                Crear
            </a>
            <a href="{{ route('home') }}" class="btn btn-sm btn-success pull-right">
                Regresar
            </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table-response table-hover table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" width="10ps">Nombre</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Permiso especial</th>
                        <th class="text-center" colspan="3">&nbsp;Editar o Eliminar Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->slug }}</td>
                        <td>{{ $role->description }}</td>
                        <td>{{ $role->special }}</td>
                        <!-- Ver ROL-->
                        <td>
                            @can('roles.show')
                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-success">Ver</a>
                            @endcan
                        </td>
                        <!-- Editar ROL-->
                        <td>
                            @can('roles.edit')
                            <a href="{{ route('roles.edit', $role->id)}}" class="btn btn-primary">Editar</a>
                            @endcan
                        </td>
                        <!-- Eliminar ROL-->
                        <td>
                            @can('roles.destroy')
                            {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                            <button class="btn btn-sm btn-danger">
                                Eliminar ROL
                            </button>
                            {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $roles->render()}}
        </div>
    </div>
</div>
</div>
@endsection