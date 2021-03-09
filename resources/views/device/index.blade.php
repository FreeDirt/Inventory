@extends('layouts.app')

@section('content')

<h1>Device List</h1>
<a href="/device/create" class="btn btn-info float-right">Create New</a><br><br>
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
    </div><br>
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