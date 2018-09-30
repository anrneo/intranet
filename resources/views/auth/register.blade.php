@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

                            <div class="col-md-6">
                                <input id="cedula" type="cedula" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ old('cedula') }}" required autofocus>

                                @if ($errors->has('cedula'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('celular') }}</label>

                            <div class="col-md-6">
                                <input id="celular" type="celular" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" required autofocus>

                                @if ($errors->has('celular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sede" class="col-md-4 col-form-label text-md-right">{{ __('sede') }}</label>

                            <div class="col-md-6">
                                <input id="sede" type="sede" class="form-control{{ $errors->has('sede') ? ' is-invalid' : '' }}" name="sede" value="{{ old('sede') }}" required autofocus>

                                @if ($errors->has('sede'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sede') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('cargo') }}</label>

                            <div class="col-md-6">
                                <input id="cargo" type="cargo" class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" value="{{ old('cargo') }}" required autofocus>

                                @if ($errors->has('cargo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('area') }}</label>

                            <div class="col-md-6">
                                <input id="area" type="area" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" value="{{ old('area') }}" required autofocus>

                                @if ($errors->has('area'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="camisa" class="col-md-4 col-form-label text-md-right">{{ __('camisa') }}</label>

                            <div class="col-md-6">
                                <input id="camisa" type="camisa" class="form-control{{ $errors->has('camisa') ? ' is-invalid' : '' }}" name="camisa" value="{{ old('camisa') }}" required autofocus>

                                @if ($errors->has('camisa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('camisa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pantalon" class="col-md-4 col-form-label text-md-right">{{ __('pantalon') }}</label>

                            <div class="col-md-6">
                                <input id="pantalon" type="pantalon" class="form-control{{ $errors->has('pantalon') ? ' is-invalid' : '' }}" name="pantalon" value="{{ old('pantalon') }}" required autofocus>

                                @if ($errors->has('pantalon'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pantalon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zapato" class="col-md-4 col-form-label text-md-right">{{ __('zapato') }}</label>

                            <div class="col-md-6">
                                <input id="zapato" type="zapato" class="form-control{{ $errors->has('zapato') ? ' is-invalid' : '' }}" name="zapato" value="{{ old('zapato') }}" required autofocus>

                                @if ($errors->has('zapato'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zapato') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sedetipoD" class="col-md-4 col-form-label text-md-right">{{ __('sedetipoD') }}</label>

                            <div class="col-md-6">
                                <input id="sedetipoD" type="sedetipoD" class="form-control{{ $errors->has('sedetipoD') ? ' is-invalid' : '' }}" name="sedetipoD" value="{{ old('sedetipoD') }}" required autofocus>

                                @if ($errors->has('sedetipoD'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sedetipoD') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fechaingreso" class="col-md-4 col-form-label text-md-right">{{ __('fechaingreso') }}</label>

                            <div class="col-md-6">
                                <input id="fechaingreso" type="fechaingreso" class="form-control{{ $errors->has('fechaingreso') ? ' is-invalid' : '' }}" name="fechaingreso" value="{{ old('fechaingreso') }}" required autofocus>

                                @if ($errors->has('fechaingreso'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechaingreso') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salario" class="col-md-4 col-form-label text-md-right">{{ __('salario') }}</label>

                            <div class="col-md-6">
                                <input id="salario" type="salario" class="form-control{{ $errors->has('salario') ? ' is-invalid' : '' }}" name="salario" value="{{ old('salario') }}" required autofocus>

                                @if ($errors->has('salario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('salario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipoequipo" class="col-md-4 col-form-label text-md-right">{{ __('tipoequipo') }}</label>

                            <div class="col-md-6">
                                <input id="tipoequipo" type="tipoequipo" class="form-control{{ $errors->has('tipoequipo') ? ' is-invalid' : '' }}" name="tipoequipo" value="{{ old('tipoequipo') }}" required autofocus>

                                @if ($errors->has('tipoequipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipoequipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="serial" class="col-md-4 col-form-label text-md-right">{{ __('serial') }}</label>

                            <div class="col-md-6">
                                <input id="serial" type="serial" class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}" name="serial" value="{{ old('serial') }}" required autofocus>

                                @if ($errors->has('serial'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
