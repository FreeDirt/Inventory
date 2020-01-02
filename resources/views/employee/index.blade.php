@extends('layouts.app')

@section('content')
<h1>Employee List</h1>
<a href="/employee/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($employees) > 0)
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
            </form>
        </div>
    </div><br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Personal Number</th>
            <th scope="col">Company</th>
            <th scope="col">Company Number</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($employees as $employee)
            <tbody class="emp-tbl-lst">
                <tr>
                <td><img src="/storage/cover_images/{{$employee->cover_image}}" alt="prifile picture"></td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->personal_no}}</td>
                <td>{{$employee->company['name']}}</td>
                <td>{{$employee->company_no}}</td>
                <td>
                <a href="/employee/{{$employee->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/employee/{{$employee->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['EmployeeController@destroy', $employee->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$employees->links()}}
        </table>
        </div>
    
    @else
        <p>No employee List is listed!</p>
    @endif

@endsection