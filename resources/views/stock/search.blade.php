@extends('layouts.app')

@section('content')

<div class="body-theme">
    <div class="container">
        <div class="table-title">
            <h1>Add Stocks</h1>
        </div>

        {!! Form::open(['action' => 'StockController@store', 'method' => 'POST']) !!}
        <div class="row grid repeat3">
        <div class="col-sm">
                <select name="devcat" class="form-control">
                    <option value="">--- Select Category ---</option>
                    @foreach ($devices->unique('category_id') as $device)
                        <option value="{{$device->category['id']}}">{{ucfirst($device->category['name'])}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm">
                <select id="device_id" class="form-control" name="device_id">
                        <option value="">--- Select Device ---</option>
                </select>
            </div>
            <div class="col-sm">
                <select id="employee_id" class="form-control" name="employee_id">
                    <option value="">-- Select Employee --</option>
                    @foreach ($employees as $key => $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm">
                {{ Form::text('serial', '', ['class' => 'form-control', 'placeholder' => 'Enter serial']) }}
            </div>
            <div class="col-sm">
                {{ Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Enter description']) }}
            </div>
            <div class="col-sm">
            @if(count($laststocks) > 0)
                @foreach ($laststocks as $laststock)
                    {{ Form::text('item_code', '', ['class' => 'form-control', 'placeholder' => $laststock->device['name'] . ' ' . $laststock['item_code']]) }}
                @endforeach
                
             @else
                {{ Form::text('item_code', '', ['class' => 'form-control', 'placeholder' => 'Enter Item Code']) }}
            @endif
                
            </div>
            <div class="col-sm">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
           
        {!! Form::close() !!}
        
    </div>
</div><br>


@if(count($stocks) > 0)
    <div class="body-theme">
    <h1>stock List</h1>
    <div class="search-field">
        <div class="search-by-categories">
        </div>
        <div class="search-btn-form">
            <form action="/search" method="get">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="{{$search}}">
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
            <th scope="col">ID</th>
            <th scope="col">Device</th>
            <th scope="col">Brand</th>
            <th scope="col">Category</th>
            <th scope="col">Serial</th>
            <th scope="col">Item Code</th>
            <th scope="col">User Employee</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($stocks as $stock)
            <tbody>
                <tr>
                <td>{{$stock->id}}</td>
                <td>{{$stock->device['name']}}</td>
                <td>{{$stock->device->brand['name']}}</td>
                <td>{{$stock->device->category['name']}}</td>
                <td>{{$stock->serial}}</td>
                <td>{{$stock->device->deviceCode}}-{{$stock->item_code}}</td>
                <td>{{$stock->employee['name']}}</td>
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
        <div>
        </div>

    </div><br>

    @else
        <h1>No {{$search}} stock List is listed!</h1>
        <div class="search-field">
            <div class="search-by-categories">
            </div>
            <div class="search-btn-form">
                <form action="/search" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="{{$search}}">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div><br>
    @endif

@endsection