@extends('layouts.app')

@section('content')
<a href="/inventory" class="btn btn-info">Go Back</a><br><br>

<div>

    <div class="grid-container">
        <div class="grid-content column-2">
            <div>
                <h3>Item Description: {{$inventory->description}}</h3><br>
                <h3>Category: {{$inventory->category['name']}}</h3><br>
                <h3>Brand: {{$inventory->brand['name']}}</h3><br>
                <h3>Model No.: {{$inventory->model_number}}</h3><br>
                <h3>Serial No.: {{$inventory->serial_number}}</h3><br>
                <h3>Year Purchased: {{$inventory->year_purchased}}</h3><br>
            </div>
        </div>
        <div class="grid-content column-1">
            <div>
                <div>
                <h4>Created_at: {{date('M j, Y h:ia', strtotime($inventory->created_at))}}</h4>
                <h4>Updated_at: {{date('M j, Y h:ia', strtotime($inventory->updated_at))}}</h4>
                </div>
            <a href="/inventory/{{$inventory->id}}/edit" class="btn btn-success">Edit</a>

            {!!Form::open(['action' => ['InventoryController@destroy', $inventory->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
        </div>
    </div>
    

   
</div>
@endsection