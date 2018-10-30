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
{!! Html::script('/js/jquery.min.js') !!}

<script>
    $(function(){
        $('form').submit(function(e){
            if (mail==1 || ced==1) {
                toastr.options = { "closeButton":true, "progressBar": true};
                toastr.warning("Por favor verifica la cédula y/o el correo, gracias");
                e.preventDefault()
            }
        })
        mail=0
        $('#emailuser').on({
            keyup:function(){
                $.ajax({
            method: "POST",
            url: "/api/validaremail",
           data: { email: $(this).val() }
          })
            .done(function( msg ) {
                if(msg[0].num==1){
                    $('#labelemail').html('<span style="color:red">(email ya existe)</span>')
                     mail=1
                }else{
                    $('#labelemail').html('')
                    mail=0
                };
            })
        }
        })
        ced=0
        $('#iduser').on({
            keyup:function(){
                $.ajax({
            method: "POST",
            url: "/api/validarid",
           data: { cc: $(this).val() }
          })
            .done(function( msg ) {
                if(msg[0].num==1){
                    $('#labelid').html('<span style="color:red">(N° ya existe)</span>')
                    ced=1
                }else{
                    $('#labelid').html('')
                    ced=0
                };
            })
        }
        })
    })
</script>
@endsection
