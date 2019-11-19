@extends('layouts.app')

@section('content')

<a href="/admin" class="btn btn-info">Go Back</a><br><br>

{!! Form::open(['action' => ['AdminController@update', $user->id], 'method' => 'POST']) !!}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Enter Email']) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('roleId', 'RoleId') }}
        <select class="form-control" name="roleId" id="">
        <?php $selectedvalue = $user->roles->first()->name ?>
        @foreach ($roles as $key => $role)
            <option value="{{$role->name}}" {{ $selectedvalue == $role->name ? 'selected="selected"' : ''}}>{{$role->name}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Enter Password') }}
        {{ Form::text('password', '', ['class' => 'form-control', 'placeholder' => 'Password']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirmation Password') }}
        {{ Form::text('password', '', ['class' => 'form-control', 'placeholder' => 'Confirmation Password']) }}
    </div>

    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection