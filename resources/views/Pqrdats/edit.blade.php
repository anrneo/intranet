@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <span style="font-size:20px"><b> Editar Pqrsf</b></span>
            <a href="{{ route('pqrdats.index') }}" class="btn btn-sm btn-success pull-right">
                Regresar
            </a>
        </div>
        <div class="panel-body">
            <div class="card-body">
                <div class="row">
                 {!! Form::model($pqrdat, ['route' => ['pqrdats.update', $pqrdat->id],
                 'method' => 'PUT']) !!}

                 @include('pqrdats.partials.form')

                 {!! Form::close() !!}
             </div>
         </div>
     </div>
 </div>
</div>
@endsection 
