@extends('layouts.app')

@section('content')
<a href="/software-user" class="btn btn-info">Go Back</a><br><br>

@if(count($softwaresView) > 0)
@foreach ($softwaresView->take(1) as $softwareView)
    <div class="total-status grid-no-gap repeat3 text-center">
        <div><span>Software Name: {{$softwareView->sname}}</span></div>
        <div><span>User counts: {{$softwareView->ecount}}</span></div>
        <div><span>Payment Sum: {{ $softwareView->count == "0" ? "Free" : $softwareView->count  }}</span></div>
    </div>
@endforeach
@endif

@if(count($softwaresView) > 0)
<div class="tog-label">
    <label for="toggle-tblempv">
        <i id="grid-view" class="fas fa-th fa-2x {{Request::has('employee/*') ? 'fa-th-list' : 'fa-th-list'}}"></i>
    </label>
</div>
<input type="checkbox" name="mycheckbox" id="toggle-tblempv">
<div class="body-theme">
    <table class="table display" id="table_id">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Photo</th>
            <th scope="col">Softwares</th>
            <th scope="col">Users</th>
            <th scope="col">price</th>
            <th scope="col">Payment Date</th>
            <th scope="col">Renewal Date</th>
            <th scope="col">Status</th>
            <th scope="col">Credit Card</th>
            <th scope="col">Credit Holder</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        
     
            <tbody class="tbl-lst">
            @foreach ($softwaresView as $softwareView)
                <tr>
                <td><img src="/storage/cover_images/{{$softwareView->software_img}}" alt="profile picture">
                <td>{{$softwareView->sname}}</td>
                <td>{{$softwareView->ename}}</td>
                <td>{{$softwareView->price == "0" ? "Free" : $softwareView->price}}</td>
                <td>{{date('j-F-Y', strtotime($softwareView->payment_date))}}</td>
                <td><?php $now = date('Y-m-d'); ?>
                    @if($softwareView->renewal_date == $now )
                        <span class="color-green">today</span>
                        @elseif ($softwareView->renewal_date < $now)
                        <span class="color-red">{{date('M j, Y', strtotime($softwareView->renewal_date))}}</span>
                    @else
                    <span class="color-orange">{{date('M j, Y', strtotime($softwareView->renewal_date))}}</span>
                    @endif</td>
                <td>
                    {{ $softwareView->sstatus !== "Free" ? "On-Going" : $softwareView->sstatus }}
                </td>
                <td>{{$softwareView->credit_card}}</td>
                <td>{{$softwareView->credit_holder}}</td>
                <td>
                    
                    
                </td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>

    @endif
@endsection