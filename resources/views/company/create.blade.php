@extends('layouts.app')

@section('content')
<a href="/company" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>company Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'CompanyController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'company name') }}
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter company name']) }}
    </div>
   
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection