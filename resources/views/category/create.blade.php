@extends('layouts.app')

@section('content')
<a href="/category" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Category Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Category name') }}
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Category name']) }}
    </div>
    <div class="form-group">
        <!-- {{ Form::label('sub_cat', 'Sub Category') }} -->
        <select class="form-control" name="sub_cat" id="">
            <option value="">--- Select ---</option>
            <option value="Monitor">Monitor</option>
            <option value="Peripherals">Peripherals</option>
            <option value="Computer">Equip</option>
            <option value="Mobile devices">Mobile devices</option>
            <option value="Electronics">Electronics</option>
        </select>
    </div>
    
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection