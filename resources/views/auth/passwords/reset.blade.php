@extends('layouts.back')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4">
                <div class="card">
                    <div class="header text-center">
                        <h3>Resetea tu Clave</h3>
                    </div>
                    <div class="content text-center">
                        <form class="new_user" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} field">
                                        <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group field">
                                        <input id="password" type="password" placeholder="Clave" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group field">
                                        <input id="password-confirm" type="password" placeholder="Confirma Clave" class="form-control" name="password_confirmation" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill btn-block">Resetear Clave</button>
                            <hr>
                            <a href="{{ url('/login') }}">¿Ya tienes tu email y clave? Ingresa aquí</a><br />
                        </form>                    
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection