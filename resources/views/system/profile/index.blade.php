@extends('layouts.application')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">

        <h4 class="panel-title"><i class="fa fa-user" style="font-size:32px;"></i>&nbsp;User Profile</h4>
    </div><br>

    @if(Session::has('message'))
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-{{ Session::get('status') }} status-box">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{ Session::get('message') }}
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    @endif 

 <div class="row">
        <div class="col-md-6">
            @if ($message = Session::get('success'))
                <div class="alert alert-success fade in">
                    <button class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-info-circle"></i> {{ $message }}
                </div>
            @endif
            <table class="table">
                <tr>
                    <td>Full Name</td>
                    <td>{{Auth::user()->name}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{Auth::user()->email}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{Auth::user()->phone}}</td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td>{{Auth::user()->region->region_name }}</td>
                </tr>
                <tr>
                    <td>Member Since</td>
                    <td>{{Auth::user()->created_at->diffForHumans()}}</td>
                </tr>
                <tr>
                    <td>Last Update</td>
                    <td>{{Auth::user()->updated_at->diffForHumans()}}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary btn-sm pull-right" href="{{url('/cms/profile/change-password')}}"> <i class="fa fa-gear"></i> Change Password</a>
            <a class="btn btn-primary btn-sm pull-right" href="{{url('/cms/profile/edit')}}"> <i class="fa fa-edit"></i> Edit Profile</a>
        </div>
    </div>


</div>

@endsection
