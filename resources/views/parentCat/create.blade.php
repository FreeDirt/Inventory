@extends('layouts.app')

@section('content')
<a href="/category" class="btn btn-info">Go Back</a><br><br>

<h1>Parent Category Create</h1>
<div class="tablebg">
    {!! Form::open(['action' => 'ParentcatController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('name', 'Parent Category name') }}
            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Parent Category name']) }}
        </div>
        
        <div>
            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        </div>
    {!! Form::close() !!}
</div>
@endsection