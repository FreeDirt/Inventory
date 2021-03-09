@extends('layouts.app')

@section('content')
<a href="/category" class="btn btn-info">Go Back</a><br><br>


<h1> Parent Category Edit</h1>

{!! Form::open(['action' => ['ParentcatController@update', $parent_category->id], 'method' => 'POST']) !!}
<div class="form-group">
        {{ Form::label('name', 'Category Name') }}
        {{ Form::text('name', $parent_category->name, ['class' => 'form-control', 'placeholder' => 'Enter Category Name']) }}
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection