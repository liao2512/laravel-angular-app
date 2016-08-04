@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Registrations / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('courses.registrations.store', $course) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombres')) has-error @endif">
                       <label for="nombres-field">Nombres</label>
                    <input type="text" id="nombres-field" name="nombres" class="form-control" value="{{ old("nombres") }}"/>
                       @if($errors->has("nombres"))
                        <span class="help-block">{{ $errors->first("nombres") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('apellidos')) has-error @endif">
                       <label for="apellidos-field">Apellidos</label>
                    <input type="text" id="apellidos-field" name="apellidos" class="form-control" value="{{ old("apellidos") }}"/>
                       @if($errors->has("apellidos"))
                        <span class="help-block">{{ $errors->first("apellidos") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label for="phone-field">Phone</label>
                    <input type="text" id="phone-field" name="phone" class="form-control" value="{{ old("phone") }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fecha')) has-error @endif">
                       <label for="fecha-field">Fecha</label>
                    <input type="text" id="fecha-field" name="fecha" class="form-control" value="{{ old("fecha") }}"/>
                       @if($errors->has("fecha"))
                        <span class="help-block">{{ $errors->first("fecha") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('banco')) has-error @endif">
                       <label for="banco-field">Banco</label>
                    <input type="text" id="banco-field" name="banco" class="form-control" value="{{ old("banco") }}"/>
                       @if($errors->has("banco"))
                        <span class="help-block">{{ $errors->first("banco") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('referencia')) has-error @endif">
                       <label for="referencia-field">Referencia</label>
                    <input type="text" id="referencia-field" name="referencia" class="form-control" value="{{ old("referencia") }}"/>
                       @if($errors->has("referencia"))
                        <span class="help-block">{{ $errors->first("referencia") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('monto')) has-error @endif">
                       <label for="monto-field">Monto</label>
                    <input type="text" id="monto-field" name="monto" class="form-control" value="{{ old("monto") }}"/>
                       @if($errors->has("monto"))
                        <span class="help-block">{{ $errors->first("monto") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('comentarios')) has-error @endif">
                       <label for="comentarios-field">Comentarios</label>
                    <textarea class="form-control" id="comentarios-field" rows="3" name="comentarios">{{ old("comentarios") }}</textarea>
                       @if($errors->has("comentarios"))
                        <span class="help-block">{{ $errors->first("comentarios") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('courses.registrations.index', $course) }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection