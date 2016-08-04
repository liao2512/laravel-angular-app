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
                                <h4 class="title"><i class="fa fa-edit" aria-hidden="true"></i> Editar Categoría</h4>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-info btn-fill pull-right" href="{{ route('categories.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
                            </div>
                        </div>
                        <div class="content">
                            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group @if($errors->has('position')) has-error @endif">
                                            <label for="position-field">Posición</label>
                                            <select id="position-field" name="position" class="form-control" value="{{ old("position") }}"/>
                                                @for ($x = 1; $x < $categories; $x++)
                                                    <option value="{{$x}}">{{$x}}</option>
                                                </p>
                                                @endfor
                                            </select>
                                               @if($errors->has("position"))
                                                <span class="help-block">{{ $errors->first("position") }}</span>
                                               @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @if($errors->has('name')) has-error @endif">
                                            <label for="name-field">Categoría</label>
                                            <input type="text" id="name-field" name="name" class="form-control" value="{{ $category->name }}"/>
                                               @if($errors->has("name"))
                                                <span class="help-block">{{ $errors->first("name") }}</span>
                                               @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group @if($errors->has('status')) has-error @endif">
                                            <label for="status-field">Status</label>
                                            <select id="status-field" name="status" class="form-control">
                                                @if($category->status)
                                                    <option value="1">Activa</option>
                                                    <option value="0">Inactiva</option>
                                                @else
                                                    <option value="0">Inactiva</option>
                                                    <option value="1">Activa</option>
                                                @endif
                                            </select>
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