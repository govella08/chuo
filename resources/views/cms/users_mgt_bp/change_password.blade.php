@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
     	Change Password
     	<div style="color:green;">
     	@if(Session::has('message'))
			{{Session::get('message')}}
     	@endif
     </div>
    </div>
</div>

{!! Form::open(['route' => 'cms.users.user-change-password']) !!}
	<div class="large-5 columns">

		<div class="row collapse">
			<div class="large-12 columns">
				<span class='form_error'>{!! $errors->first('current_password') !!}</span>
				{!! Form::label('current_password', 'Current Password') !!}
				{!! Form::password('current_password') !!}
			</div>
		</div>


		<div class="row collapse">
			<div class="large-12 columns">
				<span class='form_error'>{!! $errors->first('password') !!}</span>
				{!! Form::label('password', 'New Password') !!}
				{!! Form::password('password') !!}
			</div>
		</div>

		<div class="row collapse">
			<div class="large-12 columns">
				<span class='form_error'>{!! $errors->first('confirm_password') !!}</span>
				{!! Form::label('confirm_password', 'Retype Password') !!}
				{!! Form::password('confirm_password') !!}
			</div>
		</div>

		<div class="row">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit('Change Password', ['class' => 'custom-button']) !!}
			</div>
		</div>
	</div>

{!! Form::close() !!}

@stop