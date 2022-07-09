@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
  {{ __('label.announcements', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
  {{ __('label.announcements', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active"> {{ __('label.announcements', [], $currentLanguage->locale) }} </li>
@endsection


<!-- page content section -->
@section('page-content')
@if(count($announcements))
@foreach($announcements as $announcement)
<div>
  <div class="pb-2 more-info">
    <h6 class="mb-1">{!! __($announcement->name) !!}</h6>
    <p class="mb-2">{!! str_limit(__($announcement->content),120) !!}...
      <a href="{!! url('announcements/'.$announcement->slug)!!}">
        {{ __('label.readmore', [], $currentLanguage->locale) }}
        <i class="fa fa-arrow-circle-right"></i>
      </a>
    </p>
    <p class="date mb-1">
      {{ __('label.posted', [], $currentLanguage->locale) }}:
      <i class="fa fa-calendar"></i>
      {!! date('M d, Y',strtotime($announcement->created_at)) !!}
    </p>
  </div>
</div>
@endforeach

@else
{!! __('label.no_information', [], $currentLanguage->locale) !!}
@endif



<nav aria-label="Page navigation" class="nav-pagination">

  {!!  $announcements->render() !!}

</nav>
@stop
<!-- ./page content section -->