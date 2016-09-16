@extends('layouts.back')

<script type="text/javascript">
    var paymentsRegistration = {{ isset($registration) ? $registration->id : 0 }};
</script>

@section('content')
<div class="content" ng-app="admiApp" ng-controller="paymentsController">
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
                            

                            <h4 class="title">Pagos  {{ isset($registration) ? $registration->nombres : 'Por Confirmar' }} <i ng-show="loading" class="fa fa-spinner fa-spin"></i></h4>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" data-ng-model="searchTerm" class="form-control pull-right" placeholder="Buscar">
                        </div>
                    </div>
                    <br><br><br>
                    <div ng-if="payments.length > 0">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Fecha</th>
                                    <th>Referencia: Monto</th>
                                    <th>Cedula</th>
                                    <th>Banco</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="pay in payments | filter:searchTerm | orderBy:'-fecha'">
                                        <td><% pay.fecha %></td>
                                        <td>
                                            <a ng-class="pay.status == '1' ? 'btn btn-sm btn-fill btn-success' : 'btn btn-sm btn-fill btn-warning'" ng-click="updateStatus(pay); (pay.status == '1' ? pay.status = '0' : pay.status = '1')"><% pay.referencia %>: Bs <% pay.monto %></a>
                                        </td>
                                        <td><% pay.cedula %></td>
                                        <td><% pay.banco %></td>
                                        <td>
                                            <a class="btn btn-sm btn-info btn-fill" ng-href="/categories/<% category.id %>/courses/<% course.id %>/edit"><i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
                                            <a class="btn btn-sm btn-danger btn-fill" onclick="if(confirm('¿Eliminar todos los datos asociados a esta Inscripción? ¿Estás seguro?')) { return true } else {return false };" ng-click="deletePayment(pay)"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div ng-if="payments.length == 0">
                        <h3 class="text-center alert alert-info">Aún no hay pagos reportados</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection