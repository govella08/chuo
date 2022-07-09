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
<li class="breadcrumb-item active" aria-current="page">{{ __('label.news', [], $currentLanguage->locale) }}</li>
@endsection


<!-- page content section -->
@section('page-content')

@if(count($alumnis))
@foreach($alumnis as $alumni)
<div class="row border-bottom">
    <div class="col-md-3">
        <img src="{{ asset('/uploads/alumni/medium-'.$alumni->photo_url) }}" class="img-thumbnail" alt=" eGA Photo">
    </div>
    <div class="col-md-9">
        <div class="mt-3 mt-md-0">
            <h6 class="mb-1"><span class="badge badge-info">Name: {{ $alumni->fullname }}</span>
            </h6>
            <p class="mb-1">{!! $alumni->alumni !!}<a class="text-nowrap read-more"
                    href="{{ url('alumni',$alumni->slugy) }}">Read
                    More</a></p>
            <p class="date">Posted on: <i class="fas fa-calendar-alt"></i> January 23, 2016
            </p>
        </div>
    </div>
</div>
    @endforeach
    @else
    {{ label('lbl_no_information')}}

    @endif

    
    @stop
    <!-- ./page content section -->





















