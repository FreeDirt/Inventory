@extends('layouts.app')

@section('content')
<a href="/stock" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>stock Edit</h1>

{!! Form::open(['action' => ['StockController@update', $stock->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('category_id', 'Category') }}
        <select name="devcat" class="form-control">
        <?php $selectedvalue = $stock->device->category['id']; ?>
            @foreach ($categories as $cat)
            <option value="{{$cat->id}}" {{ $selectedvalue == $cat->id ? 'selected="selected"' : ''}}>{{$cat->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('device_id', 'Device') }}
        <select id="device_id" class="form-control" name="device_id">
        <?php $selectedvalue = $stock->device['id'] ?>
        @foreach ($devices->unique('category_id') as $device)
            <option value="{{$device->id}}" {{ $selectedvalue == $device->id ? 'selected="selected"' : ''}}>{{ucfirst($stock->device['name'])}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
        {{ Form::label('employee_id', 'Employee') }}
        <select class="form-control" name="employee_id" id="">
        <option value="">--- Select Employee ---</option>
        <?php $selectedvalue = $stock->employee_id ?>
        @foreach ($employees as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('serial', 'Serial') }}
        {{ Form::text('serial', $stock->serial, ['class' => 'form-control', 'placeholder' => 'Enter Serial']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', $stock->description, ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
    </div>
    <div class="form-group">
        {{ Form::label('item_code', 'Item Code') }}
        {{ Form::text('item_code', $stock->item_code, ['class' => 'form-control', 'placeholder' => 'Enter Item Code']) }}
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection