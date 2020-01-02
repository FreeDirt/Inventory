@extends('layouts.app')

@section('content')
<h1>company List</h1>
<a href="/company/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($companies) > 0)
    <div class="body-theme">
    <div class="search-field">
        <div class="search-by-categories">
            <div><p>Select by companies: drop down     |    show: 10</p></div>
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
            
            {!! Form::open(['action' => 'CompanyController@store', 'method' => 'POST']) !!}
            <div class="input-group">
                    {{ Form::label('name', ' ') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter company name']) }}    
                    {{ Form::submit('Add company', ['class' => 'btn btn-primary']) }}
                    </div>    
            {!! Form::close() !!}
            
        </div>
    </div><br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">ID</th>
            <th scope="col">company Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($companies as $company)
            <tbody>
                <tr>
                <!-- <td>{{$company->id}}</td> -->
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>
                <a href="/company/{{$company->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/company/{{$company->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['CompanyController@destroy', $company->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$companies->links()}}
        </table>
        </div>
    
    @else
        <p>No company List is listed!</p>
    @endif

@endsection