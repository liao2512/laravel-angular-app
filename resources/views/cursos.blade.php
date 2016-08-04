@extends('layouts.back')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4 text-center">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{$course->name}}</h4>
                            <p class="category">{{$course->places - $course->registrations()->count()}} cupos disponibles</p>
                        </div>
                        <div class="content">
                            <a href="/curso/{{$course->id}}" class="btn btn-block btn-info btn-fill">Ver Más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection