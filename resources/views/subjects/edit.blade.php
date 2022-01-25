@extends('base')

@section('content')

<h1>Edit Subject</h1>
<hr>

<div class="col-md-4">
    {!! Form::model($subject, ['url'=>'/subjects/' . $subject->id,'method'=>'put']) !!}

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

    <button class="btn btn-success w-50">
        Update Subject
    </button>

    {!! Form::close() !!}
</div>

@endsection
