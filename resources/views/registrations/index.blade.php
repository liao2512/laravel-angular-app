@extends('layouts.back')

<script type="text/javascript">
    var registrationsCourse = {{ $course->id }};
</script>

@section('content')
<div class="content" ng-app="admiApp" ng-controller="registrationsController">
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
                        <div class="col-sm-6">
                            <h4 class="title">Inscripciones {{ $course->name }} <i ng-show="loading" class="fa fa-spinner fa-spin"></i></h4>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" data-ng-model="searchTerm" class="form-control pull-right" placeholder="Buscar">
                        </div>
                    </div>
                    <br><br><br>
                    <div ng-if="registrations.length > 0">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Inscrito</th>
                                    <th>Categoría</th>
                                    <th>Ver Inscritos</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="reg in registrations | filter:searchTerm | orderBy:'apellidos'">
                                        <td><% reg.apellidos %>, <% reg.nombres %></td>
                                        <td>
                                            <a class="btn btn-sm btn-success btn-fill" ng-class="{true: 'btn-warning', false: 'btn-success'}[!reg.status]" ng-click="updateStatus(reg); reg.status = !reg.status"><% reg.name %></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary btn-fill" ng-href="/registrations/<% reg.id %>/payments"><% reg.payments.length %></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info btn-fill" ng-href="/registrations/<% reg.id %>/edit"><i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
                                            <a class="btn btn-sm btn-danger btn-fill" onclick="if(confirm('¿Eliminar todos los datos asociados a esta Inscripción? ¿Estás seguro?')) { return true } else {return false };" ng-click="deleteRegistration(reg)"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div ng-if="registrations.length == 0">
                        <h3 class="text-center alert alert-info">Aún no hay inscritos</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Registrations
            <a class="btn btn-success pull-right" href="{{ route('courses.registrations.create', $course) }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

<!--

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($registrations->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>PHONE</th>
                            <th>FECHA</th>
                            <th>BANCO</th>
                            <th>REFERENCIA</th>
                            <th>MONTO</th>
                            <th>COMENTARIOS</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($registrations as $registration)
                        <p>sdfds</p>
                            <tr>
                                <td>{{$registration->id}}</td>
                                <td>{{$registration->nombres}}</td>
                                <td>{{$registration->apellidos}}</td>
                                <td>{{$registration->phone}}</td>
                                <td>{{$registration->fecha}}</td>
                                <td>{{$registration->banco}}</td>
                                <td>{{$registration->referencia}}</td>
                                <td>{{$registration->monto}}</td>
                                <td>{{$registration->comentarios}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('courses.registrations.show', [$course, $registration->id]) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('courses.registrations.edit', [$course, $registration->id]) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('courses.registrations.destroy', [$course, $registration->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
-->