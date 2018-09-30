@extends('layouts.app') 
@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b>Creación y edición de usuarios</b>
                <a href="{{ route('pqrdats.create') }}" class="btn btn-sm btn-danger pull-right">
                    Crear
                </a>
            </div>
            <div class="card-body">
                <table class="table-response table-hover table table-bordered text-center">
                    <thead>
                        <tr>
                            <th width="10ps">Radicado</th>
                            <th>Entidad</th>
                            <th>Departamento</th>
                            <th>Sede</th>
                            <th>Categoria</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th colspan="3">&nbsp;&nbsp;Gestión de PQRSF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pqrdats as $pqrdat)
                        <tr>
                            <td>{{ $pqrdat->radicado }}</td>
                            <td>{{ $pqrdat->entidad }}</td>
                            <td>{{ $pqrdat->departamento }}</td>
                            <td>{{ $pqrdat->sede }}</td>
                            <td>{{ $pqrdat->categoria }}</td>
                            <td>{{ $pqrdat->email }}</td>
                            <td>{{ $pqrdat->estado }}</td>
                            <td>
                                @can('pqrdats.show')
                                <a href="{{ route('pqrdats.show', $pqrdat->id)}}" class="btn btn-success">Ver</a> @endcan
                            </td>
                            <td>
                                @can('pqrdats.edit')
                                <a href="{{ route('pqrdats.edit', $pqrdat->id)}}" class="btn btn-primary">Editar</a> @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pqrdats->render()}}
            </div>
        </div>
    </div>
@endsection