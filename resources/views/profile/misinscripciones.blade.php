@extends('layouts.back')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center">
                        <span>{{ Session::get('message') }}</span>
                    </div>
                @endif
                <div class="card">
                    <div class="header">
                        <h3 class="title">Mis Inscripciones</h3>
                    </div>
                    <br>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th class="text-center">Inscripción</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Pagos</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($registrations as $registration)
                                    <tr>
                                        <td>{{ $registration->course->name }}: {{ $registration->nombres }} {{ $registration->apellidos }}</td>
                                        @if ($registration->status == 1)
                                            <td><button class="btn btn-sm btn-success btn-fill">Inscrito</button></td>
                                            <td><a href="{{ route('mispagos', $registration->id) }}" class="btn btn-sm btn-info btn-fill">Ver {{ $registration->payments->count() }} Pagos</a></td>
                                            <td><a href="{{ route('pago', $registration->id) }}" class="btn btn-sm btn-primary btn-fill">Pagar</a></td>
                                        @else
                                            <td><button class="btn btn-sm btn-warning btn-fill">Por Aprobar</button></td>
                                            <td><a href="{{ route('mispagos', $registration->id) }}" class="btn btn-sm btn-info btn-fill">Ver {{ $registration->payments->count() }} Pagos</a></td>
                                            <td><a href="{{ route('eliminarinscripcion', $registration->id) }}" class="btn btn-sm btn-danger btn-fill" onclick="if(confirm('¿Desea eliminar esta inscripción?')) { return true } else {return false };">Eliminar</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection