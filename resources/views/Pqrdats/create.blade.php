@extends('layouts.app')
@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <span style="font-size:20px"><b>Crear Pqrsf</b></span>
                <a href="{{ route('pqrdats.index') }}" class="btn btn-sm btn-success pull-right">
                    Regresar
                </a>
            </div>
            <div class="panel-body">
                <div class="card-body">
                    <div class="row">
                       {!! Form::open(['route' =>'pqrdats.store']) !!}

                       @include('pqrdats.partials.form')

                       {!! Form::close() !!} 
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
