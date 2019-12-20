@extends('layouts.app')

@section('content')
<a href="/employee" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>employee Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'EmployeeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email']) }}
    </div>
    <div class="form-group">
        {{ Form::label('bday', 'Birthday') }}
        {{ Form::date('bday', '', ['class' => 'form-control', 'placeholder' => 'Enter Birthday']) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('personal_no', 'Personal Number') }}
        {{ Form::text('personal_no', '', ['class' => 'form-control', 'placeholder' => 'Enter Personal Number']) }}
    </div>
    <div class="form-group">
        {{ Form::label('company_no', 'Company Number') }}
        {{ Form::text('company_no', '', ['class' => 'form-control', 'placeholder' => 'Company Number']) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address']) }}
    </div>
    <div class="form-group">
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City']) }}
    </div>
    <div class="form-group">
        {{ Form::label('region', 'Region') }}
        {{ Form::text('region', '', ['class' => 'form-control', 'placeholder' => 'Region']) }}
    </div>
    <div class="form-group">
        {{ Form::label('postal_code', 'Postal Code') }}
        {{ Form::text('postal_code', '', ['class' => 'form-control', 'placeholder' => 'Postal Code']) }}
    </div>
    <div class="form-group">
        {{ Form::label('employee_no', 'Employee No') }}
        {{ Form::text('employee_no', '', ['class' => 'form-control', 'placeholder' => 'Employee No']) }}
    </div>
    <div class="form-group">
        {{ Form::label('gender', 'Gender') }}
        <select class="form-control" name="gender" id="">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="form-group">
        {{ Form::file('cover_image')}}
    </div>
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection