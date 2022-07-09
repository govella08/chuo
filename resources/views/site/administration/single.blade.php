@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
    {{ __('label.management', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
    {!! $administration->fullname !!}, 
    {{ __($administration->title_translation) }}

@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item">{{ __('label.administration', [], $currentLanguage->locale) }}</li>
<li class="breadcrumb-item"><a href="{{ url('administration',$administration->category_id) }}">{{ __('label.management', [], $currentLanguage->locale) }}</a></li>
<li class="breadcrumb-item active">{!! $administration->fullname !!}</li>
@endsection

@section('sidebar')
@stop

<!-- page content section -->
@section('page-content')
<div class="biography">

    @if (count($administration))
    <div class="media"> 
        <div class=" text-center p-2 mr-2">
            <div class="img-thumbnail p-1">
                <img class="card-img-top mb-3" src="{{  url('/uploads/administration/medium-'.$administration->photo_url) }}" alt="{!! $administration->fullname !!}">
                <hr>
                <h6 class="card-title mb-1"> {{ __($administration->title_translation) }} </h6>
                <h6 class="card-title mb-1">{!! $administration->fullname !!}</h6>
            </div>
        </div>
        <div class="media-body ">
            {!! __($administration->content_translation) !!}
        </div>
    </div>
    @endif
</div>
@stop
<!-- ./page content section -->