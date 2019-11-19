@extends('layouts.app')

@section('content')
<a href="/role" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Role Edit</h1>

{!! Form::open(['action' => ['RoleController@update', $role->id], 'method' => 'POST']) !!}
<div class="form-group">
        {{ Form::label('name', 'Item Description') }}
        {{ Form::text('name', $role->name, ['class' => 'form-control', 'placeholder' => 'Enter Item Description']) }}
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection