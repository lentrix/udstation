@extends('base')

@section('content')

<h1>{{$module->title}}</h1>
<div>{{$module->date_from->format('M d, Y')}} - {{$module->date_to->format('M d, Y')}}</div>
<hr>

<div class="row">
    <div class="col-md-4">
        <div class="list-group mb-3">
            <div class="list-group-item">{{$module->subject->course_no}}</div>
            <div class="list-group-item">{{$module->subject->description}}</div>
            <div class="list-group-item">{{$module->subject->schedule}}</div>
            <div class="list-group-item">{{$module->fileCount}}</div>
        </div>
        <a href="{{asset('module_files/' . $module->id . '/' . $module->subject->course_no . '_' . $module->title . '.zip')}}" class="btn btn-info" target="_blank">
            Download Module
        </a>
    </div>
</div>
@endsection
