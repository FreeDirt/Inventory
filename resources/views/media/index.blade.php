@extends('layouts.app')

@section('content')

<div class="body-theme">
    <div class="container">
        <h1>MEDIA LIBRARY</h1>

            {!! Form::open(['action' => 'MediaController@store', 'method' => 'POST', 'class' => 'dropzone needsclick']) !!}
            <div class="needsclick"><br>
            </div>
            <!-- {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }} -->
            {!! Form::close() !!}
    </div>
</div>


@if(count($images) > 0)
<div class="body-theme">
    <div class="media_images grid repeat5">
        @foreach($images as $image)
        <div>
            <img src="/storage/cover_images/{{$image->image_name}}" alt="prifile picture">
            <a href="" class="btn btn-primary"><i class="fas fa-eye"></i></a>
            <a href="" class="btn btn-success"><i class="fas fa-edit"></i></a>
        </div>
        @endforeach
        </div>
</div>

@endif


@endsection
