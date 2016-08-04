@extends('layout')
@section('header')
<div class="page-header">
        <h1>Courses / Show #{{$course->id}}</h1>
        <form action="{{ route('categories.courses.destroy', [$course->category, $course->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('courses.edit', $course->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$course->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="description">DESCRIPTION</label>
                     <p class="form-control-static">{{$course->description}}</p>
                </div>
                    <div class="form-group">
                     <label for="places">PLACES</label>
                     <p class="form-control-static">{{$course->places}}</p>
                </div>
                    <div class="form-group">
                     <label for="position">POSITION</label>
                     <p class="form-control-static">{{$course->position}}</p>
                </div>
                    <div class="form-group">
                     <label for="status">STATUS</label>
                     <p class="form-control-static">{{$course->status}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('categories.courses.index', $categories) }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection