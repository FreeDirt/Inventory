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
