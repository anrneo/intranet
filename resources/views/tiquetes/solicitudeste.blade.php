@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <div class="card-header text-center">
      <h5>Solicitudes de Traslados Terrestres</h5> 
    </div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Sede</th>
            <th scope="col">Origen</th>
            <th scope="col">Destino</th>
            <th scope="col">Archivos</th>
            <th scope="col">Verificar</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($dat as $da)
            <tr>
              <th scope="row">{{$da->nom_user}}</th>
              <td>{{$da->sede}}</td>
              <td>{{$da->ciudad1}}</td>
              <td>{{$da->ciudad2}}</td>
              <td><a href="#"><i class="fas fa-paperclip"></i></a></td>
              <td><a href="#"><i class="far fa-check-square"></i></a></td>
            </tr>
            @endforeach
          
        </tbody>
    </table>

</div>
@endsection

