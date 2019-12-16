<div class="body-theme">
    <div class="container">
        <div class="table-title">
            <h1>Add Stocks</h1>
        </div>

        {!! Form::open(['action' => 'StockController@store', 'method' => 'POST']) !!}
        <div class="row">
        <div class="col-sm">
                <select name="devcat" class="form-control">
                    <option value="">--- Select Category ---</option>
                    @foreach ($devices as $device)
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
                {{ Form::text('serial', '', ['class' => 'form-control', 'placeholder' => 'Enter serial']) }}
            </div>
            <div class="col-sm">
                @foreach ($laststocks as $laststock)
                {{ Form::text('item_code', '', ['class' => 'form-control', 'placeholder' => $laststock->device['name'] . ' ' . $laststock['item_code']]) }}
                @endforeach
            </div>
            <div class="col-sm">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
           
        {!! Form::close() !!}
        
    </div>
</div><br>