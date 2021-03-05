@extends('layouts.app')

@section('content')
<input type="checkbox" name="add-new" class="open-form" id="add-new">
    <div class="add-stock">
        <label for="add-new"><span class="add-new"></span></label>
    </div>

    

    <div class="body-theme">
    <table class="table" id="tabledata">
        <thead class="thead-dark">
            <tr>
            <th scope="col">DEVICE</th>
            <th scope="col">TOTAL</th>
            <th scope="col">USED</th>
            <th scope="col">STOCKS</th>
            <th scope="col">ACTION</th>
            </tr>
        </thead>
            <tbody>
            @foreach ($devCounts as $devCount)
                @if($devCount->seCount)
                <tr>
                <td><a href="/stock/items/{{$devCount->items}}">{{ ucfirst($devCount->catNames) }}</a></td>
                <td>{{  $devCount->seCount }}</td>
                <td>{{ $devCount->empTotal }}</td>
                <td>{{ $devCount->seCount - $devCount->empTotal }}</td>
                <td><a href="/stock/items/{{$devCount->items}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="all-stock-items-container"><a class="all-stock-items" href="/stock/allitems/">View All</a></div>


    <div class="body-theme add-item-form">
      <div class="form-item">
        <div class="table-title">
            <h1>Add Stocks</h1>
        </div>

        {!! Form::open(['action' => 'StockController@store', 'method' => 'POST']) !!}
        <div class="stock-form-container">
            <div class="stock-form-content">
                <select name="devcat" class="form-control">
                    <option value="">--- Select Category ---</option>
                    @foreach ($devices->unique('category_id') as $device)
                        <option value="{{$device->category['id']}}">{{ucfirst($device->category['name'])}}</option>
                    @endforeach
                </select>
            </div>
            <div class="stock-form-content">
                <select id="device_id" class="form-control" name="device_id">
                        <option value="">--- Select Device ---</option>
                </select>
            </div>
            <div class="stock-form-content">
                <select id="employee_id" class="form-control" name="employee_id">
                    <option value="">-- Select Employee --</option>
                    @foreach ($employees as $key => $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="stock-form-content">
                {{ Form::text('serial', '', ['class' => 'form-control', 'placeholder' => 'Enter serial']) }}
            </div>
            <div class="stock-form-content">
                {{ Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Enter description']) }}
            </div>
            <div class="stock-form-content">
            @if(count($laststocks) > 0)
                @foreach ($laststocks as $laststock)
                    {{ Form::text('item_code', '', ['class' => 'form-control', 'placeholder' => $laststock->device['name'] . ' ' . $laststock['item_code']]) }}
                @endforeach
                
             @else
                {{ Form::text('item_code', '', ['class' => 'form-control', 'placeholder' => 'Enter Item Code']) }}
            @endif
                
            </div>
            <div class="stock-form-content">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
           
        {!! Form::close() !!}
        
    </div>
</div><br>

@if(count($stocks) > 0)
    <div class="body-theme">
    <!-- <div class="search-field">
        <div class="search-by-categories">
            
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

        
    </div> -->
    <!-- <div class="search-btn-form">
        @csrf
        <input type="text" id="livesearch" class="form-control" placeholder="Advance Search">
    </div><br> -->
        
    <table class="table display" id="table_id">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Device</th>
            <th scope="col">Brand</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Serial</th>
            <th scope="col">Item Code</th>
            <th scope="col">User Employee</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        
            <tbody id="slsearch">
            @foreach($stocks as $stock)
                
                <tr>
                <td>{{$stock->device['name']}}</td>
                <td>{{$stock->device->brand['name']}}</td>
                <td>{{$stock->device->category['name']}}</td>
                <td>{{$stock->description ? $stock->description : 'none' }}</td>
                <td>{{$stock->serial}}</td>
                <td>{{$stock->item_code}}</td>
                <td>@if(!empty($stock->employee['name']))
                    <a href="/employee/{{$stock->employee['id']}}">{{$stock->employee['name']}}</a>
                    @else 
                        <div>-</div>
                    @endif
                </td>
                <!-- <td><a href="/employee/{{$stock->employee['id']}}">{{$stock->employee['name']}}</a></td> -->
                <td>
                    <div class="flex gap-03em">
                        <a href="/stock/{{$stock->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="/stock/{{$stock->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        {!!Form::open(['action' => ['StockController@destroy', $stock->id], 'method' => 'POST', 'class' => 'show_confirm'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                        {!!Form::close()!!}
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
        <div>
        </div>

    </div>


    @else
        <p>No stock List is listed!</p>
    @endif

@endsection
