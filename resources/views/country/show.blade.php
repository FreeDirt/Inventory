@extends('layouts.app')

@section('content')
<a href="/country" class="btn btn-info">Go Back</a><br><br>

<div>
    <h1>Country SHOW</h1>
    <h3>Country Name: {{$country->name}}</h3>

    <a href="/country/{{$country->id}}/edit" class="btn btn-success">Edit</a>
    

    {!!Form::open(['action' => ['CountryController@destroy', $country->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection