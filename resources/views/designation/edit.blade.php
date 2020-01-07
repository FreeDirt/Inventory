@extends('layouts.app')

@section('content')
<a href="/designation" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>designation Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'DesignationController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Designation name') }}
        {{ Form::text('name', $designation->name, ['class' => 'form-control', 'placeholder' => 'Enter designation name']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Designation description') }}
        {{ Form::text('description', $designation->description, ['class' => 'form-control', 'placeholder' => 'Enter designation name']) }}
    </div>
   
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection