@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{{ __('label.video_gallery', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{{ __('label.video_gallery', [], $currentLanguage->locale) }}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item"> {{ __('label.media_center', [], $currentLanguage->locale) }} </li>
<li class="breadcrumb-item active"> {{ __('label.video_gallery', [], $currentLanguage->locale) }} </li>
@endsection


<!-- page content section -->
@section('page-content')
@if(count($videos))
@foreach($videos as $video)

<!-- video block -->
<div class="row border-bottom mr-2">
  <div class="col-md-4"> 
    <div class="video-container  mb-2 ">
      <iframe  src="https://www.youtube.com/embed/{!! utube_hash($video->url) !!}" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen"  msallowfullscreen="msallowfullscreen"  oallowfullscreen="oallowfullscreen"  webkitallowfullscreen="webkitallowfullscreen"></iframe>
    </div>
  </div>
  <div class="col-md-8">
    <div class="">
      <h6 class="mb-1"> {!! __($video->title_translation) !!} </h6>
      <p class="mb-1"> {!! __($video->content_translation) !!} </p>
      <p class="date"> {{ __('label.posted', [], $currentLanguage->locale) }}: <i class="fa fa-calendar-alt"></i> {!! date('M d, Y', strtotime($video->created_at)) !!}</p>
    </div>
  </div>                     
</div>
<!-- ./video block -->


@endforeach
@else
<div class="text-center">
  <span class="badge badge-danger">
    {!! label('lbl_no_information') !!}
  </span>
</div>
@endif


<!-- ********************************************** Pagination **********************************************   -->
<nav aria-label="Page navigation" class="nav-pagination">
  <ul class="pagination">
   {!! $videos->render() !!}
 </ul>
</nav>
<!-- ********************************************** Pagination **********************************************   -->
@stop
<!-- ./page content section -->















