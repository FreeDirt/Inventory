@extends('layouts.app')

@section('content')

<div class="body-theme">
    <div class="container">
        <div class="table-title">
            <h1>Add Stocks</h1>
        </div>

        {!! Form::open(['action' => 'StockController@store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-sm">
                <select id="mounth" class="form-control" name="device_id" id="">
                @foreach ($devices as $key => $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="col-sm">
                {{ Form::text('serial', '', ['class' => 'form-control', 'placeholder' => 'Enter serial']) }}
            </div>
            <div class="col-sm">
                {{ Form::text('item_code', '', ['class' => 'form-control', 'placeholder' => 'Enter Item Code']) }}
            </div>
            <div class="col-sm">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
           
        {!! Form::close() !!}
        
    </div>
</div><br>


<!-- <a href="/stock/create" class="btn btn-info float-right">Create New</a><br><br> -->
@if(count($stocks) > 0)
    <div class="body-theme">
    <h1>stock List</h1>
    <div class="search-field">
        <div class="search-by-categories">
            <div>
                <form>
                    <select id="pagination">
                        <option value="5" @if($items == 5) selected @endif >5</option>
                        <option value="10" @if($items == 10) selected @endif >10</option>
                        <option value="25" @if($items == 25) selected @endif >25</option>
                    </select>
                </form>
            </div>
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
            <th scope="col">ID</th>
            <th scope="col">Device</th>
            <th scope="col">brand</th>
            <th scope="col">Serial</th>
            <th scope="col">Item Code</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($stocks as $stock)
            <tbody>
                <tr>
                <!-- <td>{{$stock->id}}</td> -->
                <td>{{$stock->id}}</td>
                <td>{{$stock->device['name']}}</td>
                <td>{{$stock->device->brand['name']}}</td>
                <td>{{$stock->serial}}</td>
                <td>{{$stock->item_code}}</td>
                <td><a href="/stock/{{$stock->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/stock/{{$stock->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['StockController@destroy', $stock->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$stocks->links()}}
        </table>

        <div>
        Showing {{ $stocks->firstItem() }} to {{ $stocks->lastItem() }}
of total {{$stocks->total()}} entries
        </div>
    </div>
    
    @else
        <p>No stock List is listed!</p>
    @endif

@endsection