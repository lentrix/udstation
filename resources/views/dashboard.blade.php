
@extends('base')

@section('content')

<h1>My Subjects</h1>
<hr>

<div class="d-flex justify-content-center flex-wrap">

    @foreach($user->subjects as $subject)
    <a href="{{url('/subjects/' . $subject->id)}}" class="card subject bg-info shadow nav-link text-white">
        <h3 class="title">{{$subject->course_no}}</h3>
        <p class="font-weight-bold">{{$subject->description}}</p>
        <div>Number of Modules: {{$subject->moduleCount}}</div>
    </a>
    @endforeach
    <a href="{{url('/subjects/create')}}"
            class="card subject bg-light shadow nav-link text-dark d-flex justify-content-center align-items-center">
        <h1>+</h1>
    </a>


</div>

@endsection
