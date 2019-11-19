@extends('layouts.app')

@section('content')
<a href="/inventory" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Inventory Edit</h1>

{!! Form::open(['action' => ['InventoryController@update', $inventory->id], 'method' => 'POST']) !!}
<div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', $inventory->description, ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
    </div>
    <div class="form-group">
        {{ Form::label('category_id', 'Category') }}
        <select class="form-control" name="category_id" id="">
        <?php $selectedvalue = $inventory->category_id ?>
        @foreach ($categories as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('brand_id', 'Brand') }}
        <select class="form-control" name="brand_id" id="">
        <?php $selectedvalue = $inventory->brand_id ?>
        @foreach ($brands as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('model_number', 'Model Number') }}
        {{ Form::text('model_number', $inventory->model_number, ['class' => 'form-control', 'placeholder' => 'Enter Model']) }}
    </div>
    <div class="form-group">
        {{ Form::label('serial_number', 'Serial Number') }}
        {{ Form::text('serial_number', $inventory->serial_number, ['class' => 'form-control', 'placeholder' => 'Enter Serial']) }}
    </div>
    <div class="form-group">
        {{ Form::label('year_purchased', 'Year Purchased') }}
        {{ Form::date('year_purchased', $inventory->year_purchased, ['class' => 'form-control', 'placeholder' => 'Year Purchased']) }}
    </div>
    <div class="form-group">
        {{ Form::label('amount', 'Amount') }}
        {{ Form::text('amount', $inventory->amount, ['class' => 'form-control', 'placeholder' => 'Amount']) }}
    </div>
    <div class="form-group">
        {{ Form::label('quantity', 'Quantity') }}
        {{ Form::text('quantity', $inventory->quantity, ['class' => 'form-control', 'placeholder' => 'Quantity']) }}
    </div>
    <div class="form-group">
        {{ Form::label('user', 'User') }}
        {{ Form::text('user', $inventory->user, ['class' => 'form-control', 'placeholder' => 'User']) }}
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection