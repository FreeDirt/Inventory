@extends('layouts.app')

@section('content')
<a href="/country" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Country Edit</h1>

{!! Form::open(['action' => ['CountryController@update', $country->id], 'method' => 'POST']) !!}
<div class="form-group">
        {{ Form::label('name', 'Country Name') }}
        {{ Form::text('name', $Country->name, ['class' => 'form-control', 'placeholder' => 'Enter Country Name']) }}
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection