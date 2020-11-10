@extends('layouts.app')

@section('content')
<a href="/admin" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Admin Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'AdminController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email']) }}
    </div>
    <div class="form-group">
        {{ Form::label('roleId', 'RoleId') }}
        <select class="form-control" name="roleId" id="">
        @foreach ($roles as $key => $role)
            <option value="{{$role->name}}"> {{$role->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Enter Password') }}
        {{ Form::text('password', '', ['class' => 'form-control', 'placeholder' => 'Password']) }}
    </div>

    <div class="form-group">
        {{ Form::label('confirmed', 'Confirmation Password') }}
        {{ Form::text('confirmed', '', ['class' => 'form-control', 'placeholder' => 'Confirmation Password']) }}
    </div>
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection
