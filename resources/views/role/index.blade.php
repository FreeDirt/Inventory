@extends('layouts.app')

@section('content')
<h1>Category List</h1>
<a href="/role/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($roles) > 0)
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
            
            {!! Form::open(['action' => 'RoleController@store', 'method' => 'POST']) !!}
            <div class="input-group">
                    {{ Form::label('name', ' ') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Role name']) }}    
                    {{ Form::submit('Add Role', ['class' => 'btn btn-primary']) }}
                    </div>    
            {!! Form::close() !!}
            
        </div>
    </div><br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">ID</th>
            <th scope="col">Role Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($roles as $role)
            <tbody>
                <tr>
                <!-- <td>{{$role->id}}</td> -->
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>
                <a href="/role/{{$role->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/role/{{$role->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['RoleController@destroy', $role->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$roles->links()}}
        </table>
        </div>
    
    @else
        <p>No Role List is listed!</p>
    @endif

@endsection