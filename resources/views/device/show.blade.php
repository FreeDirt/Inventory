@extends('layouts.app')

@section('content')
<a href="/device" class="btn btn-info">Go Back</a><br><br>

<div>

    <div class="grid-container">
        <div class="grid-content column-2">
            <div>
                <h3>Device Code: {{$device->deviceCode}}</h3><br>
                <h3>Device Name: {{$device->name}}</h3><br>
                <h3>Brand: {{$device->brand['name']}}</h3><br>
                <h3>Category: {{$device->category['name']}}</h3><br>
                <h3>Model No.: {{$device->model_no}}</h3><br>
                <h3>Model Year: {{$device->model_year}}</h3><br>
                <h3>Cost: {{$device->cost}}</h3><br>
            </div>
        </div>
        <div class="grid-content column-1">
            <div>
                <div>
                <h4>Created_at: {{date('M j, Y h:ia', strtotime($device->created_at))}}</h4>
                <h4>Updated_at: {{date('M j, Y h:ia', strtotime($device->updated_at))}}</h4>
                </div>
            <a href="/device/{{$device->id}}/edit" class="btn btn-success">Edit</a>

            {!!Form::open(['action' => ['DeviceController@destroy', $device->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
        </div>
    </div>
    

   
</div>
@endsection