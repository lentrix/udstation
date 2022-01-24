@extends('base')

@section('content')

<h1>{{$subject->course_no}} | Create Module</h1>
<hr>

<div class="col-md-4">
    {!! Form::open(['url'=>"/subjects/$subject->id/modules",'method'=>'post']) !!}
    <div class="form-group">
        {!! Form::label("title", "Title") !!}
        {!! Form::text("title", null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label("date_from", "Date From") !!}
        {!! Form::date("date_from", null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label("date_to", "Date To") !!}
        {!! Form::date("date_to", null, ['class'=>'form-control']) !!}
    </div>

    <button class="btn btn-primary w-50">
        Create Module
    </button>
    {!! Form::close() !!}
</div>


@endsection
