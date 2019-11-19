@extends('layouts.app')

@section('content')
<a href="/category" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Category Edit</h1>

{!! Form::open(['action' => ['CategoryController@update', $category->id], 'method' => 'POST']) !!}
<div class="form-group">
        {{ Form::label('name', 'Category Name') }}
        {{ Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Enter Category Name']) }}
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection