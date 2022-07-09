@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
 {{ __('label.events', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
 {!! __($event->title_translation) !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active"> {{ __('label.events', [], $currentLanguage->locale) }} </li>
@endsection


<!-- page content section -->
@section('page-content')

<table class="table table-hover table-bordered table-striped">
  <tbody>
    <tr>
      <th>{{ __('label.location', [], $currentLanguage->locale) }}</th>
      <td>
        <p>
          {{ $event->location }}
        </p>
      </td>
    </tr>

    <tr>
      <th>{{ __('label.tbl_date', [], $currentLanguage->locale) }}</th>
      <td>
        <p>
          {{ $event->start_date }} - {{ $event->end_date }}
        </p>
      </td>
    </tr>

    <tr>
      <th>{{ __('label.duration', [], $currentLanguage->locale) }}</th>
      <td>
        <p>
          {{ $event->start_time }} - {{ $event->end_time }}
        </p>
      </td>
    </tr>

    @if(!empty($event->objectives))
    <tr>
      <th>{{ __('label.objectives', [], $currentLanguage->locale) }}</th>
      <td>
        <p> {!! $event->objectives !!}</p>
      </td>
    </tr>
    @endif
    @if(!empty($event->description_en))
    <tr>
      <th>{{ __('label.contents', [], $currentLanguage->locale) }}</th>
      <td>
        <p>
          {!! $event->{langdb('description')} !!}
        </p>
      </td>
    </tr>
    @endif
    @if(!empty($event->participants))
    <tr>
      <th>{{ __('label.participants', [], $currentLanguage->locale) }}</th>
      <td>
        <p>
          {!! $event->participants !!}
        </p>
      </td>
    </tr>
    @endif
    @if(!empty($event->fee))
    <tr>
      <th>{{ __('label.event_fee', [], $currentLanguage->locale) }}</th>
      <td>
        <p>
          {!! $event->fee !!}
        </p>
      </td>
    </tr>
    @endif
    @if(!empty($event->infophone))
    <tr>
      <th>{{ __('label.phone', [], $currentLanguage->locale) }}</th>
      <td>
        <p>
          {!! $event->infophone !!}
        </p>
      </td>
    </tr>
    @endif
    @if(!empty($event->infoemail))
    <tr>
      <th>{{ __('label.email', [], $currentLanguage->locale) }}</th>
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
          <img style="width:600px;height:5%;" src="{!! asset($event->flier) !!}" alt="{!! __($event->title_translation) !!}" class="img-responsive">
        </p>
        <?php break;

        case "png":?>
        <p>
          <img style="width:600px;height:5%;" src="{!! asset($event->flier) !!}" alt="{!! __($event->title_translation) !!}" class="img-responsive">
        </p>

        <?php  break;

        case "pdf":?>
        <th>{{ label('lbl_download')}}</th>
        <td>
          <p>
            <a href="{!! asset($event->flier) !!}"><i class="icon icon-clip"></i> &nbsp; {{ __('label.download', [], $currentLanguage->locale) }}</a>
          </p>
        </td>
        <?php  break;
      }
      ?>

    </tr>
    @endif
  </tbody>
</table>

@stop
<!-- ./page content section -->