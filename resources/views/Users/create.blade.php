@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <span style="font-size:20px"><b>Crear Usuarios</b></span>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-success pull-right">
                    Regresar
                </a>
            </div>
            <div class="panel-body">
                <div class="card-body">
                    <div class="row">
                       {!! Form::open(['route' =>'users.store']) !!}

                       @include('users.partials.form')

                       {!! Form::close() !!} 
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
