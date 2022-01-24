@extends('base')

@section('content')

<h1>Registration Form</h1>
<hr>

<div class="col-md-4 offset-md-4">

    {!! Form::open(['url'=>'/register','method'=>'post']) !!}

    <div class="form-group">
        {!! Form::label("user_name", "User Name") !!}
        {!! Form::text("user_name", null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("full_name", "Full Name") !!}
        {!! Form::text("full_name", null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("password", "Password") !!}
        {!! Form::password("password", ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("password_confirmation", "Confirm Password") !!}
        {!! Form::password("password_confirmation", ['class'=>'form-control']) !!}
    </div>

    <button class="btn btn-primary w-50">Register</button>

    {!! Form::close() !!}

</div>

@endsection
