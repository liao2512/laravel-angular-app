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
                                <h4 class="title"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Curso {{ $category->name }}</h4>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-info btn-fill pull-right" href="{{ route('categories.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
                            </div>
                        </div>
                        <br><br>
                        <div class="content">
                             <form action="{{ route('categories.courses.store', $category) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="position-field">Posición</label>
                                            <select id="position-field" name="position" class="form-control" value="{{ old("position") }}"/>
                                                @if($courses > 0)
                                                    @for ($x = 1; $x < $courses+1; $x++)
                                                        <option value="{{$x}}">{{$x}}</option>
                                                    @endfor
                                                @else
                                                    <option value="1">1</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name-field">Curso</label>
                                            <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="places-field">Cupos</label>
                                            <input type="number" id="places-field" name="places" class="form-control" value="{{ old("places") }}" required/>
                                                @if($errors->has("places"))
                                                    <span class="help-block">{{ $errors->first("places") }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="status-field">Status</label>
                                            <select id="status-field" name="status" class="form-control" value="{{ old("status") }}">
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description-field">Descripción</label>
                                            <textarea rows="4" id="description-field" name="description" class="form-control" value="{{ old("description") }}" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                    
                                <button type="submit" class="btn btn-info btn-fill btn-block">Crear Nuevo Curso</button>    
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection