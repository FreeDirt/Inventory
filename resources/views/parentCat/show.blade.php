@extends('layouts.app')

@section('content')
<a href="/category" class="btn btn-info">Go Back</a><br><br>

<div>
    <h1>Parent Category SHOW</h1>
    <h3>Item Description: {{$parent_category->name}}</h3>

    <a href="/category/{{$parent_category->id}}/edit" class="btn btn-success">Edit</a>
    

    {!!Form::open(['action' => ['ParentcatController@destroy', $parent_category->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection