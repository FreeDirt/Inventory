@extends('layouts.app')

@section('content')
<a href="/designation" class="btn btn-info">Go Back</a><br><br>

<div>
    <h1>designation SHOW</h1>
    <h3>designation Name: {{$designation->name}}</h3>

    <a href="/designation/{{$designation->id}}/edit" class="btn btn-success">Edit</a>
    

    {!!Form::open(['action' => ['DesignationController@destroy', $designation->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection