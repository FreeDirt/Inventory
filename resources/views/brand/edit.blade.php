@extends('layouts.app')

@section('content')
<a href="/brand" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Brand Edit</h1>

{!! Form::open(['action' => ['BrandController@update', $brand->id], 'method' => 'POST']) !!}
<div class="form-group">
        {{ Form::label('name', 'Brand Name') }}
        {{ Form::text('name', $brand->name, ['class' => 'form-control', 'placeholder' => 'Enter Brand Name']) }}
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection