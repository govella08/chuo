@extends('layouts.application')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">

        <h4 class="panel-title"><i class="fa fa-user" style="font-size:32px;"></i>&nbsp;Change Password</h4>
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

    <div class="row db-heading-link">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-warning btn-sm" href="{{ url('/cms/profile') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-danger status-box">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    @endif 
    @if ($message = Session::get('success'))

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-success status-box fade in">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{ $message }}
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    @endif

    @if ($message = Session::get('error')) 

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-danger status-box fade in">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{ $message }}
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="widget">
                <div class="widget-content">
                    {!! Form::open(array('url' => '/cms/profile/change-pass','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Old Password:</strong>
                        {!! Form::password('old_pass', array('placeholder' => 'Enter your current password','class' => 'form-control','required')) !!}
                    </div>
                    <div class="form-group">
                        <strong>New Password:</strong>
                        {!! Form::password('new_pass', array('placeholder' => 'Enter your current password','class' => 'form-control','required')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Confirm New Password:</strong>
                        {!! Form::password('new_pass_confirmation', array('placeholder' => 'Enter your current password','class' => 'form-control','required')) !!}
                    </div>

                    <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>


</div>

@endsection

