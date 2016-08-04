@extends('layouts.back')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
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
                                <th class="text-center">Pagos Realizados</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($registrations as $registration)
                                    <tr>
                                        <td>{{ $registration->course->name }}</td>
                                        <td>
                                            @if ($registration->status === 1)
                                                <button class="btn btn-sm btn-success btn-fill">Inscrito</button>
                                            @else
                                                <button class="btn btn-sm btn-warning btn-fill">Por Aprobar</button>
                                            @endif
                                        </td>
                                        <td><button class="btn btn-sm btn-primary btn-fill">X</button></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary btn-fill">Pagar</button>
                                            <button class="btn btn-sm btn-info btn-fill">Editar</button>
                                            <button class="btn btn-sm btn-danger btn-fill">Eliminar</button>
                                        </td>
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