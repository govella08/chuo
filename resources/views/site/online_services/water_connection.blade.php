<!-- this view was unnecessary,
 we could just use reported issue view 
 and make it dynamic based on service requested
 but due to time limit we  only copied the view 
 and hide some unnecessary fields for new water connection.

 For better maintainability this should be avoid.
-->

@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.water_connection_application',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.water_connection_application',[],$currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.water_connection_application',[],$currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="m-5 p-5">
  {!! Form::open(['route'=>'report_issue']) !!}
  <div class="form-group row">
    <label for="firstName" class="col-md-3 col-form-label">{!! __('label.first_name') !!}</label>

    <div class="col-md-9">

      {!! Form::text('first_name',null,['id'=>'firstName','class'=>'form-control']); !!}
    </div>
  </div>
  <div class="form-group row">
    <label for="lastName" class="col-md-3 col-form-label">{!! __('label.last_name') !!}</label>

    <div class="col-md-9">

      {!! Form::text('last_name',null,['id'=>'lastName','class'=>'form-control']); !!}
    </div>
  </div>

  <div class="form-group row">
    <label for="emailAddress" class="col-md-3 col-form-label">{!! __('label.email') !!} </label>

    <div class="col-md-9">
      {!! Form::email('email',null,['id'=>'emailAddress','class'=>'form-control']); !!}
    </div>
  </div>

  <div class="form-group row">
    <label for="wardName" class="col-md-3 col-form-label">{!! __('label.ward_name') !!}</label>

    <div class="col-md-9">
      {!! Form::text('ward_name',null,['id'=>'wardName','class'=>'form-control']); !!}
    </div>
  </div>

  <div class="form-group row">
    <label for="streetName" class="col-md-3 col-form-label">{!! __('label.street') !!}</label>

    <div class="col-md-9">
      {!! Form::text('street_name',null,['id'=>'streetName','class'=>'form-control']); !!}
    </div>
  </div>
  <div class="form-group row">
    <label for="phoneNumber" class="col-md-3 col-form-label">{!! __('label.phone_number') !!}</label>

    <div class="col-md-9">
     {!! Form::text('phone_number',null,['id'=>'phoneNumber','class'=>'form-control','placeholder'=>'ex: 255714123456']); !!}
   </div>
 </div>
 <div class="form-group row">
  <label for="jurisdiction" class="col-md-3 col-form-label">{!! __('label.jurisdiction') !!}</label>

  <div class="col-md-9">
    {!! Form::select('nearest_office',$jurisdictions->pluck('jurisdiction_name','jurisdiction_id'),null,['id'=>'jurisdiction','class'=>'form-control','placeholder'=>__('label.jurisdiction_placeholder')]); !!}
  </div>
</div>
<!-- this is the service code the new water connection -->
<input type="hidden" name="service_type" value="NW">

<div class="form-group row">
  <label for="description" class="col-md-3 col-form-label">{!! __('label.desc') !!} </label>

  <div class="col-md-9">

    <!-- <textarea name="description" name="description" class="form-control" placeholder="{!! __('label.desc') !!} ..." id="description" cols="30" rows="5"></textarea> -->
    {!! Form::textarea('description',null,['id'=>'description','class'=>'form-control','rows'=>'5']); !!}
  </div>
</div>



<button type="submit" class="btn btn-primary">{!! __('label.submit') !!}</button>
{!! Form::close() !!}
</div>

@stop
<!-- ./page content section -->


