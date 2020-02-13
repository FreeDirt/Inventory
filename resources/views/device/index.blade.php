@extends('layouts.app')

@section('content')

<h1>Device List</h1>
<a href="/device/create" class="btn btn-info float-right">Create New</a><br><br>
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
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">Device Code</th>
            <th scope="col">Device Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Category</th>
            <th scope="col">Model Number</th>
            <th scope="col">Model Year</th>
            <th scope="col">Cost</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($devices as $device)
            <tbody>
                <tr>
                <!-- <td>{{$device->id}}</td> -->
                <td>{{$device->deviceCode}}</td>
                <td>{{$device->name}}</td>
                <td>{{$device->brand['name']}}</td>
                <td>{{$device->category['name']}}</td>
                <td>{{$device->model_no}}</td>
                <td>{{$device->model_year}}</td>
                <td>₱{{ number_format($device->cost, 2, '.', ',') }}</td>
                
                <td>
                <a href="/device/{{$device->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/device/{{$device->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['DeviceController@destroy', $device->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$devices->links()}}
        </table>
        </div>
    
    @else
        <p>No device List is listed!</p>
    @endif


    <div class="grid-container">
        @foreach ($devices->unique('category_id') as $device)
        <div class="body-theme">
                <p>{{  $device->category['name']}}</p>
                <p>Created_at: {{date('M j, Y h:ia', strtotime($device->created_at))}}</p>
                <p>Updated_at: {{date('M j, Y h:ia', strtotime($device->updated_at))}}</p>
        </div>
        @endforeach
    </div><br>


@endsection