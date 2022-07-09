@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.change_account_password',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.change_account_password',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.change_account_password',[],$currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="m-5 p-5">
	{!! Form::open(['route'=>'change_account_password']) !!}
	<div class="form-group row">
		<label for="accountNumber" class="col-md-3 col-form-label">{!! __('label.account_number') !!}</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="account_number" name="account_number" >
		</div>
	</div>

	<div class="form-group row">
		<label for="currentPassword" class="col-md-3 col-form-label">{!! __('label.current_password') !!}</label>

		<div class="col-md-9">
			<input type="password" class="form-control" id="currentPassword" name="current_password" placeholder="">
		</div>
	</div>

	<div class="form-group row">
		<label for="newPassword" class="col-md-3 col-form-label">{!! __('label.new_password') !!}</label>

		<div class="col-md-9">
			<input type="password" id="newPassword" name="new_password"  class="form-control" >
		</div>
	</div>

	<div class="form-group row">
		<label for="confirmPassword" class="col-md-3 col-form-label">{!! __('label.confirm_password') !!}</label>

		<div class="col-md-9">
			<input type="password" id="confirmPassword" name="confirm_password" class="form-control">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">{!! __('label.submit') !!}</button>
	{!! Form::close() !!}
</div>
@stop
<!-- ./page content section -->


