@extends('layouts.app')

@section('content')
<h1>Inventory List</h1>
<a href="/inventory/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($inventories) > 0)
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
            <th scope="col">Item Description</th>
            <th scope="col">Category</th>
            <th scope="col">Brand</th>
            <th scope="col">Model Number</th>
            <th scope="col">Serial Number</th>
            <th scope="col">User</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($inventories as $inventory)
            <tbody>
                <tr>
                <!-- <td>{{$inventory->id}}</td> -->
                <td>{{$inventory->description}}</td>
                <td>{{$inventory->category['name']}}</td>
                <td>{{$inventory->brand['name']}}</td>
                <td>{{$inventory->model_number}}</td>
                <td>{{$inventory->serial_number}}</td>
                <td>{{$inventory->user}}</td>
                <td>
                <a href="/inventory/{{$inventory->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/inventory/{{$inventory->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['InventoryController@destroy', $inventory->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$inventories->links()}}
        </table>
        </div>
    
    @else
        <p>No Inventory List is listed!</p>
    @endif

@endsection