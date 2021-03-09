@extends('layouts.app')

@section('content')
<h1>Employee List</h1>
<a href="/employee/create" class="btn btn-info float-right mx-sm-3">Create New</a>
<button id="modalimport" class="btn btn-info float-right">Import / Export</button>

<div id="importModal" class="modalImport">
    <div class="modal-content">
        <div class="container">
            <span id="closeBtnimport" class="closeModalBtn">&times;</span>
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

                @if(count($importemployees) > 0)
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                        </tr>
                        </thead>
                        @foreach($importemployees as $employee)
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
    <div class="">
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
        <div class="tog-label">
            <label for="toggle-tblempv">
                <i id="grid-view" class="fas fa-th fa-2x {{Request::has('employee/*') ? 'fa-th-list' : 'fa-th-list'}}"></i>
            </label>
        </div>
        <input type="checkbox" name="mycheckbox" id="toggle-tblempv">
        <table class="table mytable" id="table_id">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Company No.</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        
            <tbody class="emp-tbl-lst">
            @foreach($employees as $employee)
                <tr>
                <td><img src="/storage/cover_images/{{$employee->cover_image}}" alt="prifile picture"></td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->company_no}}</td>
                <td>
                <div class="flex gap-03em">
                    <a href="/employee/{{$employee->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="/employee/{{$employee->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    {!!Form::open(['action' => ['EmployeeController@destroy', $employee->id], 'method' => 'POST', 'class' => 'show_confirm'])!!}
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
        
        <!-- <div class="tog-label">
            <label for="toggle-tblempv">
                <i id="grid-view" class="fas fa-th fa-2x {{Request::has('employee/*') ? 'fa-th-list' : 'fa-th-list'}}"></i>
            </label>
        </div>
        <input type="checkbox" name="mycheckbox" id="toggle-tblempv">
        <div class="empCont control-me" id="id">
        @foreach($employees as $employee)
            <div class="emp-view">
            <a href="/employee/{{$employee->id}}">
                <div class="emp-card">
                    <p> <img src="/storage/cover_images/{{$employee->cover_image}}" class="img-global-class" alt="prifile picture"></p>
                    <p>{{$employee->name}}</p>
                    <p>{{$employee->email}}</p>
                    <p>{{$employee->company_no}}</p>
                    <p>{{$employee->stock['name']}}</p>
                </div>
            </a>
            </div>
        @endforeach -->
        
        
        </div>
    
    @else
        <!-- <p>No employee List is listed!</p> -->
    @endif

@endsection