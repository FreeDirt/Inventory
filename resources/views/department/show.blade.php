@extends('layouts.app')

@section('content')
<a href="/department" class="btn btn-info">Go Back</a><br><br>

<div>
    <h1>department SHOW</h1>
    <h3>department Name: {{$department->name}}</h3>

    <a href="/department/{{$department->id}}/edit" class="btn btn-success">Edit</a>
    

    {!!Form::open(['action' => ['DepartmentController@destroy', $department->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection