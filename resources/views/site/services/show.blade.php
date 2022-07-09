@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __($services->title_translation) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __($services->title_translation) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.our_services', [], $currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')

<h4 class="text-center">{!! __($services->title_translation) !!}</h4>
<div class="news-image text-center mb-3">
    <img src="{!! asset('uploads/services/'.$services->photo_url) !!}" alt="{!! __('label.our_services',[],$currentLanguage->locale) !!}" class="img-fluid img-thumbnail">
</div>
<div class="news-content">
    <p>{!! __($services->content_translation) !!}</p>
</div>

@stop
<!-- ./page content section -->


















