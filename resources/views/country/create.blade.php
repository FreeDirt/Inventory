@extends('layouts.app')

@section('content')
<a href="/country" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Country Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'CountryController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Country name') }}
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter country name']) }}
    </div>
   
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection