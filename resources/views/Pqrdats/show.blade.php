@extends('layouts.app')
@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <span style="font-size:20px"><b>Ver Pqrsf</b></span>
                <a href="{{ route('pqrdats.index') }}" class="btn btn-sm btn-success pull-right">
                    Regresar
                </a>
            </div>
            <div class="panel-body">
                <div class="card-body">
                    <div class="row">
                       <div class="col text-center"><p><strong>Quien eres </strong><input class="form-control" id="disabledInput" type="text" placeholder="{{ $pqrdat->quien_eres }}" disabled></div>
                            <div class="col text-center"><p><strong>Entidad </strong><input class="form-control" id="disabledInput" type="text" placeholder="{{ $pqrdat->quien_eres }}" disabled></div>
                            <div class="col text-center"><p><strong>Regional </strong><input class="form-control" id="disabledInput" type="text" placeholder="{{ $pqrdat->quien_eres }}" disabled></div>
                            <div class="col text-center"><p><strong>Departamento </strong><input class="form-control" id="disabledInput" type="text" placeholder="{{ $pqrdat->quien_eres }}" disabled></div>            
                        </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
