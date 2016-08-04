@extends('layout')
@section('header')
<div class="page-header">
        <h1>Registrations / Show #{{$registration->id}}</h1>
        <form action="{{ route('registrations.destroy', $registration->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('registrations.edit', $registration->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="nombres">NOMBRES</label>
                     <p class="form-control-static">{{$registration->nombres}}</p>
                </div>
                    <div class="form-group">
                     <label for="apellidos">APELLIDOS</label>
                     <p class="form-control-static">{{$registration->apellidos}}</p>
                </div>
                    <div class="form-group">
                     <label for="phone">PHONE</label>
                     <p class="form-control-static">{{$registration->phone}}</p>
                </div>
                    <div class="form-group">
                     <label for="fecha">FECHA</label>
                     <p class="form-control-static">{{$registration->fecha}}</p>
                </div>
                    <div class="form-group">
                     <label for="banco">BANCO</label>
                     <p class="form-control-static">{{$registration->banco}}</p>
                </div>
                    <div class="form-group">
                     <label for="referencia">REFERENCIA</label>
                     <p class="form-control-static">{{$registration->referencia}}</p>
                </div>
                    <div class="form-group">
                     <label for="monto">MONTO</label>
                     <p class="form-control-static">{{$registration->monto}}</p>
                </div>
                    <div class="form-group">
                     <label for="comentarios">COMENTARIOS</label>
                     <p class="form-control-static">{{$registration->comentarios}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('registrations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection