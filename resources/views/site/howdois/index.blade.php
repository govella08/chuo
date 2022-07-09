@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.how_doi', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
 {!! __('label.how_doi', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.how_doi', [], $currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="more-howdoi">
    <ul class="list-unstyled px-3 ">
        @if(count($howdois))
        @foreach ($howdois as $how)
        <li class="pb-1">
            <a href="{!! url('howdois/show/'.$how->slug) !!}">
                <i class="fa fa-arrow-right"></i>
                {!! __($how->title_translation) !!}
            </a>
        </li>
        @endforeach
        @else
        {!! __('label.no_information', [], $currentLanguage->locale) !!}
        @endif
    </ul>
</div>
@stop
<!-- ./page content section -->
























