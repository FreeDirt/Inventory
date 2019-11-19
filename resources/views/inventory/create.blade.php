@extends('layouts.app')

@section('content')
<a href="/inventory" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Inventory Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'InventoryController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
    </div>
    <div class="form-group">
        {{ Form::label('category_id', 'Category') }}
        <select class="form-control" name="category_id" id="">
        @foreach ($categories as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('brand_id', 'Brand') }}
        <select class="form-control" name="brand_id" id="">
        @foreach ($brands as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('model_number', 'Model Number') }}
        {{ Form::text('model_number', '', ['class' => 'form-control', 'placeholder' => 'Enter Model']) }}
    </div>
    <div class="form-group">
        {{ Form::label('serial_number', 'Serial Number') }}
        {{ Form::text('serial_number', '', ['class' => 'form-control', 'placeholder' => 'Enter Serial']) }}
    </div>
    <div class="form-group">
        {{ Form::label('year_purchased', 'Year Purchased') }}
        {{ Form::date('year_purchased', '', ['class' => 'form-control', 'placeholder' => 'Year Purchased']) }}
    </div>
    <div class="form-group">
        {{ Form::label('amount', 'Amount') }}
        {{ Form::text('amount', '', ['class' => 'form-control', 'placeholder' => 'Enter Amount']) }}
    </div>
    <div class="form-group">
        {{ Form::label('quantity', 'Quantity') }}
        {{ Form::text('quantity', '', ['class' => 'form-control', 'placeholder' => 'Enter Quantity']) }}
    </div>
    <div class="form-group">
        {{ Form::label('user', 'User') }}
        {{ Form::text('user', '', ['class' => 'form-control', 'placeholder' => 'Enter User']) }}
    </div>
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection