@extends('layouts.app')

@section('content')
<input type="checkbox" name="add-new" class="open-form" id="add-new">

<div class="add-stock">
    <label for="add-new"><span class="add-new"></span></label>
</div>

<div class="body-theme add-item-form">
      <div class="form-item">
        {!! Form::open(['action' => 'EmployeeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <h1>Add Employee</h1>
            <div class="auto-fit">
                <div class="form-group">
                    <!-- {{ Form::label('name', 'Name') }} -->
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
                </div>
                <div class="form-group">
                    <!-- {{ Form::label('email', 'Email') }} -->
                    {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email', 'required']) }}
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
                    {{ Form::text('employee_no', '', ['class' => 'form-control', 'placeholder' => 'Employee No', 'required']) }}
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
                {{ Form::file('cover_image')}}
                </div>

                <div class="form-group">
                    <div class="media-file-upload">
                        <a class="btn btn-primary" href="#open-modal" id="mdlopen">Select Image</a> <span>{{ Form::text('cover_image', '', ['class' => 'selectedImage', 'id' => 'img-id', 'readonly']) }}</span>
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
            <div class="form-group text-right">
                    <label for="add-new"><div class="cancel">Cancel</div></label>
                    {{ Form::submit('Add', ['class' => 'add']) }}
            </div>
        {!! Form::close() !!}
    </div>
</div><br>

<button id="modalimport" class="btn btn-info float-right">Import / Export</button>

<div id="importModal" class="modalImport">
    <div class="modal-content">
        <div class="container">
            <span id="closeBtnimport" class="closeModalBtn">&times;</span>
        </div>
        <div class="container">
                <div class="clearfix">
                    <div class="float-left">
                        <form class="form-inline" action="{{url('employees/import')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imported_file"/>
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                            <button style="margin-left: 10px;" class="btn btn-info" type="submit">Import</button>
                        </form>
                    </div>
                    <div class="float-right">
                        <form action="{{url('employees/export')}}" enctype="multipart/form-data">
                            <button class="btn btn-dark" type="submit">Export</button>
                        </form>
                    </div>
                </div>
                <br/>

                @if(count($importemployees) > 0)
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                        </tr>
                        </thead>
                        @foreach($importemployees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{ucfirst($employee->name)}}</td>
                                <td>{{$employee->email}}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif

            </div>

    </div>
</div><br><br>

@if(count($employees) > 0)
    <!-- <div class="">
    <div class="search-field">
        <div class="search-by-categories">
            <div><p>Select by Categories: drop down     |    show: 10</p></div>
        </div>
        <div class="search-btn-form">
            <form action="/search" method="get">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>
        </div>
    </div><br> -->
    <div class="body-theme">
    <div class="isicon"><i class="fas fa-users fa-3x"></i></div>
        <div class="tog-label">
            <label for="toggle-tblempv">
                <i id="grid-view" class="fas fa-th fa-2x {{Request::has('employee/*') ? 'fa-th-list' : 'fa-th-list'}}"></i>
            </label>
        </div>
        <input type="checkbox" name="mycheckbox" id="toggle-tblempv">
        <table class="table mytable" id="table_id">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Company No.</th>
            <th scope="col">Employment Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        
            <tbody class="tbl-lst">
            @foreach($employees as $employee)
                <tr>
                <td><img src="/storage/cover_images/{{$employee->cover_image}}" alt="prifile picture"></td>
                <td>{{ucfirst($employee->name)}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->company_no}}</td>
                <td>@if($employee->status == 'Employed')
                        <span class="status-green">{{$employee->status}}</span>
                    @elseif($employee->status == 'Resigned')
                        <span class="status-red">{{$employee->status}}</span>
                    @elseif($employee->status == 'Training')
                        <span class="status-orange">{{$employee->status}}</span>
                    @else($employee->status == 'Probationary')
                        <span class="status-blue">{{$employee->status}}</span>
                    @endif
                </td>
                <td>
                <div class="flex gap-03em">
                    <a href="/employee/{{$employee->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="/employee/{{$employee->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    {!!Form::open(['action' => ['EmployeeController@destroy', $employee->id], 'method' => 'POST', 'class' => 'show_confirm'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                    {!!Form::close()!!}
                </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        
        
        </div>
</div>
    
    @else
        <!-- <p>No employee List is listed!</p> -->
    @endif

@endsection