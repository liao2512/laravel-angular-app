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
                                    <th>Edad</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Pagos</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="reg in registrations | filter:searchTerm | orderBy:'apellidos'">
                                        <td>
                                            <a ng-class="reg.status == '1' ? 'btn btn-sm btn-fill btn-success' : 'btn btn-sm btn-fill btn-warning'" ng-click="updateStatus(reg); (reg.status == '1' ? reg.status = '0' : reg.status = '1')"><% reg.apellidos %>, <% reg.nombres %></a>
                                        </td>
                                        <td><% reg.nacimiento %></td>
                                        <td><% reg.phone %></td>
                                        <td><% reg.user.email %></td>
                                        <td>
                                            <a class="btn btn-sm btn-primary btn-fill" ng-href="/registrations/<% reg.id %>/payments"><% reg.payments.length %></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info btn-fill" ng-href="/courses/<% course %>/registrations/<% reg.id %>/edit"><i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
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