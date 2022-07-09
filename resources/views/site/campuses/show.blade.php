@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{{ __('label.news', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{{ __('label.news', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
	<li class="breadcrumb-item active" aria-current="page"> {{ __('label.news', [], $currentLanguage->locale) }}</li>
	<li class="breadcrumb-item active" aria-current="page"> {{ __($campuses->name_translation) }} </li>
@endsection


<!-- page content section -->
@section('page-content')

<div class="date clearfix mb-2">
    <span class="float-right">
        {{ __('label.posted', [], $currentLanguage->locale) }}:
        <i class="fa fa-calendar"></i> {{--
        {!! date('M, d Y', strtotime($campuses->created_at)) !!} --}}
    </span>
</div>
<h4 class="text-center">{{ __($campuses->name_translation) }}</h4> 

<div class="news-content">
    <p>{!! __($campuses->content_translation) !!}</p>
</div>


@stop
<!-- ./page content section -->







































