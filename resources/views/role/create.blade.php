@extends('layouts.app')

@section('content')
<a href="/role" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Role Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'RoleController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Role name') }}
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Role name']) }}
    </div>
   
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection