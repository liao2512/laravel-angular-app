@extends('layouts.back')

@section('content')
    @include('error')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div class="col-sm-8">
                                <h4 class="title"><i class="fa fa-edit" aria-hidden="true"></i> Editar Inscripción</h4>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-info btn-fill pull-right" href="{{ route('courses.registrations.index', [$registration->course]) }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
                            </div>
                        </div>
                        <br><br>
                        <div class="content">
                            <form action="{{ route('courses.registrations.update', [$registration->course, $registration->id]) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombres-field">Nombres</label>
                                            <input type="text" id="nombres-field" name="nombres" class="form-control" value="{{ $registration->nombres }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="apellidos-field">Apellidos</label>
                                            <input type="text" id="apellidos-field" name="apellidos" class="form-control" value="{{ $registration->apellidos }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="apellidos-field">Fecha de Nacimiento</label>
                                            <input type="date" id="nacimiento-field" name="nacimiento" class="form-control" value="{{ $registration->nacimiento }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="phone-field">Teléfono Celular</label>
                                            <input type="text" id="phone-field" name="phone" class="form-control" value="{{ $registration->phone }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comentarios-field">¿Asiste su hijo/a a consulta? Si sí, explique</label>
                                        <textarea rows="2" id="consulta-field" name="consulta" class="form-control">{{ $registration->consulta }}</textarea>
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-info btn-fill btn-block">Guardar Cambios</button>    
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection