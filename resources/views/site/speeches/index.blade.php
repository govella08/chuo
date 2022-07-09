@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
	{!! __('label.speeches', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
	{!! __('label.speeches', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active"> {!! __('label.speeches', [], $currentLanguage->locale) !!} </li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="publication">
  @include('site.includes._publications',$list = $speeches)
</div>
@stop
<!-- ./page content section -->


