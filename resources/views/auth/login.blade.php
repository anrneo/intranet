@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<style>
    .auth-box {
    -moz-box-shadow: 1px 2px 10px 0 rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 1px 2px 10px 0 rgba(0, 0, 0, 0.1);
    box-shadow: 1px 2px 10px 0 rgba(0, 0, 0, 0.1);
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    width: 70%;
    height: 450px;
    margin: 0 auto;
    margin-left: 80px;
    background-color: #fff;
}
.vertical-align-wrap {
    position: absolute;
    width: 80%;
    height: 10%;
    display: table;
}
</style>
<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="/assets/img/sumi/logo-sumi.png" alt="Logo Sumimedical"></div>
                                <p class="lead">Ingresa a tu cuenta</p>
                            </div>
                            <form class="form-auth-small" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="control-label sr-only">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label sr-only">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Login') }}</button>
                                <div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">
                                    {{ __('Cambiar Contraseña') }}</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">"¡Estamos más cerca de ti! "</h1><br>
                            <p>Queremos contarte las novedades de nuestra empresa y ofrecerte beneficios corporativos a través de esta plataforma.</p><br>
                            <p>Conéctate con nosotros ingresando con tu correo (Lo puedes buscar en el directorio) y contraseña (Cédula de Ciudadania).</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>

@endsection