@extends('layouts.app')

@section('content')


<div class="employee-container">
<a href="/employee" class="btn btn-info">Go Back</a><br><br>
<div class="emp-prof-container">
<div class="emp-profile flex-2">
  <div class="isicon"><i class="fas fa-user fa-3x"></i></div>
<input type="checkbox" name="emp-edit-profile" class="emp-edit-form" id="emp-edit-profile">
{!! Form::open(['action' => ['EmployeeController@update', $employee->id], 'method' => 'POST', 'class' => 'emp-form', 'enctype' => 'multipart/form-data']) !!}
<div class="auto-fit">
    <div class="emp-input-style">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', ucfirst($employee->name), ['class' => 'form-control', 'placeholder' => 'Enter employee Name']) }}
    </div>
    <div class="emp-input-style">
        {{ Form::label('email', 'Email (Disabled)') }}
        {{ Form::text('email', $employee->email, ['class' => 'form-control', 'placeholder' => 'EnterEmail', 'disabled']) }}
    </div>
    <div class="emp-input-style">
        {{ Form::label('bday', 'Birthday') }}
        {{ Form::text('bday', $employee->bday, ['class' => 'form-control', 'placeholder' => 'Enter Birthday']) }}
    </div>
    <div class="emp-input-style">
        {{ Form::label('personal_no', 'Personal Number') }}
        {{ Form::text('personal_no', $employee->personal_no, ['class' => 'form-control', 'placeholder' => 'Personal Number']) }}
    </div>
    <div class="emp-input-style">
        {{ Form::label('company_id', 'Company') }}
        <select class="form-control" name="company_id" id="">
        <?php $selectedvalue = $employee->company_id ?>
        @foreach ($companies as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="emp-input-style">
        {{ Form::label('ipaddress_id', 'Ip Address') }}
        <select class="form-control" name="ipaddress_id" id="">
        <?php $selectedvalue = $employee->ipaddress_id ?>
        @foreach ($ipaddresses as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->ip}}</option>
        @endforeach
        </select>
    </div>
    <div class="emp-input-style">
        {{ Form::label('designation_id', 'Designation') }}
        <select class="form-control" name="designation_id" id="">
        <?php $selectedvalue = $employee->designation_id ?>
        @foreach ($designations as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="emp-input-style">
        {{ Form::label('department_id', 'department') }}
        <select class="form-control" name="department_id" id="">
        <?php $selectedvalue = $employee->department_id ?>
        @foreach ($departments as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="emp-input-style">
        {{ Form::label('company_no', 'Company Number') }}
        {{ Form::text('company_no', $employee->company_no, ['class' => 'form-control', 'placeholder' => 'Company Number']) }}
    </div>
    <div class="emp-input-style">
        {{ Form::label('country_id', 'Country') }}
        <select class="form-control" name="country_id" id="">
        <?php $selectedvalue = $employee->country_id ?>
        @foreach ($countries as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="emp-input-style">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', $employee->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}
    </div>
    <div class="emp-input-style">
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', $employee->city, ['class' => 'form-control', 'placeholder' => 'City']) }}
    </div>
    <div class="emp-input-style">
        {{ Form::label('region', 'Region') }}
        {{ Form::text('region', $employee->region, ['class' => 'form-control', 'placeholder' => 'Region']) }}
    </div>
    <div class="emp-input-style">
        {{ Form::label('postal_code', 'Postal Code') }}
        {{ Form::text('postal_code', $employee->postal_code, ['class' => 'form-control', 'placeholder' => 'Postal Code']) }}
    </div>
    <div class="emp-input-style">
        {{ Form::label('employee_no', 'Employee No') }}
        {{ Form::text('employee_no', $employee->employee_no, ['class' => 'form-control', 'placeholder' => 'Employee No']) }}
    </div>
    <div class="emp-input-style">
        {{ Form::label('gender', 'Gender') }}
        {{ Form::text('gender', $employee->gender, ['class' => 'form-control', 'placeholder' => 'Gender']) }}
    </div>

    <div class="emp-input-style">
        {{ Form::label('status', 'Status') }}
        <select class="form-control" name="status" id="">
        <?php $selectedvalue = $employee->status ?>
        @foreach ($empstatuses as $key => $value)
            <option value="{{$value->id}}" {{ $selectedvalue == $value->id ? 'selected="selected"' : ''}}>{{$value->status}}</option>
        @endforeach
        </select>
    </div>

    <div class="emp-input-style file-upload-img">
        {{ Form::file('cover_image')}}
    </div>
    <div class="emp-input-style">
        <div class="media-file-upload">
            <a class="btn btn-primary" href="#open-modal" id="mdlopen">Gallery</a> <span class="">{{ Form::text('cover_image', '', ['class' => 'selectedImage', 'id' => 'img-id', 'readonly']) }}</span>
        </div>
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
</div>
      <div class="emp-form-btn-cont">
          <div class="emp-form-update">
              {{ Form::hidden('_method', 'PUT')}}
              {{ Form::submit('Update', ['class' => 'update']) }}
          </div>
          <div class="emp-form-edit">
              <label for="emp-edit-profile" class="edit">Edit Profile</label>
          </div>
          <div class="emp-form-cancel">
              <label for="emp-edit-profile" class="cancel">Cancel</label>
          </div>
      </div>
{!! Form::close() !!}
</div>

    <div class="emp-profile flex-1">
        <div class="emp-cover-img">
            <img src="/storage/cover_images/{{$employee->cover_image}}" alt="{{$employee->name}}">
        </div>
        <div class="emp-text-content">
          <p><strong>{{$employee->name}}</strong></p>
          <p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?</p>
          <p><button class="emp-follow">Follow</button></p>
        </div>
    </div>
    
  </div>
</div>
@endsection