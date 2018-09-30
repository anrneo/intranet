@extends('layouts.app')
@section('content')

<div class="container" style="width:800px">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <b>Por favor ingresa la respuesta al requerimiento</b>
        </div>
    </div>
    <br>
<form action="" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nombre" value="{{$report->nombre}}" readonly>
        </div>
    </div>
    
    <input type="text" name="user_id" value="{{$report->users_id}}" hidden>  

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$report->email}}" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Requerimiento</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$report->requerimiento}}" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Area</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$report->area}}" readonly>
        </div>
    </div>
@if ($report->area != 'Comunicaciones')
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Subárea</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="subarea" value="{{$report->subarea}}" readonly>
        </div>
    </div>
@endif
    

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Asunto</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$report->asunto}}" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-10">
            <textarea class="form-control"  rows="3" readonly>{{$report->descripcion}}</textarea>     
        </div>
    </div>
  
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Respuesta</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="respuesta" rows="3" required></textarea>       
        </div>
        
    </div>
<div class="row" style="margin:0 0 0 160px">
    <div class="col-sm-9" >
    @if ($report->archivo!='Sin archivo')
            <a href="/intranet/public/storage/{{ $report->archivo }}" target="_blank">Ver Archivo Adjunto</a>
    @endif
    </div>
    <div class="col-sm-3">
        <button type="submit" class="btn btn-primary">Responder</button>
    </div>
    </div>
</form>
</div>


@endsection

