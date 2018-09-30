@extends('layouts.app')
@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <span style="font-size:18px"><b>Crear Roles</b></span>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-success pull-right">
                    Regresar
                </a>
            </div>
            <div class="panel-body">
                <div class="card-body">
                    <div class="row">
                       {!! Form::open(['route' =>'roles.store']) !!}

                       @include('roles.partials.form')

                       {!! Form::close() !!} 
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
