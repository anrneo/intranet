@extends('layouts.app')
@section('content')
    <div class="col-sm-12">
            <div class="card text-white" style="background:#3db9dc">
                    <div class="card-body" style="font-size:20px">
                        Bienvenido al Sistema de Gestión Documental Sumimedical
                    </div>
                </div>
                <div class="container" style="padding-right: 20px; padding-left: 20px;margin-bottom: -24px;">
                        <div class="breadcrumb-holder">
                            <ol class="breadcrumb float-left" style="margin-butom:2px">
                                <a href="/documento"><li class="breadcrumb-item ">Inicio</li></a>
                                <li class="breadcrumb-item"></li>
                            </ol>
                            <div class="clearfix"></div>
                        </div> 
                    </div>
        <div class="col-sm-12 card-header">
            <div class="row">
                @foreach ($reports as $report)
                <div class="col-sm-3">
                    <a href="/documento/{{$area}}/reporte/{{$report->tipo}}">
                        <img src="/img/iconos/conarchivo.png" style="width:42px"><span> <b>{{$report->tipo}}</b></span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection