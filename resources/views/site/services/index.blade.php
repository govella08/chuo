@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.our_services', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.our_services', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.our_services', [], $currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
@if(count($services))
@foreach($services as $service)
<div class="row pb-2 more-info">
    <div class="col-md-4">
        <div class="text-center">
            <img src="{!! asset('uploads/services/thumb-'.$service->photo_url) !!}" alt="" class="img-fluid mb-1 img-thumbnail">
        </div>
    </div>
    <div class="col-md-8">
        <div class="">
            <h6 class="mb-1">{!! __($service->title_translation) !!}</h6>
            <p class="mb-2">
                {!! __($service->summary_translation) !!}...
                <a href="{!! URL::to('services', $service->slug) !!}">{{ __('label.readmore', [], $currentLanguage->locale) }} <i class="fa fa-arrow-circle-right"></i></a></p>

            </div>
        </div>
    </div>
    <hr>
    @endforeach
    <!-- render pagination -->

    <div class="text-right">
        <!-- $services->render() -->
    </div>
    @else
    <div class="alert alert-warning">{{ __('label.no_information', [], $currentLanguage->locale) }}</div>
    <!-- ********************************************** Pagination **********************************************   -->
    @endif
    @stop
    <!-- ./page content section -->
