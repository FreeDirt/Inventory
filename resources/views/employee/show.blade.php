@extends('layouts.app')

@section('content')
<div class="emp-prof-banner">
    <div><img src="https://png.pngtree.com/thumb_back/fw800/background/20190221/ourmid/pngtree-texture-geometric-black-metal-gradient-image_17809.jpg" alt=""></div>
</div>
<div class="container">
<div class="container body-theme emp-profile">
   <div class="grid onefr2fr1 grid-1em-gap">
        <div class="emp-img">
            <img src="/storage/cover_images/{{$employee->cover_image}}" alt="prifile picture">
        </div>
        <div class="emp-details">
                <p>ID: {{$employee->id}}</p>
                <p>Name: {{$employee->name}}</p>
                <p>Email: {{$employee->email}}</p>
                <p>Bday: {{$employee->bday}}</p>
                <p>Personal Number: {{$employee->personal_no}}</p>
                <p>Company Number: {{$employee->company_no}}</p>
                <p>City: {{$employee->city}}</p>
                <p>Region: {{$employee->region}}</p>
        </div>
        <div classs="emp-actions">
            <div class="container text-center">
                <a href="/employee/{{$employee->id}}/edit" class="btn btn-primary">EDIT PROFILE</a>
            </div>
        </div>
   </div>
</div>
</div>



<!-- Bootstrap CSS -->
<!-- jQuery first, then Bootstrap JS. -->
<!-- Nav tabs -->
<div class="container">
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

<div class="container">
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
                <div class="acc-dt"><div class="acc-txt">Name:</div><div class="acc-input"><input type="text" value="{{$employee->name}}" {{ $employee->name ? 'disabled' : '' }}></div></div>
                <div class="acc-dt"><div class="acc-txt">Employee Number:</div><div class="acc-input"><input type="text" value="{{$employee->employee_no}}" {{ $employee->employee_no ? 'disabled' : '' }}></div></div>
                <div class="acc-dt"><div class="acc-txt">Department:</div><div class="acc-input"><input type="text" value="{{$department}}" {{ $department ? 'disabled' : '' }}></div></div>
                <div class="acc-dt"><div class="acc-txt">Position:</div><div class="acc-input"><input type="text" value="{{$designation}}" {{ $designation ? 'disabled' : '' }}></div></div>
            </div>

            <!-- //ACCOUNTABILITY FORM (I.T) -->
            
            <div class="the-form">
                <h6>ITEM ISSUED</h6>

                <div class="the-form-grid">
                <table class="table table-bordered w-border">
                <?php $prevcat = "" ?>
                  @foreach($employeeDevices as $key => $val)
                    @if ($prevcat != $val->sub_cat) 
                      <thead id="printed-article">
                      <tr>
                        <th scope="col"><p>{{$val->sub_cat}}</p></th>
                        <th scope="col"><p>Unit Type</p></th>
                        <th scope="col"><p>Serial Number</p></th>
                        <th scope="col"><p>Date</p></th>
                        <th scope="col"><p>Received by</p></th>
                      </tr>
                    </thead>
                    <?php $prevcat = $val->sub_cat ?>
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
                      <td><p><strong>Checked & verified by:</strong><br><span>(Systems)</span></p>
                      </td>
                      <td><div class="acc-input"><input type="text" class="sign-over-name"><hr>Signature Over Printed Name
                      </td>
                      <td><p><strong>Employee:</strong><br><span> &nbsp;</span></p>
                      </td>
                      <td><div class="acc-input"><input type="text" class="sign-over-name"><hr>Signature Over Printed Name
                      </td>
                    </tr>
                    <tr>
                      <td>
                      </td>
                      <td><div class="acc-input"><input type="date" class="sign-over-name"><hr>Date Signed
                      </td>
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