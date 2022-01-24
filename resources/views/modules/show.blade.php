@extends('base')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{url('/subjects/' . $module->subject_id)}}">{{$module->subject->course_no}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$module->title}}</li>
    </ol>
</nav>

<h1>{{$module->title}}</h1>
<hr>

<div class="row">
    <div class="col-md-8">
        <div class="float-right">
            {!! Form::open(['url' => '/modules/' . $module->id . '/add-file', 'method'=>'post','files'=>'true']) !!}
                {!! Form::label("file", "Select File: ") !!}
                {!! Form::file("file") !!}
                <button class="btn btn-sm btn-primary">Upload</button>
            {!! Form::close() !!}
        </div>
        <h3>Module Files</h3>
        <hr>
        <table class="table table-bordered table-sm">
            <thead class='bg-info'>
                <tr>
                    <th>File Name</th>
                    <th>File Size</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($files as $file)
                <tr>
                    <td>{{$file['name']}}</td>
                    <td>{{ number_format(($file['size'])/1000000,2)}} MB</td>
                    <td>
                        <a href="{{url('/modules/' . $module->id . '/delete-file/' . $file['name'])}}" class="btn btn-sm btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <ul class="list-group mb-3">
            <li class="list-group-item">
                <strong>{{$module->subject->course_no}}</strong>
            </li>
            <li class="list-group-item">{{$module->subject->description}}</li>
            <li class="list-group-item">
                {{$module->date_from->format('M d, Y')}} -
                {{$module->date_to->format('M d, Y')}}
            </li>
        </ul>

        <a href="{{url('/subjects/' . $module->subject_id . '/module/' . $module->id . "/edit")}}" class="btn btn-info">Update Module</a>
        <hr>


    </div>
</div>


@endsection
