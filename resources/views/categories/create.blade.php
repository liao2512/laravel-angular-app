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
                                <h4 class="title"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Categoría</h4>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-info btn-fill pull-right" href="{{ route('categories.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
                            </div>
                        </div>
                        <br><br>
                        <div class="content">
                            <form action="{{ route('categories.store') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="position-field">Posición</label>
                                            <select id="position-field" name="position" class="form-control" value="{{ old("position") }}"/>
                                                @if($categories == 0)
                                                    <option value="1">1</option>
                                                @else
                                                    @for ($x = 1; $x < $categories; $x++)
                                                    <option value="{{$x}}">{{$x}}</option>
                                                    @endfor
                                                @endif
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name-field">Categoría</label>
                                            <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status-field">Status</label>
                                            <select id="status-field" name="status" class="form-control" value="{{ old("status") }}">
                                                <option value="1">Activa</option>
                                                <option value="0">Inactiva</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                    
                                <button type="submit" class="btn btn-info btn-fill btn-block">Crear Nueva Categoría</button>    
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection