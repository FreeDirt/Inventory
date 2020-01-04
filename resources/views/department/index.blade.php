@extends('layouts.app')

@section('content')
<h1>Department List</h1>
<a href="/department/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($departments) > 0)
    <div class="body-theme">
    <div class="search-field">
        <div class="search-by-categories">
            <div><p>Select by departments: drop down     |    show: 10</p></div>
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
            
            {!! Form::open(['action' => 'DepartmentController@store', 'method' => 'POST']) !!}
            <div class="input-group">
                    {{ Form::label('name', ' ') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter department name']) }}

                    {{ Form::label('description', ' ') }}
                    {{ Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
                    {{ Form::submit('Add department', ['class' => 'btn btn-primary']) }}
                    </div>    
            {!! Form::close() !!}
            
        </div>
    </div><br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">ID</th>
            <th scope="col">Departments</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($departments as $department)
            <tbody>
                <tr>
                <!-- <td>{{$department->id}}</td> -->
                <td>{{$department->id}}</td>
                <td>{{$department->name}}</td>
                <td style="width: 50%;">{{$department->description}}</td>
                <td>
                <a href="/department/{{$department->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/department/{{$department->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['DepartmentController@destroy', $department->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$departments->links()}}
        </table>
        </div>
    
    @else
        <p>No department List is listed!</p>
    @endif

@endsection