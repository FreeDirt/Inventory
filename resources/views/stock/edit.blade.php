@extends('layouts.app')

@section('content')
<a href="/stock" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>stock Edit</h1>

{!! Form::open(['action' => ['StockController@update', $stock->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('category', 'category') }}
        <select name="devcat" class="form-control">
            @foreach ($devices as $device)
                <option value="{{$device->category['id']}}">{{ucfirst($device->category['name'])}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('Name', 'Name') }}
        <select id="device_id" class="form-control" name="device_id">
                        <option value="">{{$stock->device['name']}}</option>
                </select>
        
    </div>
    <div class="form-group">
        {{ Form::label('employee_id', 'Employee') }}
        <select class="form-control" name="employee_id" id="">
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
        {{ Form::label('item_code', 'Item Code') }}
        {{ Form::text('item_code', $stock->item_code, ['class' => 'form-control', 'placeholder' => 'Enter Item Code']) }}
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection