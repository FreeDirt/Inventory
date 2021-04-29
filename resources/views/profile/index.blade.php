@extends('layouts.app')

@section('content')


<div class="body-theme">
    <div class="isicon"><i class="fas fa-user fa-3x"></i></div>
</div>


<div class="container">
<h1>{{$current_user->name}} Profile</h1>
</div> <br>

@if(count($inventories) > 0)
<div class="container body-theme">
    <h2>{{$current_user->name}} Post</h2>
<table class="table">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">Item Description</th>
            <th scope="col">Brand</th>
            <th scope="col">Category</th>
            <th scope="col">Model Number</th>
            <th scope="col">Serial Number</th>
            <th scope="col">User</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        
            <tbody>
            @foreach($inventories as $inventory)
                <tr>
                <!-- <td>{{$inventory->id}}</td> -->
                <td>{{$inventory->description}}</td>
                <td>{{$inventory->brand['name']}}</td>
                <td>{{$inventory->category['name']}}</td>
                <td>{{$inventory->model_number}}</td>
                <td>{{$inventory->serial_number}}</td>
                <td>{{$inventory->user}}</td>
                <td>
                <div class="grid repeat3"><a href="/inventory/{{$inventory->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/inventory/{{$inventory->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['InventoryController@destroy', $inventory->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}</div>
                </td>
                </tr>
                @endforeach
            </tbody>
        
        </table>
</div>

@endif
@endsection