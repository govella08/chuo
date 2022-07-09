@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
  {!! __('label.events', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.events', [], $currentLanguage->locale) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.events', [], $currentLanguage->locale) !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<div class="events">

  @forelse($events as $event)
  <div class="more-info mb-3">
    <h6 class="mb-1">{!! __($event->title_translation) !!}</h6>
    <p class="card-text mb-2">
      {!! str_limit($event->{langdb('description')},200) !!}
      <a href="{!! URL::to('events', $event->slug) !!}">{{ __('label.readmore', [], $currentLanguage->locale) }} <i class="fa fa-arrow-circle-right"></i></a>
    </p>
    <div class="clearfix mb-1">
      <span class="date float-right"><i class="fa fa-calendar"></i>{{ date('d', strToTime($event->start_date)) }}<sup>{{ date('S', strToTime($event->start_date)) }}</sup> {{ date('M Y', strToTime($event->start_date)) }}</span>
      <span class="date float-left"><i class="fa fa-map-marker"></i> {{ $event->location }}</span>
    </div>
  </div>
  @empty
  {{ __('label.no_information', [], $currentLanguage->locale) }}
  @endforelse

</div>
@stop
<!-- ./page content section -->