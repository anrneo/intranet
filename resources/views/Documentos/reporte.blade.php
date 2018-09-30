@extends('layouts.app')
@section('content')
    <div class="col-sm-12">
            <div class="card text-white" style="background:#3db9dc">
                    <div class="card-body text-center" style="font-size:20px">
                        Gestión Documental Sumimedical
                    </div>
                </div>
                <div class="container" style="padding-right: 20px; padding-left: 20px;margin-bottom: -24px;">
                        <div class="breadcrumb-holder">
                            <ol class="breadcrumb float-left" style="margin-butom:2px">
                                <a href="/documento"><li class="breadcrumb-item ">Inicio &nbsp;&nbsp;/ </li></a> 
                                <li class="breadcrumb-item active"> &nbsp;&nbsp;Archivos</li>
                            </ol>
                        <div class="clearfix"></div>
                </div> 
            </div>
        <div class="col-sm-12 card-header" style="background:white; border: 1px solid #0000002e;">
            <div class="row">
                    <div class="col-sm-4">
                            <input id="filtrararchivos" type="text" class="form-control" placeholder="Buscar...">
                  </div>
                  <br><br><br>
                    <table class="table table-bordered table-responsible">
                            <thead class="thead-light">
                              <tr class="table-primary">
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Nombre del Archivo</th>
                                <th class="text-center">Creado por</th>
                                <th class="text-center">Descripcion</th>
                                <th class="text-center">Ver</th>
                                <th class="text-center">Descarrgar</th>
                              </tr>
                            </thead>
                            <tbody class="buscar text-center">
                             @foreach ($reports as $report)
                             <tr>   
                               
                                <td> 
                                    @if ($report->ext == 'jpeg' || $report->ext == 'jpg')
                                                    <img src="/img/iconos/imagen.png" style="width:42px">   
                                    @elseif($report->ext == 'pdf')
                                                    <img src="/img/iconos/pdf.png" style="width:42px">   
                                    @elseif ($report->ext == 'doc' || $report->ext == 'docx')
                                                    <img src="/img/iconos/word.png" style="width:42px">   
                                       @else
                                                    <img src="/img/iconos/excel.png" style="width:42px">   
                                        @endif
                                </td>
                                <td>{{$report->archivo}}</td>
                                <td>{{$report->nombre}}</td>
                                <td>{{$report->descripcion}}</td>
                                <td><a href="/intranet/public/storage/{{ $report->ruta }}" target="_blank">Ver<a></td>
                                <td> <a href="/descargar/{{ $report->id }}">Decargar<a></td>
                            </tr>
                             @endforeach    
                              
                            </tbody>
                          </table>
                           
            </div>
        </div>
    </div>
    
@endsection