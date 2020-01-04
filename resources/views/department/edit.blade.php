@extends('layouts.app')

@section('content')
<a href="/department" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>department Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'DepartmentController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'department name') }}
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter department name']) }}
    </div>
   
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection