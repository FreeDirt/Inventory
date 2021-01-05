@extends('layouts.app')

@section('content')
<a href="/stock" class="btn btn-info">Go Back</a><br><br>
@if(count($allItems) > 0)
<div class="body-theme">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Device</th>
            <th scope="col">Category</th>
            <th scope="col">Brand</th>
            <th scope="col">Serial</th>
            <th scope="col">User</th>
            <th scope="col">Description</th>
            <th scope="col">Model Year</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        
        @foreach ($allItems as $cat)
        @if(!empty($cat->serial))
            <tbody>
                
                <tr>
                <td>{{ $cat->device}}</td>
                <td>{{ $cat->category }}</td>
                <td>{{  $cat->brand }}</td>
                <td>{{ $cat->serial }}</td>
                <td><a href="/employee/{{$cat->empId}}">{{ $cat->user }}</a></td>
                <td>{{ $cat->description }}</td>
                <td>{{ $cat->model_year }}</td>
                <td>₱{{ number_format($cat->cost, 2, '.', ',') }}</td>
                <td><a href="/stock/{{$cat->stockId}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/stock/{{$cat->stockId}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
            @endif
        @endforeach
        </table>
    </div>

    @endif
@endsection