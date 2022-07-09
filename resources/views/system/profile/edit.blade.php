@extends('layouts.application')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">

        <h4 class="panel-title"><i class="fa fa-user" style="font-size:32px;"></i>&nbsp;Edit User Profile</h4>
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

    <div class="row">
        <div class="col-md-6">
            @if ($message = Session::get('success'))
            <div class="alert alert-success fade in">
                <button class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-info-circle"></i> {{ $message }}
            </div>
            @endif
            
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
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="widget">
                <div class="widget-content">
                    {!! Form::open(array('url'=>'/cms/profile/update','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Full Name:</strong>
                        {!! Form::text('name',  Auth::user()->name, array('class' => 'form-control','required')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', Auth::user()->email, array('class' => 'form-control','required')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Mobile Number</strong>
                        {!! Form::text('phone', Auth::user()->phone, array('class' => 'form-control','required')) !!}
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
