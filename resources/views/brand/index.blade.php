@extends('layouts.app')

@section('content')
<h1>Brand List</h1>
<a href="/brand/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($brands) > 0)
    <div class="body-theme">
    <div class="search-field">
        <div class="search-by-categories">
            <div><p>Select by brands: drop down     |    show: 10</p></div>
        </div>
        <div class="search-btn-form">
            <form action="/search" method="get">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form><br>
            
            {!! Form::open(['action' => 'BrandController@store', 'method' => 'POST']) !!}
            <div class="input-group">
                    {{ Form::label('name', ' ') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Brand name']) }}    
                    {{ Form::submit('Add Brand', ['class' => 'btn btn-primary']) }}
                    </div>    
            {!! Form::close() !!}
            
        </div>
    </div><br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">ID</th>
            <th scope="col">brand Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($brands as $brand)
            <tbody>
                <tr>
                <!-- <td>{{$brand->id}}</td> -->
                <td>{{$brand->id}}</td>
                <td>{{$brand->name}}</td>
                <td>
                <a href="/brand/{{$brand->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/brand/{{$brand->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['BrandController@destroy', $brand->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$brands->links()}}
        </table>
        </div>
    
    @else
        <p>No brand List is listed!</p>
    @endif

@endsection