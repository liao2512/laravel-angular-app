@extends('layouts.back')

<script type="text/javascript">
    var coursesCategory = {{ $category->id }};
</script>

@section('content')
<div class="content" ng-app="admiApp" ng-controller="coursesController">
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
                        <div class="col-sm-4">
                            <h4 class="title">Cursos {{ $category->name }} <i ng-show="loading" class="fa fa-spinner fa-spin"></i></h4>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" data-ng-model="searchTerm" class="form-control" placeholder="Buscar">
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-info btn-fill pull-right" href="{{ route('categories.courses.create', $category) }}"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Curso</a>
                        </div>
                    </div>
                    <br><br><br>
                    <div ng-if="courses.length > 0">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Posición</th>
                                    <th>Categoría</th>
                                    <th>Ver Inscritos</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="course in courses | filter:searchTerm | orderBy:'position'">
                                        <td><% course.position %></td>
                                        <td>
                                            <a class="btn btn-sm btn-success btn-fill" ng-class="{true: 'btn-warning', false: 'btn-success'}[!course.status]" ng-click="updateStatus(course); course.status = !course.status"><% course.name %></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary btn-fill" ng-href="/courses/<% course.id %>/registrations"><% course.registrations.length %> de <% course.places %></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info btn-fill" ng-href="/categories/<% category.id %>/edit"><i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
                                            <a class="btn btn-sm btn-danger btn-fill" onclick="if(confirm('¿Eliminar todos los datos asociados a esta Categoría? ¿Estás seguro?')) { return true } else {return false };" ng-click="deleteCourse(course)"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div ng-if="categories.length == 0">
                        <h3 class="text-center alert alert-info">Crea un Nuevo Curso</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection