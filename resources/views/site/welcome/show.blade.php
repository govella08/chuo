@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
	{{ __('label.welcome_note', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
	{{ __('label.welcome_note', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active"> {{ __('label.welcome_note', [], $currentLanguage->locale) }} </li>
@endsection


<!-- page content section -->
@section('page-content')

<p>{!! __($welcome->content_translation) !!}</p>

@stop
<!-- ./page content section -->



















