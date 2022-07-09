@extends('cms.app_auth')

@section('content')
		<div class="signin-form" >
     <div class="signin-info" style="background:#FFFFFF;">
			<div class="slogan">
				<div class="row" style="margin-left:-38px;">
					<div class="col-md-4"></div>
					<div class="col-md-7">
						<img   class="img-responsive" style="" src="{{ asset('site/images/emblem.png')}}" />
					</div>
					<div class="col-md-3"></div>
				</div>
			<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" style="color:black;font-size:30px;">
			
		      <center><h4>Login</h4></center></div>
		    <div class="col-md-2"></div>
			<!-- <div class="col-md-4">The United Republic of Tanzania</div> -->
			</div>
		 

			</div> 
		</div>
			<!-- Form -->
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
				@csrf	
				<div class="form-group w-icon has-error">
					<input name="email"   style="border:1px solid #0072BB;" id="username_id" class="form-control input-lg" placeholder="Enter your Email" required  type="text">
					<span class="signin-form-icon"><img src="lib/img/profile.png"></span>
				</div>

				<div class="form-group w-icon has-error" >
					<input name="password" id="password_id" style="border:1px solid #0072BB;" required class="form-control input-lg" placeholder="Password" type="password">
					<span class="signin-form-icon"><img src="lib/img/passwd.png"></span>
				</div>
				<div class="form-actions">
					<input value="Login" class="btn bg-primary" style="background:#34495E !important;" name="submit" type="submit">
					<a href="{{ url('/password/email') }}"  id="forgot-password-link" style="color:black;">Forgot your password?</a>
				</div> 
			</form>

			<!-- / Form -->
		</div>

@stop
