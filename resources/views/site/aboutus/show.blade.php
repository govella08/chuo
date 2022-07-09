@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.about_us', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.about_us', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.about_us', [], $currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<p>{!! $aboutus->{langdb('content')} !!}</p>
@stop
<!-- ./page content section -->


