@extends('layouts.app')

@section('content')
<a href="/ipaddress" class="btn btn-info">Go Back</a><br><br>

<div>
    <h1>Ipaddress SHOW</h1>
    <h3>Ipaddress: {{$ipaddress->ip}}</h3>

    <a href="/ipaddress/{{$ipaddress->id}}/edit" class="btn btn-success">Edit</a>
    

    {!!Form::open(['action' => ['IpaddressController@destroy', $ipaddress->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection