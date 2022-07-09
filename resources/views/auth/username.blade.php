@extends('layouts.auth')

@section('title', 'Resend Activation Key')
@section('description', 'Resend the activation key')

@section('content')
	<div class="container login">
        
		<div class="card-main">
			<div class="card card-container">
            <center style="font-size:22px;"><p>M & E Portal</p></center>

			<div class="card-container text-center">
		<!-- 	<h2>Please login to your account</h2> -->
			@include('notifications.status_message')
		    @include('notifications.errors_message')
		</div>

            <img id="profile-img" class="profile-img-card" src="{{ asset('cms_assets/images/logo.png') }}" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="{{ url('/username/reminder') }}">
                {{ csrf_field() }}
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Send Username Reminder</button>
            </form><!-- /form -->
            <a href="{{ url('/password/reset') }}" class="forgot-password">Forgot password? </a> | 
			<a href="{{ url('/login') }}" class="new-account">Login</a>
        </div><!-- /card-container -->
		
		</div>
		
    </div><!-- /container -->
@endsection