@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.projects', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __($project->title, [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item"><a href="{{ url('projects',$project->category_id) }}">{{ __('label.projects', [], $currentLanguage->locale) }}</a></li>
<li class="breadcrumb-item active">{!! __($project->title, [], $currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<p class="download">
	<a href="{{ asset(__($project->file)) }}" download><i class="fa fa-file-pdf"></i> {{ __('label.download_attachment') }}</a>
</p>
{!! __($project->content) !!}
@stop
<!-- ./page content section -->