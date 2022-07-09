@extends('site.layout')
@section('title')

 {{ __('label.events')}}

@endsection

 @section('content')
 <?php $local=$currentLanguage->locale; ?>
  <!-- CONTENT BLOCK HERE -->
  <section class="main-content mb-2">
      <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb py-0 mb-2">
              <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">{!! __('label.events') !!}</li>
          </ol>
      </nav>
      <div class="content-border">

         
              @include('site.includes.left-sidebar')
          

          <div class="sub-main-content js-sub-main-height">
              <div class="row">
                  <div class="col-md-12">
                      <h4 class="title-decoration py-2 mb-3"> {!! __($event->title_translation) !!}</h4>
                      <div class="">
                          <table class="table table-hover table-bordered table-striped">
                              <tbody>
                              <tr>
                                  <th>{{ __('label.location') }}</th>
                                  <td>
                                      <p>
                                          {{ __($event->location_translation) }}
                                      </p>
                                  </td>
                              </tr>

                              <tr>
                                  <th>{{ __('label.tbl_date') }}</th>
                                  <td>
                                      <p>
                                          {{ $event->start_date }} - {{ $event->end_date }}
                                      </p>
                                  </td>
                              </tr>

                              <tr>
                                  <th>{{ __('label.duration') }}</th>
                                  <td>
                                      <p>
                                          {{ $event->start_time }} - {{ $event->end_time }}
                                      </p>
                                  </td>
                              </tr>

                              @if(!empty(__($event->objectives_translation)))
                                  <tr>
                                      <th>{{ __('label.objectives')}}</th>
                                      <td>
                                          <p> {!! __($event->objectives_translation) !!}</p>
                                      </td>
                                  </tr>
                              @endif
                              @if(!empty(__($event->description_translation)))
                                  <tr>
                                      <th>{{ __('label.contents') }}</th>
                                      <td>
                                          <p>
                                              {!! __($event->description_translation) !!}
                                          </p>
                                      </td>
                                  </tr>
                              @endif
                              @if(!empty(__($event->participants_translation)))
                                  <tr>
                                      <th>{{ __('label.participants')}}</th>
                                      <td>
                                          <p>
                                              {!! __($event->participants_translation) !!}
                                          </p>
                                      </td>
                                  </tr>
                              @endif
                              @if(!empty($event->fee))
                                  <tr>
                                      <th>{{ __('label.event_fee')}}</th>
                                      <td>
                                          <p>
                                              {!! $event->fee !!}
                                          </p>
                                      </td>
                                  </tr>
                              @endif
                              @if(!empty($event->infophone))
                                  <tr>
                                      <th>{{ __('label.phone')}}</th>
                                      <td>
                                          <p>
                                              {!! $event->infophone !!}
                                          </p>
                                      </td>
                                  </tr>
                              @endif
                              @if(!empty($event->infoemail))
                                  <tr>
                                      <th>{{ __('label.email')}}</th>
                                      <td>
                                          <p>
                                              {!! $event->infoemail !!}
                                          </p>
                                      </td>
                                  </tr>
                              @endif

                              @if(!empty($event->flier))
                                  <tr>


                                      <?php
                                      $file_parts = pathinfo($event->flier);

                                      switch($file_parts['extension'])
                                      {
                                      case "jpg":?>
                                      <p>
                                          <img style="width:600px;height:5%;" src="{!! asset($event->flier) !!}" alt="{!! $event->{langdb('title')} !!}" class="img-responsive">
                                      </p>
                                      <?php break;

                                      case "png":?>
                                      <p>
                                          <img style="width:600px;height:5%;" src="{!! asset($event->flier) !!}" alt="{!! $event->{langdb('title')} !!}" class="img-responsive">
                                      </p>

                                      <?php  break;

                                      case "pdf":?>
                                      <th>{{ __('label.download')}}</th>
                                      <td>
                                          <p>
                                              <a href="{!! asset($event->flier) !!}"><i class="icon icon-clip"></i> &nbsp; {{ __('label.download') }}</a>
                                          </p>
                                      </td>
                                      <?php  break;
                                      }
                                      ?>

                                  </tr>
                              @endif
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
      <!--/sub-main-content -->

  </section>

@stop
















