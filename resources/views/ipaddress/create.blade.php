@extends('layouts.app')

@section('content')
<a href="/ipaddress" class="btn btn-info">Go Back</a><br><br>

<div></div>
<h1>Ipaddress Create</h1>

<div class="tablebg">

{!! Form::open(['action' => 'IpaddressController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('ip', 'Ipaddress') }}
        {{ Form::text('ip', '', ['class' => 'form-control', 'placeholder' => 'Enter ipaddress ip']) }}
    </div>
   
    <div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
{!! Form::close() !!}
</div>
@endsection