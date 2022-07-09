@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.press') !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.press') !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.press') !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="publication">
  @include('site.includes._publications',$list = $pressreleases)
</div>
@stop
<!-- ./page content section -->


