@extends('layouts.app')
@section('content')
<div class="col-sm-12">   
  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <b>Creación y Edición de Usuarios</b>

      @can('roles.create')
      <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary pull-right">
        Crear
      </a>
      <a href="{{ route('home') }}" class="btn btn-sm btn-success pull-right">
        Regresar
      </a>
      @endcan
    </div>
    <div class="panel-body">
      <div class="card-body">
          <div class="col-sm-4">
              <input id="filtrararchivos" type="text" class="form-control" placeholder="Buscar...">
    </div>
        <br>
        <table class="table table-bordered table-responsible">
         <thead>
          <tr>
              <th class="text-center">Id</th>
           <th class="text-center">Nombre</th>
           <th class="text-center">Correo</th>
           <th class="text-center">Cédula</th>
           <th class="text-center">Ver</th>
           <th class="text-center">&nbsp;Editar o Eliminar usuario</th>
           <!--<th>Ver Usuario</th>-->
         </tr>
       </thead>
       <tbody class="buscar text-center">
         @foreach($users as $user)
         <tr>
            <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->cedula }}</td>
        <td>
            @can('users.show')
            <a href="{{ route('users.show', $user->id)}}" class="btn btn-success">Ver</a> @endcan
          </td>
          <td>
            @can('users.edit')
            <a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Editar y Asignar Rol</a> @endcan
          </td>
          <!-- Eliminar ROL-->
          <!--<td>
              @can('users.destroy')
              {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
              <button class="btn btn-sm btn-danger">
                  Eliminar Usuario
              </button>
              {!! Form::close() !!}
              @endcan
          </td>-->
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->render()}}
  </div>
</div>
</div>
</div>
</div>
@endsection

                                  