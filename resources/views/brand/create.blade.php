@extends('layouts.app')

@section('content')
<a href="/brand" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>brand Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'BrandController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'brand name') }}
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Brand name']) }}
    </div>
   
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection