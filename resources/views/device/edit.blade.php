@extends('layouts.app')

@section('content')
<a href="/device" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Device Edit</h1>

{!! Form::open(['action' => ['DeviceController@update', $device->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('deviceCode', 'deviceCode') }}
        {{ Form::text('deviceCode', $device->deviceCode, ['class' => 'form-control', 'placeholder' => 'Enter deviceCode']) }}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Device Name') }}
        {{ Form::text('name', $device->name, ['class' => 'form-control', 'placeholder' => 'Enter Device Name']) }}
    </div>

    <div class="form-group">
        {{ Form::label('brand_id', 'Brand') }}
        <select class="form-control" name="brand_id" id="">
        <?php $selectedvalue = $device->brand_id ?>
        @foreach ($brands as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('category_id', 'Category') }}
        <select class="form-control" name="category_id" id="">
        <?php $selectedvalue = $device->category_id ?>
        @foreach ($categories as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('model_no', 'Model Number') }}
        {{ Form::text('model_no', $device->model_no, ['class' => 'form-control', 'placeholder' => 'Enter Model Number']) }}
    </div>
    <div class="form-group">
        {{ Form::label('model_year', 'Model Year') }}
        {{ Form::text('model_year', $device->model_year, ['class' => 'form-control', 'placeholder' => 'Enter Model Year']) }}
    </div>
    <div class="form-group">
        {{ Form::label('cost', 'Cost') }}
        {{ Form::text('cost', $device->cost, ['class' => 'form-control', 'placeholder' => 'Cost']) }}
    </div>
    <div class="form-group">
        {{ Form::label('country_id', 'Country') }}
        <select class="form-control" name="country_id" id="">
        <?php $selectedvalue = $device->country_id ?>
        @foreach ($countries as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection