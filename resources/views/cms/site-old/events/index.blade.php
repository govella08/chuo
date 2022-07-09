@extends('site.layout')
@section('title')

{!! __('label.events') !!}

@endsection

 @section('content')

<?php $local=$currentLanguage->locale; ?>



  <!-- CONTENT BLOCK HERE -->
   <section class="main-content mb-2">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">{!! __('label.events') !!}</li>
        </ol>
    </nav>
    <div class="content-border">

              @include('site.includes.left-sidebar')
          

          <div class="sub-main-content js-sub-main-height">
              <div class="row">
                  <div class="col-md-12">
                      <h4 class="title-decoration py-2 mb-3"> {!! __('label.events') !!}</h4>
                      <div class="events">

                          @if(count($events))
                              @foreach($events as $event)
                                  <div class="more-info mb-3">
                                      <h6 class="mb-1">{{ __($event->title_translation) }}</h6>
                                      <p class="card-text mb-2">
                                          {!! str_limit(__($event->description_translation),200) !!}
                                          <a href="{!! URL::to('events', $event->slug) !!}">{{ __('label.readmore') }} <i class="fa fa-arrow-circle-right"></i></a>
                                      </p>
                                      <div class="clearfix mb-1">
                                          <span class="date float-right"><i class="fa fa-calendar"></i>{{ date('d', strToTime($event->start_date)) }}<sup>{{ date('S', strToTime($event->start_date)) }}</sup> {{ date('M Y', strToTime($event->start_date)) }}</span>
                                          <span class="date float-left"><i class="fa fa-map-marker"></i> {{ $event->location }}</span>
                                      </div>
                                  </div>
                              @endforeach
                          @else
                              {{ __('label.no_information')}}
                          @endif
                      </div>
                      </div>
                  </div>
              </div>



          </div>
      
<!--/sub-main-content -->

</section>

@stop


















