@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __($page->title) !!}

@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __($page->title) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __($page->title) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
@if(isset($page))
{!! __($page->content) !!}
@else
{!! __('label.no_information') !!}
@endif
@stop
<!-- ./page content section -->



















