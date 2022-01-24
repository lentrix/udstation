@extends('base')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$subject->course_no}}</li>
    </ol>
</nav>

<h1>{{$subject->course_no}}</h1>
<div>{{$subject->description}}</div>
<hr>

<div class="d-flex justify-content-center flex-wrap">

    @foreach($subject->modules as $module)
    <a href="{{url('/modules/' . $module->id)}}" class="card subject bg-info shadow nav-link text-white">
        <h3 class="title">{{$module->title}}</h3>
        <p class="font-weight-bold">{{$module->date_from}}-{{$module->date_to}}</p>

    </a>
    @endforeach
    <a href="{{url('/subjects/' . $subject->id . '/modules/create')}}"
            class="card subject bg-light shadow nav-link text-dark d-flex justify-content-center align-items-center">
        <h1>+</h1>
    </a>


</div>

@endsection
