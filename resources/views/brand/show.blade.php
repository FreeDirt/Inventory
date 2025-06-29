@extends('layouts.app')

@section('content')
<a href="/brand" class="btn btn-info">Go Back</a><br><br>

<div>
    <h1>Brand SHOW</h1>
    <h3>Brand Name: {{$brand->name}}</h3>

    <a href="/brand/{{$brand->id}}/edit" class="btn btn-success">Edit</a>
    

    {!!Form::open(['action' => ['BrandController@destroy', $brand->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection