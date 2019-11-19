@extends('layouts.app')

@section('content')
<a href="/role" class="btn btn-info">Go Back</a><br><br>

<div>
    <h1>Role SHOW</h1>
    <h3>Item Description: {{$role->name}}</h3>

    <a href="/role/{{$role->id}}/edit" class="btn btn-success">Edit</a>
    

    {!!Form::open(['action' => ['RoleController@destroy', $role->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection