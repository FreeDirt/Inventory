@extends('layouts.app')

@section('content')
<a href="/device" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Device Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'DeviceController@store', 'class' => 'grid-template', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <!-- {{ Form::label('deviceCode', 'Device Code') }} -->
        <select class="form-control" name="deviceCode" id="">
        @foreach ($companies as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <select name="pcats" class="form-control">
            <option value="">--- Category ---</option>
            @foreach ($parentcats as $parentcat)
                @if(!empty($parentcat->name))
                    <option value="{{$parentcat->id}}">{{ucfirst($parentcat->name)}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <select id="category_id" class="form-control" name="category_id">
                <option value="">--- Sub Category ---</option>
        </select>
    </div>

    <div class="form-group">
        <!-- {{ Form::label('name', 'Device Name') }} -->
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Device Name']) }}
    </div>
    <div class="form-group">
        <!-- {{ Form::label('model_no', 'Model no.') }} -->
        {{ Form::text('model_no', '', ['class' => 'form-control', 'placeholder' => 'Enter Model No.']) }}
    </div>
    
    <div class="form-group">
        <!-- {{ Form::label('brand_id', 'Brand') }} -->
        <select class="form-control" name="brand_id" id="">
        @foreach ($brands as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <!-- {{ Form::label('model_year', 'Model Year') }} -->
        {{ Form::text('model_year', '', ['class' => 'form-control', 'placeholder' => 'Enter Model Year']) }}
    </div>
    <div class="form-group">
        <!-- {{ Form::label('cost', 'Cost') }} -->
        {{ Form::text('cost', '', ['class' => 'form-control', 'placeholder' => 'Cost']) }}
    </div>
    <div class="form-group">
        <!-- {{ Form::label('country', 'Country Purchased') }} -->
        <select class="form-control" name="country_id">
        <option value="">--- Select Country ---</option>
        @foreach ($countries as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ form::file('device_img')}}
    </div>
    
    <div class="form-group">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection