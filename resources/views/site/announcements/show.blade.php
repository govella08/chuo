@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.announcements', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.announcements', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active"><a href="{{url('announcements')}}">{!! __('label.announcements', [], $currentLanguage->locale) !!}</a></li>
@endsection


<!-- page content section -->
@section('page-content')

@if($announcement)
<div>
	<p class="date float-right mb-1">{{ __('label.posted', [], $currentLanguage->locale) }}: <i class="fa fa-calendar"></i> {!! date('M d, Y',strtotime($announcement->created_at)) !!}</p>
</div><br>
<div class="news-content">
	{!! __($announcement->content_translation) !!}
</div>
</div>

@else
{!! __('label.no_information', [], $currentLanguage->locale) !!}
@endif

@stop
<!-- ./page content section -->