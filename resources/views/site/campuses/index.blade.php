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

@if(count($news_list))
@foreach($news_list as $news)
<div class="row pb-2 more-info border-bottom">
    <div class="col-md-4">
        <div class="">
            <img src="{!! asset('uploads/news/medium-'.$news->photo_url) !!}" alt="" class="img-fluid mb-1 img-thumbnail">
        </div>
    </div>
    <div class="col-md-8">
        <div class="">
            <h6 class="mb-1">{{ __($news->title_translation) }}</h6>
            <p class="mb-2">
                {!! $news->{langdb('summary')}!!}...
                <a href="{!! URL::to('news', $news->slug) !!}"> {{ __('label.readmore', [], $currentLanguage->locale) }} <i class="fa fa-arrow-circle-right"></i></a></p>
                <p class="date mb-1">{{ __('label.posted', [], $currentLanguage->locale) }}: <i class="fa fa-calendar"></i> {!! date('M d, Y', strtotime($news->created_at)) !!}</p>
            </div>
        </div>
    </div>
    @endforeach
    @else
    {{ label('lbl_no_information')}}

    @endif

    
    @stop
    <!-- ./page content section -->





















