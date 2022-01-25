@extends('base')

@section('content')

<h1>Update Module</h1>
<div>{{$module->subject->course_no}} - {{$module->subject->description}}</div>
<hr>

<div class="col-md-4">
    {!! Form::model($module, ['url'=>"/modules/$module->id",'method'=>'put']) !!}
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

    <button class="btn btn-success w-50">
        Update Module
    </button>
    {!! Form::close() !!}
</div>


@endsection
