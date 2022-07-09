@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.welcome_note', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.welcome_note', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.welcome_note', [], $currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="biography">

    <div class="row"> 
        <div class="col-md-3">
            <div class="card text-center p-2">
                <div class="card-body p-1">
                    <img class="card-img-top mb-3 img-thumbnail" src="{!! asset($biography->photo_url) !!}" alt="{!! __($biography->salutation,[],$currentLanguage->locale) !!} {!! $biography->name !!}" alt="Photo">

                    <h6 class="card-title mb-1">{!! __($biography->title_translation) !!}</h6>
                    <h6 class="card-title mb-1 text-small">{!! __($biography->salutation_translation) !!} {!! $biography->name !!}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            {!! __($biography->content) !!}
        </div>
    </div>
</div>
@stop
<!-- ./page content section -->


