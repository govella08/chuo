@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.bill_registration',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.bill_registration',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.bill_registration',[],$currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="m-5 p-5">
	{!! Form::open(['route'=>'bill_registration']) !!}
	<div class="form-group row">
		<label for="account_number" class="col-md-3 col-form-label">{!! __('label.account_number') !!} </label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="account_number" name="account_number" >
		</div>
	</div>
	<div class="form-group row">
		<label for="full_name" class="col-md-3 col-form-label">{!! __('label.full_name') !!} </label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="full_name" name="full_name" >
		</div>
	</div>
	<div class="form-group row">
		<label for="phone_number" class="col-md-3 col-form-label">{!! __('label.phone_number') !!}</label>
		<div class="col-md-9">
			<!-- <input type="number" class="form-control" id="phone_number" name="phone_number"> -->
			{!! Form::text('phone_number',null,['id'=>'phoneNumber','class'=>'form-control','placeholder'=>'ex: 255714123456']); !!}
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-md-3 col-form-label">{!! __('label.email') !!}</label>
		<div class="col-md-9">
			<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" >
		</div>
		
	</div>

	<button type="submit" class="btn btn-primary">{!! __('label.submit') !!}</button>
	{!! Form::close() !!}
</div>

@stop
<!-- ./page content section -->


