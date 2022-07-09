@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.customer_account_activation',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.customer_account_activation',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.customer_account_activation',[],$currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="m-5 p-5">
	{!! Form::open(['route'=>'activate_customer_account']) !!}
	<div class="form-group row">
		<label for="account_number" class="col-md-3 col-form-label">{!! __('label.account_number') !!}</label>
		<div class="col-md-9">
			<!-- <input type="text" class="form-control" id="account_number" name="account_number" > -->

			{!! Form::text('account_number',null,['id'=>'account_number','class'=>'form-control']); !!}
		</div>
	</div>
	<div class="form-group row">
		<label for="activation_code" class="col-md-3 col-form-label">{!! __('label.activation_code') !!}</label>
		<div class="col-md-9">
			<!-- <input type="text" class="form-control" id="activation_code" name="activation_code" > -->
			{!! Form::text('activation_code',null,['id'=>'activation_code','class'=>'form-control']); !!}
		</div>
	</div>

	<div class="form-group row">
		<label for="password" class="col-md-3 col-form-label">{!! __('label.new_password') !!}</label>
		<div class="col-md-9">
			<input type="password" class="form-control" id="password" name="password" >
		</div>
	</div>
	<div class="form-group row">
		<label for="confirm_password" class="col-md-3 col-form-label">{!! __('label.confirm_password') !!}</label>
		<div class="col-md-9">
			<input type="password" class="form-control" id="confirm_password" name="confirm_password" >
		</div>
	</div>

	<button type="submit" class="btn btn-primary">{!! __('label.submit') !!}</button>
	{!! Form::close() !!}
</div>
@stop
<!-- ./page content section -->


