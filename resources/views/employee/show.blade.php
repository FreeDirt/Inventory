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
            <img src="/storage/cover_images/{{$employee->cover_image}}" alt="{{ucfirst($employee->name)}}">
        </div>
        <div class="emp-text-content">
          <p><strong>{{ucfirst($employee->name)}}</strong></p>
          <p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?</p>
          <p><button class="emp-follow">Follow</button></p>
        </div>
    </div>
    
  </div>
</div>



<!-- Bootstrap CSS -->
<!-- jQuery first, then Bootstrap JS. -->
<!-- Nav tabs -->
<div class="employee-container">
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" href="#accountability" role="tab" data-toggle="tab">Accountability</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Access Form</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#references" role="tab" data-toggle="tab">PDF</a>
  </li>
</ul>

</div>

<div class="employee-container">
<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane in active" id="accountability">
          <div class="print-btn">
              <button id="print" class="importStyle btn btn-primary">Print Me</button>
          </div>
    <div class="printThis">
        <div class="Accountability">
            <div class="ctrl-number"><p>Control Number: <span class="ctrl_underline"></span></p></div>
            <!-- //CTRL # -->
            <div class="logo-fca-kph">
                <div class="the-logos fca-logs"><img src="https://floodcontrol.asia/fca-assets/uploads/fca-logo-300.png" alt="fca"></div>
                <div class="the-logos kph-logs"><img src="http://dr-klippe.com/images/DRKLIPPEPHILS.png" alt="kph"></div>
            </div> 
            <!-- //logo-fca-kph -->
            <h2>ACCOUNTABILITY FORM (I.T)</h2>

            <div class="emp-acc-detail">
                <div class="acc-dt"><div class="acc-txt">Name:</div><div class="acc-input"><input type="text" value="{{ucfirst($employee->name)}}" {{ $employee->name ? 'disabled' : '' }}></div></div>
                <div class="acc-dt"><div class="acc-txt">Employee Number:</div><div class="acc-input"><input type="text" value="{{$employee->employee_no}}" {{ $employee->employee_no ? 'disabled' : '' }}></div></div>
                <div class="acc-dt"><div class="acc-txt">Department:</div><div class="acc-input"><input type="text" value="{{$empdepartment}}" {{ $empdepartment ? 'disabled' : '' }}></div></div>
                <div class="acc-dt"><div class="acc-txt">Position:</div><div class="acc-input"><input type="text" value="{{$empdesignation}}" {{ $empdesignation ? 'disabled' : '' }}></div></div>
            </div>

            <!-- //ACCOUNTABILITY FORM (I.T) -->
            
            <div class="the-form">
                <h6>ITEM ISSUED</h6>

                <div class="the-form-grid">
                <table class="table table-bordered w-border">
                <?php $prevcat = "" ?>
                  @foreach($employeeDevices as $key => $val)
                    @if ($prevcat != $val->parent_cat) 
                      <thead id="printed-article">
                      <tr>
                        <th scope="col"><p>{{$val->pcatname}}</p></th>
                        <th scope="col"><p>Unit Type</p></th>
                        <th scope="col"><p>Serial Number</p></th>
                        <th scope="col"><p>Date</p></th>
                        <th scope="col"><p>Received by</p></th>
                      </tr>
                    </thead>
                    <?php $prevcat = $val->parent_cat ?>
                    @endif
                    <tr> 
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option_{{$key}}" type="checkbox" class="custom-control-input" {{ isset($val->catName) ? $val->catName : '' }}  {{ isset($val->deviceSerial) ? 'checked' : '' }}  >
                          <label class="checkbox custom-control-label" for="option_{{$key}}">
                            &nbsp;&nbsp;<span>{{ isset($val->catName) ? $val->catName : '' }} </span>
                          </label>
                        </div>
                      </td>
                      <td><input type="text" placeholder="N/A" value="{{ isset($val->devName) ? $val->devName : '' }}" {{ isset($val->devName) ? 'disabled' : '' }}></td>
                      <td><input type="text"  placeholder="N/A" value="{{ isset($val->deviceSerial) ? $val->deviceSerial : '' }}"  {{ isset($val->deviceSerial) ? 'disabled' : '' }} ></td>
                      <td><input type="text"  placeholder="N/A" value="{{ isset($val->dateAdded) ? $val->dateAdded : '' }}" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                  @endforeach
                </table>
                </div>
            </div>

              <!-- // System Access -->
            
             <div class="the-form sys-access the-border">
                <h6>System Access</h6>

                <div class="the-form-grid">
                <table class="table table-bordered">
                   <!-- Mobile Devices -->
                   <thead>
                    <tr>
                      <th scope="col"><p>Email</p></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option22" type="checkbox" class="custom-control-input" checked>
                              <label class="checkbox custom-control-label" for="option22">&nbsp;&nbsp;@dr-klippe.com</label>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option23" type="checkbox" class="custom-control-input" checked>
                              <label class="checkbox custom-control-label" for="option23">&nbsp;&nbsp;@dr-klippe.de</label>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option24" type="checkbox" class="custom-control-input" checked>
                              <label class="checkbox custom-control-label" for="option24">&nbsp;&nbsp;@acc.dr-klippe.de</label>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option25" type="checkbox" class="custom-control-input" checked>
                              <label class="checkbox custom-control-label" for="option25">&nbsp;&nbsp;@floodcontrol.asia</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option26" type="checkbox" class="custom-control-input" checked>
                          <label class="checkbox custom-control-label" for="option26">&nbsp;&nbsp;@klipp.tv</label>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option27" type="checkbox" class="custom-control-input" checked>
                              <label class="checkbox custom-control-label" for="option27">&nbsp;&nbsp;google@acc.dr-klippe.de</label>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option28" type="checkbox" class="custom-control-input" checked>
                              <label class="checkbox custom-control-label" for="option28">&nbsp;&nbsp;apple@acc.dr-klippe.de</label>
                        </div>
                      </td>
                      <td></td>
                    </tr>
                  </tbody>
                  <!-- // Application -->
                  <thead>
                    <tr>
                      <th scope="col"><p>Applications</p></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option29" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option29">&nbsp;&nbsp;MIS System</label>
                        </div>
                      </td>
                      <td>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option30" type="checkbox" class="custom-control-input">
                              <label class="checkbox custom-control-label" for="option30">&nbsp;&nbsp;CRM System</label>
                        </div>
                      </td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                </div>
            </div>

             <!-- // Virified By -->
            
             <div class="the-form sys-access virified-by">
                <div class="the-form-grid">
                <table class="table table-bordered">
                   <!-- Mobile Devices -->
                  <tbody>
                    <tr>
                      <td><p><strong>verified by:</strong><br><span>( IT admin )</span></p>
                      </td>
                      <td><div class="acc-input"><input type="text" class="sign-over-name"><hr>Signature Over Printed Name
                      </td>
                      <td><p><strong>Employee:</strong><br><span> &nbsp;</span></p>
                      </td>
                      <td><div class="acc-input"><input type="text" class="sign-over-name" value="{{ucfirst($employee->name)}}"><hr>Signature Over Printed Name
                      </td>
                      <td><p><strong>President:</strong><br><span>( CEO )</span></p>
                      </td>
                      <td><div class="acc-input"><input type="text" class="sign-over-name" value="Dr. Andreas Klippe"><hr>Signature Over Printed Name
                      </td>
                    </tr>
                    <tr>
                      <td>
                      </td>
                      <td><div class="acc-input"><input type="date" class="sign-over-name"><hr>Date Signed</td>
                      <td>
                      </td>
                      <td><div class="acc-input"><input type="date" class="sign-over-name"><hr>Date Signed</td>
                      <td>
                      </td>
                      <td><div class="acc-input"><input type="date" class="sign-over-name"><hr>Date Signed</td>
                    </tr>
                  </tbody>
                </table>
                </div>
            </div>
            
            
        </div>
    </div>
  </div>

  <div role="tabpanel" class="tab-pane fade" id="buzz">
  asdasd
  </div>
  <div role="tabpanel" class="tab-pane fade" id="references">ccc</div>
</div>
</div>

<!-- 
<div class="grid-container">
        <div class="grid-content column-2">
            <div>
                <h3>ID: {{$employee->id}}</h3>
                <h3>Name: {{$employee->name}}</h3><br>
                <h3>Email: {{$employee->email}}</h3><br>
                <h3>Bday: {{$employee->bday}}</h3><br>
                <h3>Personal Number: {{$employee->personal_no}}</h3><br>
                <h3>Company Number: {{$employee->company_no}}</h3><br>
                <h3>City: {{$employee->city}}</h3><br>
                <h3>Region: {{$employee->region}}</h3><br>
            </div>
        </div>
        <div class="grid-content column-1">
            <div>
                <div>
                <h4>Created_at: {{date('M j, Y h:ia', strtotime($employee->created_at))}}</h4>
                <h4>Updated_at: {{date('M j, Y h:ia', strtotime($employee->updated_at))}}</h4>
                </div>
            <a href="/employee/{{$employee->id}}/edit" class="btn btn-success">Edit</a>

            {!!Form::open(['action' => ['EmployeeController@destroy', $employee->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
        </div>
    </div> -->
@endsection