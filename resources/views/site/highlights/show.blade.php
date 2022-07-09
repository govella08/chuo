@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{{ __('label.highlights', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{{ __('label.highlights', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
	<li class="breadcrumb-item active" aria-current="page"> {{ __('label.highlights', [], $currentLanguage->locale) }}</li>
	<li class="breadcrumb-item active" aria-current="page"> {{ __($highlight->title_translation) }} </li>
@endsection


<!-- page content section -->
@section('page-content')

<div class="date clearfix mb-2">
    <span class="float-right">
        {{ __('label.posted', [], $currentLanguage->locale) }}:
        <i class="fa fa-calendar"></i>
        {!! date('M, d Y', strtotime($highlight->created_at)) !!}
    </span>
</div>
<h4 class="text-center">{{ __($highlight->title_translation) }}</h4>
<div class="highlights-content">
    <p>{!! __($highlight->content_translation) !!}</p>
</div>


@stop
<!-- ./page content section -->







































