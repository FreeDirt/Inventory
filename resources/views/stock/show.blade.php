@extends('layouts.app')

@section('content')
<a href="/stock" class="btn btn-info">Go Back</a><br><br>

<div class="">

    <div class="grid-container">
        <div class="grid-content column-2 body-theme">
            <div>
                <h3>Device Name: {{$stock->device['name']}}</h3><br>
                <h3>Brand: {{$stock->device->brand['name']}}</h3><br>
                <h3>Category: {{$stock->device->category['name']}}</h3><br>
                <h3>Description: {{ $stock->description ? $stock->description : 'none' }}</h3><br>
                <h3>Serial No.: {{$stock->serial}}</h3><br>
                <h3>Item Code: {{$stock->device->deviceCode}}-{{$stock->item_code}}</h3><br>
            </div>
        </div>
        <div class="grid-content column-1 body-theme">
            <div>
                <div>
                <h4>Created_at: {{date('M j, Y h:ia', strtotime($stock->created_at))}}</h4>
                <h4>Updated_at: {{date('M j, Y h:ia', strtotime($stock->updated_at))}}</h4>
                </div>
            <a href="/stock/{{$stock->id}}/edit" class="btn btn-success">Edit</a>

            {!!Form::open(['action' => ['StockController@destroy', $stock->id], 'method' => 'POST', 'class' => 'show_confirm'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
        </div>
    </div>
    

   
</div>
@endsection