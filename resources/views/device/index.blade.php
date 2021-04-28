@extends('layouts.app')

@section('content')
<input type="checkbox" name="add-new" class="open-form" id="add-new">
<div class="add-stock">
    <label for="add-new"><span class="add-new"></span></label>
</div>

<div class="body-theme add-item-form">

{!! Form::open(['action' => 'DeviceController@store', 'class' => 'device-form-container', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="">
    <h1>Add Devices</h1>
</div>

<div class="auto-fit">
    <div class="device-form-content">
        <!-- {{ Form::label('deviceCode', 'Device Code') }} -->
        <select class="form-control" name="deviceCode" id="" required>
        @foreach ($companies as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
        </select>
    </div>

    <div class="device-form-content">
        <select name="pcats" class="form-control" required>
            <option value="">--- Category ---</option>
            @foreach ($parentcats as $parentcat)
                @if(!empty($parentcat->name))
                    <option value="{{$parentcat->id}}">{{ucfirst($parentcat->name)}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="device-form-content">
        <select id="category_id" class="form-control" name="category_id" required>
                <option value="">--- Sub Category ---</option>
        </select>
    </div>

    <div class="device-form-content">
        <!-- {{ Form::label('name', 'Device Name') }} -->
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Device Name', 'required']) }}
    </div>
    <div class="device-form-content">
        <!-- {{ Form::label('model_no', 'Model no.') }} -->
        {{ Form::text('model_no', '', ['class' => 'form-control', 'placeholder' => 'Enter Model No.', ' required']) }}
    </div>
    
    <div class="device-form-content">
        <!-- {{ Form::label('brand_id', 'Brand') }} -->
        <select class="form-control" name="brand_id" id="" required>
        @foreach ($brands as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    
    <div class="device-form-content">
        <!-- {{ Form::label('model_year', 'Model Year') }} -->
        {{ Form::text('model_year', '', ['class' => 'form-control', 'placeholder' => 'Enter Model Year', 'required']) }}
    </div>
    <div class="device-form-content">
        <!-- {{ Form::label('cost', 'Cost') }} -->
        {{ Form::text('cost', '', ['class' => 'form-control', 'placeholder' => 'Cost', 'required']) }}
    </div>
    <div class="device-form-content">
        <!-- {{ Form::label('country', 'Country Purchased') }} -->
        <select class="form-control" name="country_id" required>
        <option value="">--- Select Country ---</option>
        @foreach ($countries as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="device-form-content">
        {{ form::file('device_img')}}
    </div>

    <div class="device-form-content">
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

    <div class="device-form-content text-right">
        <label for="add-new"><div class="cancel">Cancel</div></label>
        {{ Form::submit('Add', ['class' => 'add']) }}
    </div>
{!! Form::close() !!}
</div>

<button id="modalimport" class="btn btn-info float-right">Import / Export</button>

<div id="importModal" class="modalImport">
    <div class="modal-content">
        <div class="container">
            <span id="closeBtn" class="closeModalBtn">&times;</span>
        </div>
        <div class="container">
                <div class="clearfix">
                    <div class="float-left">
                        <form class="form-inline" action="{{url('devices/import')}}" method="post" enctype="multipart/form-data">
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
                        <form action="{{url('devices/export')}}" enctype="multipart/form-data">
                            <button class="btn btn-dark" type="submit">Export</button>
                        </form>
                    </div>
                </div>
                <br/>

                @if(count($importdevices))
                    <table class="table table-bordered display" id="myTable">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Device Code</td>
                            <td>Brand</td>
                            <td>Category</td>
                            <td>Country</td>
                            <td>Model No.</td>
                            <td>Model Year</td>
                            <td>Cost</td>
                            <td>Created</td>
                            <td>Updated</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($importdevices as $device)
                            <tr>
                                <td>{{$device->id }}</td>
                                <td>{{$device->name}}</td>
                                <td>{{$device->deviceCode}}</td>
                                <td>{{$device->brand_id}}</td>
                                <td>{{$device->category_id}}</td>
                                <td>{{$device->country_id}}</td>
                                <td>{{$device->model_no}}</td>
                                <td>{{$device->model_year}}</td>
                                <td>{{$device->cost}}</td>
                                <td>{{$device->created_at}}</td>
                                <td>{{$device->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif

            </div>

    </div>
</div><br><br>

@if(count($devices) > 0)
    <div class="body-theme">
    <div class="isicon"><i class="fas fa-laptop-medical fa-3x"></i></div>
    <!-- <div class="search-field">
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
        <table class="table display" id="table_id">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Photo</th>
            <th scope="col">Device Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Category</th>
            <th scope="col">Model Number</th>
            <th scope="col">Model Year</th>
            <th scope="col">Cost</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
            <tbody class="dev-tbl-lst">
            @foreach($devices as $device)
                <tr>
                <td><img src="/storage/cover_images/{{$device->device_img}}" alt="profile picture"></td>
                <td>{{$device->name}}</td>
                <td>{{$device->brand['name']}}</td>
                <td>{{$device->category['name']}}</td>
                <td>{{$device->model_no}}</td>
                <td>{{$device->model_year}}</td>
                <td>₱{{ number_format($device->cost, 2, '.', ',') }}</td>
                
                <td>
                <div class="flex gap-03em">
                    <a href="/device/{{$device->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="/device/{{$device->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    {!!Form::open(['action' => ['DeviceController@destroy', $device->id], 'method' => 'POST', 'class' => 'show_confirm'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                    {!!Form::close()!!}</div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    
    @else
        <p>No device List is listed!</p>
    @endif


@endsection