@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
 {!! __('label.how_doi', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
 {!! __($howdois->title_translation) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.how_doi', [], $currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')

@if(count($howdois))
<div class="news-content">
	{!! __($howdois->content_translation) !!}
</div>
@else
 {!! __('label.no_information', [], $currentLanguage->locale) !!}
@endif

@stop
<!-- ./page content section -->