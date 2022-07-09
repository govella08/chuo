@extends('cms.app_auth')

@section('content')
<div class="signin-form">
	<div class="signin-info" style="background:#FFFFFF;">
		<div class="slogan">
			<div class="row" style="margin-left:-38px;">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<img   class="img-responsive" style="" src="{{ asset('site/images/logo.png')}}" />
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" style="color:black;font-size:30px;">
					
					<h4>Reset Password</h4></div>
					<div class="col-md-2"></div>
					<!-- <div class="col-md-4">The United Republic of Tanzania</div> -->
				</div>

			</div> 
		</div>
		<!-- Form -->

		@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
		@endif

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
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<input type="email" required placeholder="Enter your email address" class="form-control" name="email" value="{{ old('email') }}">
				</div>
				<div class="col-md-2"></div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<input type="submit" style="background:#34495E !important;"  class="btn btn-primary" value="Send Password Reset Link">
					
					
				</div>
			</div>
		</form>
		

		<!-- / Form -->
	</div>

	@endsection
