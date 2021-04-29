@extends('layouts.app')

@section('content')

<input type="checkbox" name="add-new" class="open-form" id="add-new">
<div class="add-stock">
    <label for="add-new"><span class="add-new"></span></label>
</div>

<div class="body-theme add-item-form">

{!! Form::open(['action' => 'SoftwareUserController@store', 'class' => 'software-form-container', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="">
        <h1>Add Application User</h1>
    </div>

    <div class="auto-fit">
        <div class="software-form-content">
            <label for="software_id">Select Application</label>
            <select id="software_id" class="form-control" name="software_id" required>
                <option value="">-- Select Software --</option>
                @foreach ($softwares as $key => $software)
                    <option value="{{$software->id}}">{{$software->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="software-form-content">
            <label for="employee_id">Select User</label>
            <select id="employee_id" class="form-control" name="employee_id" required>
                <option value="">-- Select Employee --</option>
                @foreach ($employees as $key => $employee)
                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="software-form-content">
            {{ Form::label('price', 'Price') }}
            {{ Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Enter software price']) }}    
        </div>
        <div class="software-form-content">
            {{ Form::label('status', 'Status') }}
            {{ Form::text('status', '', ['class' => 'form-control', 'placeholder' => 'Enter software status']) }}    
        </div>
        <div class="software-form-content">
            {{ Form::label('due_date', 'Due Date') }}
            {{ Form::date('payment_date', '', ['class' => 'form-control', 'placeholder' => 'Enter software payment_date']) }}    
        </div>
        <div class="software-form-content">
            {{ Form::label('renewal_date', 'Renewal Date') }}
            {{ Form::date('renewal_date', '', ['class' => 'form-control', 'placeholder' => 'Enter software renewal_date']) }}    
        </div>
        <div class="software-form-content">
            {{ Form::label('credit_card', 'Credit Card') }}
            {{ Form::text('credit_card', '', ['class' => 'form-control', 'placeholder' => 'Enter software credit_card']) }}    
        </div>
        <div class="software-form-content">
            {{ Form::label('credit_holder', 'Credit Holder') }}
            {{ Form::text('credit_holder', '', ['class' => 'form-control', 'placeholder' => 'Enter software credit_holder']) }}    
        </div>
    </div>

    <div class="software-form-content text-right">
        <label for="add-new"><div class="cancel">Cancel</div></label>
        {{ Form::submit('confirm', ['class' => 'add']) }}
    </div>
{!! Form::close() !!}
</div>




<h1>Software Users</h1>

<div>
@if(count($itemCounts) > 0)
        <div class="software-lists">
            @foreach($itemCounts as $software)
            <div class="software-list">
                <div class="software-list-img-cont">
                <a href="/software-user/items/{{$software->sid}}"><img src="/storage/cover_images/{{ $software->software_img }}" alt="profile picture"></a>
                </div>
                <div class="software-list-text-cont">
                    <a href="/software-user/items/{{$software->sid}}">Users - {{ $software->empTotal }}</a>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p>No software List is listed!</p>
    @endif
</div>


<!-- <a href="/software/create" class="btn btn-info float-right">Create New</a><br><br> -->
@if(count($softwareusers) > 0)
    <div class="body-theme">
    <div class="isicon"><i class="fas fa-user-plus fa-3x"></i></div>
    <table class="table mytable" id="table_id">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">Softwares</th>
                <th scope="col">Users</th>
                <th scope="col">price</th>
                <th scope="col">Date</th>
                <th scope="col">Renewal Date</th>
                <th scope="col">Credit Card</th>
                <th scope="col">Credit Holder</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        
            <tbody class="dev-tbl-lst">
            @foreach($softwareusers as $softwareuser)
            <tr>
                <td><img src="/storage/cover_images/{{$softwareuser->software_img}}" alt="profile picture">
                <td>{{$softwareuser->softname}}</td>
                <td>{{$softwareuser->empName}}</td>
                <td>{{$softwareuser->price}}</td>
                <td>{{date('j-F-Y', strtotime($softwareuser->payment_date))}}</td>
                <td>{{$softwareuser->renewal_date}}</td>
                <td>{{$softwareuser->credit_card}}</td>
                <td>{{$softwareuser->credit_holder}}</td>
                <td>
                    <div class="flex gap-03em">
                        <a href="/software-user/{{$softwareuser->sid}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="/software-user/{{$softwareuser->sid}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        {!!Form::open(['action' => ['SoftwareUserController@destroy', $softwareuser->sid], 'method' => 'POST', 'class' => 'show_confirm'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                        {!!Form::close()!!}
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@else
    
    
@endif

@endsection