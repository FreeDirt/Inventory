@extends('layouts.app')

@section('content')
<h1>Employee Status List</h1>
<a href="/empstatus/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($empstatuses) > 0)
    <div class="body-theme">
    <div class="search-field">
        <div class="search-by-categories">
            <div><p>Select by empstatuses: drop down     |    show: 10</p></div>
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
            
            {!! Form::open(['action' => 'EmpstatusController@store', 'method' => 'POST']) !!}
                <div class="input-group">
                    {{ Form::label('status', ' ') }}
                    {{ Form::text('status', '', ['class' => 'form-control', 'placeholder' => 'Enter Status name']) }}
                    {{ Form::submit('Add status', ['class' => 'btn btn-primary']) }}
                </div>    
            {!! Form::close() !!}
            
        </div>
    </div><br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">ID</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($empstatuses as $empstatus)
            <tbody>
                <tr>
                <!-- <td>{{$empstatus->id}}</td> -->
                <td>{{$empstatus->id}}</td>
                <td>{{$empstatus->status}}</td>
                <td>
                <div class="flex gap-03em">
                    <a href="/empstatus/{{$empstatus->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="/empstatus/{{$empstatus->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    {!!Form::open(['action' => ['EmpstatusController@destroy', $empstatus->id], 'method' => 'POST', 'class' => 'show_confirm'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                    {!!Form::close()!!}</div>
                </td>
                </tr>
            </tbody>
        @endforeach
        </table>
        </div>
    
    @else
        <p>No empstatus List is listed!</p>
    @endif

@endsection