@extends('layouts.app')

@section('content')
<div class="emp-prof-banner">
    <div><img src="https://png.pngtree.com/thumb_back/fw800/background/20190221/ourmid/pngtree-texture-geometric-black-metal-gradient-image_17809.jpg" alt=""></div>
</div>
<div class="container">
<div class="container body-theme emp-profile">
   <div class="grid onefr2fr1 grid-1em-gap">
        <div class="emp-img">
            <img src="/storage/cover_images/{{$employee->cover_image}}" alt="prifile picture">
        </div>
        <div class="emp-details">
                <p>ID: {{$employee->id}}</p>
                <p>Name: {{$employee->name}}</p>
                <p>Email: {{$employee->email}}</p>
                <p>Bday: {{$employee->bday}}</p>
                <p>Personal Number: {{$employee->personal_no}}</p>
                <p>Company Number: {{$employee->company_no}}</p>
                <p>City: {{$employee->city}}</p>
                <p>Region: {{$employee->region}}</p>
        </div>
        <div classs="emp-actions">
            <div class="container text-center">
                <div class="btn btn-primary">EDIT PROFILE</div>
            </div>
        </div>
   </div>
</div>
</div>


<!-- 
<div class="grid-container">
        <div class="grid-content column-2">
            <div>
                <h3>ID: {{$employee->id}}</h3>
                <h3>Name: {{$employee->name}}</h3><br>
                <h3>Email: {{$employee->email}}</h3><br>
                <h3>Bday: {{$employee->bday}}</h3><br>
                <h3>Personal Number: {{$employee->personal_no}}</h3><br>
                <h3>Company Number: {{$employee->company_no}}</h3><br>
                <h3>City: {{$employee->city}}</h3><br>
                <h3>Region: {{$employee->region}}</h3><br>
            </div>
        </div>
        <div class="grid-content column-1">
            <div>
                <div>
                <h4>Created_at: {{date('M j, Y h:ia', strtotime($employee->created_at))}}</h4>
                <h4>Updated_at: {{date('M j, Y h:ia', strtotime($employee->updated_at))}}</h4>
                </div>
            <a href="/employee/{{$employee->id}}/edit" class="btn btn-success">Edit</a>

            {!!Form::open(['action' => ['EmployeeController@destroy', $employee->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
        </div>
    </div> -->
@endsection