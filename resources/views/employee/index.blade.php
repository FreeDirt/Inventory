@extends('layouts.app')

@section('content')
<h1>Employee List</h1>
<a href="/employee/create" class="btn btn-info float-right mx-sm-3">Create New</a>
<button id="modalimport" class="btn btn-info float-right">Import Employee</button>

<div id="importModal" class="modalImport">
    <div class="modal-content">
        <div class="container">
            <span id="closeBtn" class="closeModalBtn">&times;</span>
        </div>
        <div class="container">
                <div class="clearfix">
                    <div class="float-left">
                        <form class="form-inline" action="{{url('employees/import')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imported_file"/>
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                            <button style="margin-left: 10px;" class="btn btn-info" type="submit">Import</button>
                        </form>
                    </div>
                    <div class="float-right">
                        <form action="{{url('employees/export')}}" enctype="multipart/form-data">
                            <button class="btn btn-dark" type="submit">Export</button>
                        </form>
                    </div>
                </div>
                <br/>

                @if(count($employees))
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                        </tr>
                        </thead>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif

            </div>

    </div>
</div><br><br>

@if(count($employees) > 0)
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
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Personal No.</th>
            <th scope="col">Company</th>
            <th scope="col">Ip Address</th>
            <th scope="col">Company No.</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($employees as $employee)
            <tbody class="emp-tbl-lst">
                <tr>
                <td><img src="/storage/cover_images/{{$employee->cover_image}}" alt="prifile picture"></td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->personal_no}}</td>
                <td>{{$employee->company['name']}}</td>
                <td>{{$employee->ipaddress['ip']}}</td>
                <td>{{$employee->company_no}}</td>
                <td>
                <a href="/employee/{{$employee->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="/employee/{{$employee->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                {!!Form::open(['action' => ['EmployeeController@destroy', $employee->id], 'method' => 'POST', 'class' => 'btn btn-danger'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger'] )  }}

                {!!Form::close()!!}
                </td>
                </tr>
            </tbody>
        @endforeach
        {{$employees->links()}}
        </table>
        </div>
    
    @else
        <p>No employee List is listed!</p>
    @endif

@endsection