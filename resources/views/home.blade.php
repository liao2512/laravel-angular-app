@extends('layouts.back')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @if(Session::has('message'))
                <div class="alert alert-success text-center">
                    <span>{{ Session::get('message') }}</span>
                </div>
            @endif
            @foreach($categories as $category)
                <div class="col-md-4 text-center">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{$category->name}}</h4>
                        </div>
                        <div class="content">
                            <a href="categoria/{{$category->id}}/cursos" class="btn btn-block btn-info btn-fill">Ver {{$category->courses()->count()}} Cursos</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection