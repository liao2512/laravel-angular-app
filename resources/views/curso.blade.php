@extends('layouts.back')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12r">
                <div class="card">
                    <div class="header">
                        @if ($course->registrations()->count() >= $course->places)
                            <button class="btn btn-lg btn-warning btn-fill pull-right disabled">NO HAY CUPOS</button>
                        @else
                            <a href="{{$course->id}}/inscripcion" class="btn btn-lg btn-info btn-fill pull-right">INSCRIBIRME</a>
                        @endif
                        <h3 class="title">{{$course->name}}</h3>
                        <p class="category">{{$course->places - $course->registrations()->count()}} cupos disponibles</p>
                    </div>
                    <hr>
                    <div class="content text-center">
                        <p>{!! nl2br(e($course->description)) !!}</p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection