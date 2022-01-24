@extends('base')

@section('content')

<div class="col-md-4 offset-md-4 mt-4">
    <div class="alert alert-info mb-3">
        Notice: The authenticated users are only meant for teachers
    </div>
    <hr>

    {!! Form::open(['url'=>'/login','method'=>'post']) !!}

    <div class="form-group">
        {!! Form::label("user_name", "User Name") !!}
        {!! Form::text("user_name", null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("password", "Password") !!}
        {!! Form::password("password", ['class'=>'form-control']) !!}
    </div>

    <button class="btn btn-primary w-50">Login</button>

    {!! Form::close() !!}
</div>

@endsection
