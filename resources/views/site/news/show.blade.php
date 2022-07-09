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
	<li class="breadcrumb-item active" aria-current="page"> {{ __($news->title_translation) }} </li>
@endsection


<!-- page content section -->
@section('page-content')

<div class="date clearfix mb-2">
    <span class="float-right">
        {{ __('label.posted', [], $currentLanguage->locale) }}:
        <i class="fa fa-calendar"></i>
        {!! date('M, d Y', strtotime($news->created_at)) !!}
    </span>
</div>
<h4 class="text-center">{{ __($news->title_translation) }}</h4>
{{-- <div class="news-image text-center mb-3">
    <img src="{!! asset('/uploads/news/large-'.$news->photo_url) !!}" alt="News Images" class="img-fluid img-thumbnail">
</div> --}}
<div class="news-content mt-4 pt-3 border-top">
    <p>{!! __($news->content_translation) !!}</p>
</div>


@stop
<!-- ./page content section -->
