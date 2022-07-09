@extends('layouts.auth')

@section('title', 'Reset Password')
@section('description', 'Reset Password')

@section('content')
<div class="card-container text-center">
	@include('notifications.status_message')
	@include('notifications.errors_message')
</div>

<img id="profile-img" class="profile-img-card" src="{{ asset('cms_assets/images/logo.png') }}" />
<p id="profile-name" class="profile-name-card"></p>
<form class="form-signin" method="POST" action="{{ url('/password/email') }}" data-parsley-validate="">
	{{ csrf_field() }}

	@if ($errors->has('email'))
	<span class="help-block">
		<strong>{{ $errors->first('email') }}</strong>
	</span>
	@endif
	<div class="input-group mb15">
		<span class="input-group-addon"><i class="fa fa-user"></i></span>
	    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus data-parsley-required-message="An email address is required" data-parsley-trigger="change focusout" data-parsley-type="email">
	</div><!-- input-group -->
	<div class="input-group mb15">
		<button type="submit" class="btn btn-success">Send Password Reset Link <i class="fa fa-angle-right ml5"></i></button>
	</div><!-- input-group -->
</form><!-- /form -->
<!--  <a href="{{ url('/username/reminder') }}" class="forgot-password">Forgot username?</a> |  -->
<a  href="{{ url('/login') }}" class="new-account">Login</a>
@endsection

@section('scripts')
<script src="{!! asset('assets/js/plugins/parsley/parsley.js') !!}"></script>
@endsection