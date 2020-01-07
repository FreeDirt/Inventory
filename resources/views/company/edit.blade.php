@extends('layouts.app')

@section('content')
<a href="/company" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>company Edit</h1>

{!! Form::open(['action' => ['CompanyController@update', $company->id], 'method' => 'POST']) !!}
<div class="form-group">
        {{ Form::label('name', 'company Name') }}
        {{ Form::text('name', $company->name, ['class' => 'form-control', 'placeholder' => 'Enter company Name']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'department desciption') }}
        {{ Form::text('description', $company->description, ['class' => 'form-control', 'placeholder' => 'Enter department name']) }}
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection