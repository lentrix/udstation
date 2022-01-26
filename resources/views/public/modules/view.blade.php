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
    <div class="col-md-8">
        <h4>Activities</h4>
        <hr>
        @foreach($module->activities as $activity)
        
        <div class="card shadow mb-3">
            <div class="card-body">
                <div class="float-right">
                    @include('public.modules._upload-modal',['activity'=>$activity])
                </div>
                <h6>{{$activity->title}}</h6>
                <div>Description: {{$activity->description}}</div>
            </div>
        </div>
        
        @endforeach
    </div>
</div>
@endsection
