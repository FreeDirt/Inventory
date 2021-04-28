@extends('layouts.app')

@section('content')

<input type="checkbox" name="add-new" class="open-form" id="add-new">
<div class="add-stock">
    <label for="add-new"><span class="add-new"></span></label>
</div>

<div class="body-theme add-item-form">

{!! Form::open(['action' => 'SoftwareController@store', 'class' => 'software-form-container', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="">
        <h1>Add Software</h1>
    </div>

    <div class="auto-fit">
        <div class="software-form-content">
            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter software name']) }}    
        </div>
        <div class="software-form-content">
            {{ Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Enter software description']) }}    
        </div>
        <div class="software-form-content">
            {{ Form::text('version', '', ['class' => 'form-control', 'placeholder' => 'Enter software version']) }}    
        </div>
        <div class="software-form-content">
            {{ Form::text('developer', '', ['class' => 'form-control', 'placeholder' => 'Enter software developer']) }}    
        </div>
        <div class="software-form-content">
            {{ Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'Enter software website']) }}    
        </div>

        <div class="software-form-content">
            {{ form::file('software_img')}}
        </div>
    </div>

    <div class="software-form-content text-right">
        <label for="add-new"><div class="cancel">Cancel</div></label>
        {{ Form::submit('Add Software', ['class' => 'add']) }}
    </div>
{!! Form::close() !!}
</div>








<h1>Software List</h1>
<!-- <a href="/software/create" class="btn btn-info float-right">Create New</a><br><br> -->
@if(count($softwares) > 0)
        <div class="software-lists">
            @foreach($softwares as $software)
            <div class="software-list">
                <img src="/storage/cover_images/{{$software->software_img}}" alt="profile picture">
                <!-- {{$software->name}} -->
            </div>
            @endforeach
        </div>
    @else
        <p>No software List is listed!</p>
    @endif

@endsection