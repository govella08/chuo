@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
	{{ __('label.management', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
	{{ __('label.management', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item">{{ __('label.administration', [], $currentLanguage->locale) }}</li>
<li class="breadcrumb-item"><a href="{{ url('administration',$category->id) }}">{{ __('label.management', [], $currentLanguage->locale) }}</a></li>
<li class="breadcrumb-item active">{!! $administration->fullname !!}</li>
@endsection



<!-- page content section -->
@section('page-content')
<img src="{{  url('/uploads/administration/medium-'.$administration->photo_url) }}" alt="News Image" class="img-responsive">
<span class="date"> <i class="icon icon-calendar"></i><strong>{!! date('M, d Y', strtotime($administration->created_at)) !!}</strong></span>
<p>{!! $administration->content_translation !!}</p>
@stop
<!-- ./page content section -->