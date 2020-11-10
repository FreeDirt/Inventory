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
    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Settings</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#references" role="tab" data-toggle="tab">references</a>
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
                <div class="acc-dt"><div class="acc-txt">Name:</div><div class="acc-input"><input type="text" placeholder="{{$employee->name}}"></div></div>
                <div class="acc-dt"><div class="acc-txt">Employee Number:</div><div class="acc-input"><input type="text" placeholder="{{$department}}"></div></div>
                <div class="acc-dt"><div class="acc-txt">Department:</div><div class="acc-input"><input type="text"></div></div>
                <div class="acc-dt"><div class="acc-txt">Position:</div><div class="acc-input"><input type="text"></div></div>
            </div>

            <!-- //ACCOUNTABILITY FORM (I.T) -->
            
            <div class="the-form">
                <h6>ITEM ISSUED</h6>

                <div class="the-form-grid">
                <table class="table table-bordered w-border">
                  <!-- COMPUTER -->
                  <thead id="printed-article">
                    <tr>
                      <th scope="col"><p>Computer</p></th>
                      <th scope="col"><p>Unit Type</p></th>
                      <th scope="col"><p>Serial Number</p></th>
                      <th scope="col"><p>Date</p></th>
                      <th scope="col"><p>Received by</p></th>
                    </tr>
                  </thead>
                  @foreach($employeeDevices as $empDev => $key)
                    @if ($empDev == 'Laptop')
                  <tbody>
                    <tr>
                    
                      <td>
                        <div class="custom-control custom-checkbox">
                        <input id="option" type="checkbox" class="custom-control-input" >
                        <label class="checkbox custom-control-label" for="option">&nbsp;&nbsp;<span>MAC PC</span></label>
                        </div>
                      </td>
                      <td><input type="text" placeholder="N/A"></td>
                      <td><input type="text"  placeholder="{{ !$key ? 'N/A' : $key }}" ></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                        <input id="option2" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option2">&nbsp;&nbsp;Windows PC</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    
                  </tbody>
                  @endif
                    @endforeach
                  <!-- MONITOR -->
                  <thead id="printed-article">
                    <tr>
                      <th scope="col"><p>Monitor</p></th>
                      <th scope="col"><p>Unit Type</p></th>
                      <th scope="col"><p>Serial Number</p></th>
                      <th scope="col"><p>Date</p></th>
                      <th scope="col"><p>Received by</p></th>
                    </tr>
                  </thead>
                  @foreach($employeeDevices as $empDev => $key)
                    @if ($empDev == 'Monitor')
                  <tbody>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option3" type="checkbox" class="custom-control-input">
                              <label class="checkbox custom-control-label" for="option3">&nbsp;&nbsp;Monitor 1</label>
                        </div>
                      </td>
                      <td><input type="text" placeholder="N/A"></td>
                      <td><input type="text"  placeholder="{{ !$key ? 'N/A' : $key }}"></td>                
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option4" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option4">&nbsp;&nbsp;Monitor 2</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="{{ !$key ? 'N/A' : $key }}"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                  </tbody>
                  @endif
                    @endforeach
                   <!-- Peripherals -->
                   <thead id="printed-article">
                    <tr>
                      <th scope="col"><p>Peripherals</p></th>
                      <th scope="col"><p>Unit Type</p></th>
                      <th scope="col"><p>Serial Number</p></th>
                      <th scope="col"><p>Date</p></th>
                      <th scope="col"><p>Received by</p></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option5" type="checkbox" class="custom-control-input">
                              <label class="checkbox custom-control-label" for="option5">&nbsp;&nbsp;Keyboard</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option6" type="checkbox" class="custom-control-input" {{ $employeeDevices['Mouse'] ? 'checked' : ' ' }}>
                          <label class="checkbox custom-control-label" for="option6">&nbsp;&nbsp;Mouse</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td><td>
                        <input type="text"  placeholder="{{$employeeDevices['Mouse']}}" {{ $key? 'Disabled' : ' ' }}></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option7" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option7">&nbsp;&nbsp;Headset</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option8" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option8">&nbsp;&nbsp;Webcam</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option9" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option9">&nbsp;&nbsp;External Hard Drive</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option10" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option10">&nbsp;&nbsp;USB Flash Disk</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option11" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option11">&nbsp;&nbsp;Laptop Bag</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option12" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option12">&nbsp;&nbsp;Power Bank</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option13" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option13">&nbsp;&nbsp;Video Cable</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option14" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option14">&nbsp;&nbsp;Video Adapter 1</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option15" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option15">&nbsp;&nbsp;Video Adapter 2</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option16" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option16">&nbsp;&nbsp;USB Adapter 1</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option17" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option17">&nbsp;&nbsp;USB Adapter 2</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option18" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option18">&nbsp;&nbsp;Other</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                  </tbody>
                   <!-- Mobile Devices -->
                   <thead id="printed-article">
                    <tr>
                      <th scope="col"><p>Mobile Devices</p></th>
                      <th scope="col"><p>Unit Type</p></th>
                      <th scope="col"><p>Serial Number</p></th>
                      <th scope="col"><p>Date</p></th>
                      <th scope="col"><p>Received by</p></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option19" type="checkbox" class="custom-control-input">
                              <label class="checkbox custom-control-label" for="option19">&nbsp;&nbsp;device 1</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option20" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option20">&nbsp;&nbsp;device 2</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option21" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option21">&nbsp;&nbsp;device 3</label>
                        </div>
                      </td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A"></td>
                      <td><input type="text"  placeholder="N/A" onclick="(this.type='date')"></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                </div>
            </div>

            <!-- // ITEM ISSUED -->

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
                            <input id="option22" type="checkbox" class="custom-control-input">
                              <label class="checkbox custom-control-label" for="option22">&nbsp;&nbsp;@dr-klippe.com</label>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option23" type="checkbox" class="custom-control-input">
                              <label class="checkbox custom-control-label" for="option23">&nbsp;&nbsp;@dr-klippe.de</label>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option24" type="checkbox" class="custom-control-input">
                              <label class="checkbox custom-control-label" for="option24">&nbsp;&nbsp;@acc.dr-klippe.de</label>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option25" type="checkbox" class="custom-control-input">
                              <label class="checkbox custom-control-label" for="option25">&nbsp;&nbsp;@floodcontrol.asia</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input id="option26" type="checkbox" class="custom-control-input">
                          <label class="checkbox custom-control-label" for="option26">&nbsp;&nbsp;@klipp.tv</label>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option27" type="checkbox" class="custom-control-input">
                              <label class="checkbox custom-control-label" for="option27">&nbsp;&nbsp;google@acc.dr-klippe.de</label>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input id="option28" type="checkbox" class="custom-control-input">
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