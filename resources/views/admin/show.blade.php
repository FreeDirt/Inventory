@extends('layouts.app')

@section('content')
<a href="/admin" class="btn btn-info">Go Back</a><br><br>

<div>
    <h1>User SHOW</h1>

    <div class="grid-container">
        <div class="grid-content column-2">
            <div>
                <h3>name: {{$user->name}}</h3><br>
                <h3>Email: {{$user->email}}</h3><br>
                <h3>User Role: {{$user->roles->first()->name}}</h3><br>
            </div>
        </div>
        <div class="grid-content column-1">
            <div>
                <div>
                <h4>Created_at: {{date('M j, Y h:ia', strtotime($user->created_at))}}</h4>
                <h4>Updated_at: {{date('M j, Y h:ia', strtotime($user->updated_at))}}</h4>
                </div>
            <a href="/admin/{{$user->id}}/edit" class="btn btn-success">Edit</a>

            {!!Form::open(['action' => ['AdminController@destroy', $user->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
        </div>
    </div>
    

   
</div>
@endsection