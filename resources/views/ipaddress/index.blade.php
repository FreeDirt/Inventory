@extends('layouts.app')

@section('content')
<a href="/ipaddress/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($ipaddresses) > 0)
    <div class="body-theme">
    <div class="isicon"><i class="fas fa-globe-asia fa-3x"></i></div>
    <div class="search-field">
        <!-- <div class="search-by-categories">
            <div><p>Select by ipaddresss: drop down     |    show: 10</p></div>
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
            
            {!! Form::open(['action' => 'IpaddressController@store', 'method' => 'POST']) !!}
            <div class="input-group">
                    {{ Form::label('ip', ' ') }}
                    {{ Form::text('ip', '', ['class' => 'form-control', 'placeholder' => 'Enter ipaddress ip']) }}

                    {{ Form::label('description', ' ') }}
                    {{ Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
                    {{ Form::submit('Add Ipaddress', ['class' => 'btn btn-primary']) }}
                    </div>    
            {!! Form::close() !!}
            
        </div> -->
    </div><br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">ID</th>
            <th scope="col">ipaddresss</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($ipaddresses as $ipaddress)
            <tbody>
                <tr>
                <!-- <td>{{$ipaddress->id}}</td> -->
                <td>{{$ipaddress->id}}</td>
                <td>{{$ipaddress->ip}}</td>
                <td style="width: 50%;">{{$ipaddress->description}}</td>
                <td>
                <div class="flex gap-03em">
                    <a href="/ipaddress/{{$ipaddress->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="/ipaddress/{{$ipaddress->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    {!!Form::open(['action' => ['IpaddressController@destroy', $ipaddress->id], 'method' => 'POST', 'class' => 'show_confirm'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                    {!!Form::close()!!}</div>
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$ipaddresses->links()}}
        </table>
        </div>
    
    @else
        <p>No ipaddress List is listed!</p>
    @endif

@endsection