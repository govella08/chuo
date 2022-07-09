@extends('layouts.application')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-group" style="font-size:32px;"></i>&nbsp;Users Management</h4>
    </div><br>

    <div class="row db-heading-link">
    <div class="col-lg-12 margin-tb">
        @permission('users.index')
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('users.index') }}"> Back</a>
        </div>
        @endpermission
    </div>
</div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="widget">
                <div class="widget-content">
                   <table class="table">
            <tr>
                <td>Full Name</td>
                <td> {{ $user->name }}</td>

            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $user->email}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{$user->phone}}</td>
            </tr>
            <tr>
                <td>Activation</td>
                <td>{{ Activation($user-> activated) }}</td>
            </tr>
            <tr>
                <td>Roles</td>
                <td>@if(!empty($user->roles))
                    @foreach($user->roles as $v)
                    <label class="label label-success">{{ $v->display_name }}</label>
                    @endforeach
                    @endif</td>
                </tr>

            </table>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    </div>
    @endsection