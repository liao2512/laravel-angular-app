@extends('layouts.back')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="header">
                        <h3 class="title">Inscripción: {{ $course->name }}</h3>
                    </div>
                    <div class="content">
                        <form action="{{ route('inscribir', $course) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombres-field">Nombres</label>
                                        <input type="text" id="nombres-field" name="nombres" class="form-control" value="{{ old("nombres") }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="apellidos-field">Apellidos</label>
                                        <input type="text" id="apellidos-field" name="apellidos" class="form-control" value="{{ old("apellidos") }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone-field">Teléfonos</label>
                                        <input type="text" id="phone-field" name="phone" class="form-control" value="{{ old("phone") }}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fecha-field">Fecha de Pago</label>
                                        <input type="text" id="fecha-field" name="fecha" class="form-control" value="{{ old("fecha") }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="banco-field">Banco de Origen</label>
                                        <input type="text" id="banco-field" name="banco" class="form-control" value="{{ old("banco") }}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="referencia-field">Referencia</label>
                                        <input type="text" id="referencia-field" name="referencia" class="form-control" value="{{ old("referencia") }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="monto-field">Monto</label>
                                        <input type="text" id="monto-field" name="monto" class="form-control" value="{{ old("monto") }}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comentarios-field">Comentarios</label>
                                        <textarea rows="2 id="comentarios-field" name="comentarios" class="form-control" value="{{ old("comentarios") }} placeholder="Opcional"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-info btn-fill">REGISTRAR INSCRIPCIÓN</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection