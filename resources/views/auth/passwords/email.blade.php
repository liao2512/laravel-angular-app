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
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="new_user" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}
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
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill btn-block">Resetear mi Clave</button>
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