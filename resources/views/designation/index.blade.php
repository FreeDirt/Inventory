@extends('layouts.app')

@section('content')
<h1>designation List</h1>
<a href="/designation/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($designations) > 0)
    <div class="body-theme">
    <div class="isicon"><i class="fas fa-user-tie fa-3x"></i></div>
    <div class="search-field">
        <!--div class="search-by-categories">
            <div><p>Select by designations: drop down     |    show: 10</p></div>
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
            
            {!! Form::open(['action' => 'DesignationController@store', 'method' => 'POST']) !!}
            <div class="input-group">
                    {{ Form::label('name', ' ') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Designation name']) }}

                    {{ Form::label('description', ' ') }}
                    {{ Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
                    {{ Form::submit('Add designation', ['class' => 'btn btn-primary']) }}
                    </div>    
            {!! Form::close() !!}
            
        </div> -->
    </div><br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">ID</th>
            <th scope="col">Designations</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($designations as $designation)
            <tbody>
                <tr>
                <!-- <td>{{$designation->id}}</td> -->
                <td>{{$designation->id}}</td>
                <td><strong>{{$designation->name}}</strong></td>
                <td style="width: 50%;">{{$designation->description}}</td>
                <td>
                <div class="flex gap-03em">
                    <a href="/designation/{{$designation->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="/designation/{{$designation->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    {!!Form::open(['action' => ['DesignationController@destroy', $designation->id], 'method' => 'POST', 'class' => 'show_confirm'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                    {!!Form::close()!!}</div>
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$designations->links()}}
        </table>
        </div>
    
    @else
        <p>No designation List is listed!</p>
    @endif

@endsection