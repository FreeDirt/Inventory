@extends('layouts.app')

@section('content')
<h1>Category List</h1>
<a href="/category/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($categories) > 0)
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
            </form><br>
            
            {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST']) !!}
            <div class="input-group">
                    {{ Form::label('name', ' ') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Category name']) }}    
                    
                    <select class="form-control" name="sub_cat" id="">
                        <option value="Monitor">Monitor</option>
                        <option value="Peripherals">Peripherals</option>
                        <option value="Computer">Equip</option>
                        <option value="Mobile devices">Mobile devices</option>
                        <option value="Electronics">Electronics</option>
                    </select>
                    {{ Form::submit('Add Category', ['class' => 'btn btn-primary']) }}
                    </div>
            {!! Form::close() !!}
            
        </div>
    </div><br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($categories as $category)
            <tbody>
                <tr>
                <!-- <td>{{$category->id}}</td> -->
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                <a href="/category/{{$category->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/category/{{$category->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$categories->links()}}
        </table>
        </div>
    
    @else
        <p>No Category List is listed!</p>
    @endif

@endsection