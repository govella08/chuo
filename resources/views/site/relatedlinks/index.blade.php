@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
    {!! __('label.related_links', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
    {!! __('label.related_links', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
    <li class="breadcrumb-item active">{!! __('label.related_links', [], $currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="more-howdoi">
    <ul class="list-unstyled px-3 ">
        @forelse($related_links as $links)
        
        <li>
            <a href="{!! $links->url !!}" target="_blank">
                <i class="fa fa-angle-double-right"></i>
                {!! __($links->title_translation) !!}
            </a>
        </li>

        @empty
            {!! label('lbl_no_information') !!}
        @endforelse
        
    </ul>
</div>
@stop
<!-- ./page content section -->





















