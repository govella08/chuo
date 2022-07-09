@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.bill_request',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.bill_request',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.bill_request',[],$currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')

<div class="m-3 mt-5">
	{!! Form::open(['route'=>'bill_request']) !!}
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="account_number"><h5>{!! __('label.account_number') !!}</h5> </label>
				
				{!! Form::text('account_number',null,['class'=>'form-control']) !!}
				
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="account_password"><h5>{!! __('label.password') !!}</h5> </label>
				
				{!! Form::password('password',['class'=>'form-control']) !!}
				
			</div>
		</div>
	</div>
	
	
	
	<hr>
	<div class="text-right">
		<button type="submit" class="btn btn-primary">{!! __('label.submit') !!}</button>
	</div>
	{!! Form::close() !!}
</div>

@stop
<!-- ./page content section -->


