@extends('layouts.app')

@section('content')
<h1>Category List</h1>
<a href="/category/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($parent_categories) > 0)
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
            
            {!! Form::open(['action' => 'ParentcatController@store', 'method' => 'POST']) !!}
                    <div class="input-group">
                    <select class="form-control" name="parent_cat" id="">
                        <option value="Monitor">Monitor</option>
                        <option value="Peripherals">Peripherals</option>
                        <option value="Computer">Equip</option>
                        <option value="Mobile devices">Mobile devices</option>
                        <option value="Electronics">Electronics</option>
                    </select>
                    
                    {{ Form::label('name', ' ') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Category name']) }}    
                
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
        @foreach($parent_categories as $category)
            <tbody>
                <tr>
                <!-- <td>{{$category->id}}</td> -->
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                <div class="flex gap-03em">
                    <a href="/category/{{$category->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="/category/{{$category->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    {!!Form::open(['action' => ['ParentcatController@destroy', $category->id], 'method' => 'POST', 'class' => 'show_confirm'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                    {!!Form::close()!!}
                </div>
                </td>
                </tr>
            </tbody>
        @endforeach
        </table>
        </div>
    
    @else
        <p>No Category List is listed!</p>
    @endif

@endsection