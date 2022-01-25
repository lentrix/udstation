@extends('base')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="text-center">Search Subject</h1>
        {!! Form::open(['url'=>'/','method'=>'post']) !!}
        <div class="input-group">
            <input type="text" name="search_key" id="search_key" class="form-control">
            <button type="submit" class="btn btn-primary btn-outline input-group-button" id="search_btn">Search</button>
        </div>
        {!! Form::close() !!}

        @if(isset($subjects))

        <hr>
        <p class="text-italic">Search result for "{{$key}}"</p>
            @foreach($subjects as $sub)
                    <a href="{{url('/public/subjects/' . $sub->id)}}" class="card text-white nav-link bg-info shadow mb-3">
                        <div class="card-body">
                            <div style="font-size: 1.4em; font-weight: bold">{{$sub->course_no}}</div>
                            <div>{{$sub->description}}</div>
                            <div class="font-italic">{{$sub->schedule}}</div>
                            <div><strong>Teacher: </strong> {{$sub->user->full_name}}</div>
                        </div>
                    </a>
            @endforeach


        @endif
    </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(()=>{

    })
</script>

@endsection
