@extends('layouts.app')

@section('content')
<h1>Admin List</h1>
<a href="/admin/create" class="btn btn-info float-right">Create New</a><br><br>
@if(count($users) > 0)
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
            <!-- <th scope="col">Id</th> -->
            <th scope="col">Name</th>
            <th scope="col">E-Mail</th>
            <th scope="col">User Role</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($users as $user)
            <tbody>
                <tr>
                <!-- <td>{{$user->id}}</td> -->
                <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->roles->first()->name}}</td>
                <td>
                <div class="flex gap-03em">
                    <a href="/admin/{{$user->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="/admin/{{$user->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    {!!Form::open(['action' => ['AdminController@destroy', $user->id], 'method' => 'POST', 'class' => 'show_confirm'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                    {!!Form::close()!!}</div>
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$users->links()}}
        </table>
        </div>
    
    @else
        <p>No admin List is listed!</p>
    @endif

@endsection

<!-- <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td> -->