@extends('layouts.app')

@section('content')
<a href="/employee" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>employee Edit</h1>

{!! Form::open(['action' => ['EmployeeController@update', $employee->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('name', 'employee Name') }}
        {{ Form::text('name', $employee->name, ['class' => 'form-control', 'placeholder' => 'Enter employee Name']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', $employee->email, ['class' => 'form-control', 'placeholder' => 'EnterEmail']) }}
    </div>
    <div class="form-group">
        {{ Form::label('bday', 'Model Year') }}
        {{ Form::text('bday', $employee->bday, ['class' => 'form-control', 'placeholder' => 'Enter Birthday']) }}
    </div>
    <div class="form-group">
        {{ Form::label('personal_no', 'Personal Number') }}
        {{ Form::text('personal_no', $employee->personal_no, ['class' => 'form-control', 'placeholder' => 'Personal Number']) }}
    </div>
    <div class="form-group">
        {{ Form::label('company_id', 'Company') }}
        <select class="form-control" name="company_id" id="">
        <?php $selectedvalue = $employee->company_id ?>
        @foreach ($companies as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('company_no', 'Company Number') }}
        {{ Form::text('company_no', $employee->company_no, ['class' => 'form-control', 'placeholder' => 'Company Number']) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', $employee->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}
    </div>
    <div class="form-group">
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', $employee->city, ['class' => 'form-control', 'placeholder' => 'City']) }}
    </div>
    <div class="form-group">
        {{ Form::label('region', 'Region') }}
        {{ Form::text('region', $employee->region, ['class' => 'form-control', 'placeholder' => 'Region']) }}
    </div>
    <div class="form-group">
        {{ Form::label('postal_code', 'Postal Code') }}
        {{ Form::text('postal_code', $employee->postal_code, ['class' => 'form-control', 'placeholder' => 'Postal Code']) }}
    </div>
    <div class="form-group">
        {{ Form::label('employee_no', 'Employee No') }}
        {{ Form::text('employee_no', $employee->employee_no, ['class' => 'form-control', 'placeholder' => 'Employee No']) }}
    </div>
    <div class="form-group">
        {{ Form::label('gender', 'Gender') }}
        {{ Form::text('gender', $employee->gender, ['class' => 'form-control', 'placeholder' => 'Gender']) }}
    </div>
    <div class="form-group">
        {{ Form::file('cover_image')}}
    </div>
    <div>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}

@endsection