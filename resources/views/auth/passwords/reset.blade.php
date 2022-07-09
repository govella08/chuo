@extends('layouts.auth')

@section('title', 'Reset Password')
@section('description', 'Reset Your Password')

@section('content')
<div class="card-container text-center">
	@include('notifications.status_message')
	@include('notifications.errors_message')
</div>

<form class="form-signin" method="POST" action="{{ url('/password-reset') }}" data-parsley-validate="">
                {{ csrf_field() }}
				<input type="hidden" name="token" value="{{ $token }}">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ $email or old('email') }}" required autofocus data-parsley-required-message="An email address is required" data-parsley-trigger="change focusout" data-parsley-type="email">
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
				<br>
				<input type="password" id="password" name="password" class="form-control" placeholder="Password" required data-parsley-required-message="A password is required" data-parsley-trigger="change focusout" data-parsley-minlength="6" data-parsley-maxlength="20">
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
				<br>
				<input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password" required data-parsley-required-message="You must confirm your password" data-parsley-trigger="change focusout" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-equalto="#password" data-parsley-equalto-message="Confirmation Password does not Match">
				@if ($errors->has('password_confirmation'))
					<span class="help-block">
						<strong>{{ $errors->first('password_confirmation') }}</strong>
					</span>
				@endif
				<br>
                <button class="btn btn-lg btn-success btn-block btn-signin" type="submit">Reset Password</button>
            </form><!-- /form -->

@endsection

@section('scripts')
<script src="{!! asset('assets/js/plugins/parsley/parsley.js') !!}"></script> 
@endsection