@extends('base')

@section('content')

<h1>Create Subject</h1>
<hr>

<div class="col-md-4">
    {!! Form::open(['url'=>'/subjects','method'=>'post']) !!}

    <div class="form-group">
        {!! Form::label("course_no", "Course Number") !!}
        {!! Form::text("course_no", null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("description", "Description") !!}
        {!! Form::text("description", null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("schedule", "Schedule") !!}
        {!! Form::text("schedule", null, ['class'=>'form-control']) !!}
    </div>

    <button class="btn btn-primary w-50">
        Create Subject
    </button>

    {!! Form::close() !!}
</div>

@endsection
