@extends('base')

@section('content')
<h1>{{$subject->course_no}}</h1>
<div>{{$subject->description}}</div>
<hr>
<h4>Available Modules</h4>
@if(count($subject->modules)==0)
    <i>No modules available...</i>
@endif
<div class="d-flex justify-content-center flex-wrap">

    @foreach($subject->modules as $module)
    <a href="{{url('/public/modules/' . $module->id)}}" class="card subject bg-info shadow nav-link text-white">
        <h3 class="title">{{$module->title}}</h3>
        <p class="font-weight-bold">{{$module->date_from->format('M d, Y')}} - {{$module->date_to->format('M d, Y')}}</p>
        <p class="font-italic">{{$module->fileCount}}.</p>

    </a>
    @endforeach
</div>
@endsection
