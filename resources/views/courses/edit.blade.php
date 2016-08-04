@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Courses / Edit #{{$course->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('categories.courses.update', [$course->category, $course->id]) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ $course->name }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <textarea class="form-control" id="description-field" rows="3" name="description">{{ $course->description }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('places')) has-error @endif">
                       <label for="places-field">Places</label>
                    <input type="text" id="places-field" name="places" class="form-control" value="{{ $course->places }}"/>
                       @if($errors->has("places"))
                        <span class="help-block">{{ $errors->first("places") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('position')) has-error @endif">
                       <label for="position-field">Position</label>
                    <input type="text" id="position-field" name="position" class="form-control" value="{{ $course->position }}"/>
                       @if($errors->has("position"))
                        <span class="help-block">{{ $errors->first("position") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('status')) has-error @endif">
                       <label for="status-field">Status</label>
                    <input type="text" id="status-field" name="status" class="form-control" value="{{ $course->status }}"/>
                       @if($errors->has("status"))
                        <span class="help-block">{{ $errors->first("status") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('categories.courses.index', [$course->category]) }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection