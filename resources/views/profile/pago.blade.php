@extends('layouts.back')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="header">
                        <h3 class="title">Pago: {{ $registration->course->name }} / {{ $registration->nombres }} {{ $registration->apellidos }}</h3>
                    </div>
                    <div class="content">
                        <form action="{{ route('pagar', $registration) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="monto-field">Monto de Pago</label>
                                        <input type="number" min="1" step="0.01" id="monto-field" name="monto" class="form-control" value="{{ old("monto") }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha-field">Fecha de Pago</label>
                                        <input type="date" id="fecha-field" name="fecha" class="form-control" value="{{ old("fecha") }}" required/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="banco-field">Banco de Origen</label>
                                        <input type="text" id="banco-field" name="banco" class="form-control" value="{{ old("banco") }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="referencia-field">Referencia</label>
                                        <input type="text" id="referencia-field" name="referencia" class="form-control" value="{{ old("referencia") }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="referencia-field">Cédula o RIF del Titular</label>
                                        <input type="text" id="cedula-field" name="cedula" class="form-control" value="{{ old("cedula") }}" required/>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-lg btn-info btn-fill">REPORTAR PAGO</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection