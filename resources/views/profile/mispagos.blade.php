@extends('layouts.back')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center">
                        <span>{{ Session::get('message') }}</span>
                    </div>
                @endif
                <div class="card">
                    <div class="header">
                        <div class="col-sm-8">
                            <h3 class="title">Mis Pagos: {{ $registration->course->name }}</h3>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-info btn-fill pull-right" href="{{ route('pago', $registration->id) }}"><i class="fa fa-plus" aria-hidden="true"></i> Reportar Nuevo Pago</a>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th class="text-center">Pago</th>
                                <th class="text-center">Status</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                    <tr  class="text-center">
                                        <td>Fecha: {{ $payment->fecha }} - Ref: {{ $payment->referencia }} - Bs: {{ $payment->monto }}</td>
                                        @if ($payment->status == 1)
                                            <td><button class="btn btn-sm btn-success btn-fill">Confirmado</button></td>
                                            <td></td>
                                        @else
                                            <td><button class="btn btn-sm btn-warning btn-fill">Por Aprobar</button></td>
                                            <td><a href="{{ route('eliminarpago', $payment->id) }}" class="btn btn-sm btn-danger btn-fill" onclick="if(confirm('¿Desea eliminar este pago?')) { return true } else {return false };">Eliminar</a></td>
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