@extends('layouts.app')

@section('content')
<div class="container"><br>
<a href="/employee" class="btn btn-info">Go Back</a><br><br>


<h1>employee Create</h1>
</div>
<div class="tablebg container">

{!! Form::open(['action' => 'EmployeeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="auto-fit">
        <div class="form-group">
            <!-- {{ Form::label('name', 'Name') }} -->
            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('email', 'Email') }} -->
            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email']) }}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('bday', 'Birthday') }} -->
            {{ Form::date('bday', '', ['class' => 'form-control', 'placeholder' => 'Enter Birthday']) }}
        </div>
        
        <div class="form-group">
            <!-- {{ Form::label('personal_no', 'Personal Number') }} -->
            {{ Form::text('personal_no', '', ['class' => 'form-control', 'placeholder' => 'Enter Personal Number']) }}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('company_id', 'Company') }} -->
            <select class="form-control" name="company_id">
            <option value="">--- Select Company ---</option>
            @foreach ($companies as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <!-- {{ Form::label('ipaddress_id', 'Ip Address') }} -->
            <select class="form-control" name="ipaddress_id">
            <option value="">--- Select IP ---</option>
            @foreach ($ipaddresses as $key => $value)
                <option value="{{$value->id}}">{{$value->ip}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <!-- {{ Form::label('department_id', 'Department') }} -->
            <select class="form-control" name="department_id">
                <option value="">--- Select Department ---</option>
            @foreach ($departments as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <!-- {{ Form::label('designation_id', 'Designation') }} -->
            <select class="form-control" name="designation_id">
            <option value="">--- Select Designation ---</option>
            @foreach ($designations as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <!-- {{ Form::label('company_no', 'Company Number') }} -->
            {{ Form::text('company_no', '', ['class' => 'form-control', 'placeholder' => 'Company Number']) }}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('country_id', 'Country') }} -->
            <select class="form-control" name="country_id">
            <option value="">--- Select Country ---</option>
            @foreach ($countries as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <!-- {{ Form::label('address', 'Address') }} -->
            {{ Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address']) }}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('city', 'City') }} -->
            {{ Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City']) }}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('region', 'Region') }} -->
            {{ Form::text('region', '', ['class' => 'form-control', 'placeholder' => 'Region']) }}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('postal_code', 'Postal Code') }} -->
            {{ Form::text('postal_code', '', ['class' => 'form-control', 'placeholder' => 'Postal Code']) }}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('employee_no', 'Employee No') }} -->
            {{ Form::text('employee_no', '', ['class' => 'form-control', 'placeholder' => 'Employee No']) }}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('gender', 'Gender') }} -->
            <select class="form-control" name="gender">
                <option value="Male"> Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="form-group">
            <!-- {{ Form::label('gender', 'Gender') }} -->
            <select class="form-control" name="status">
            <option value="">--- Select Status ---</option>
            @foreach ($empstatuses as $key => $value)
                <option value="{{$value->id}}">{{$value->status}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <a class="btn btn-primary" href="#open-modal" id="mdlopen">Select Image</a> <span>{{ Form::text('cover_image', '', ['class' => 'selectedImage', 'id' => 'img-id', 'readonly']) }}</span>
            <div id="open-modal" class="modal-window">
                <a href="#" title="Close" class="modal-close">Close</a>
                
                @if(count($images) > 0)
                <div class="body-theme">
                    <div class="media_images grid repeat7">
                        @foreach($images as $image)
                        <img src="/storage/cover_images/{{$image->image_name}}" class="clickMe" id="{{$image->image_name}}">
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>

        <div class="form-group">
        {{ Form::file('cover_image')}}
        </div>
    </div>
    <div class="form-group">
            <label for="add-new"><div class="cancel">Cancel</div></label>
            {{ Form::submit('Add', ['class' => 'add']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection