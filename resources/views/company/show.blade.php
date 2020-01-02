@extends('layouts.app')

@section('content')
<a href="/company" class="btn btn-info">Go Back</a><br><br>

<div>
    <h1>company SHOW</h1>
    <h3>company Name: {{$company->name}}</h3>

    <a href="/company/{{$company->id}}/edit" class="btn btn-success">Edit</a>
    

    {!!Form::open(['action' => ['CompanyController@destroy', $company->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection