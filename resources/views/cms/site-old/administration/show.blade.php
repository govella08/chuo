@extends('site.layout')
@section('title')

        {!! __('label.biography') !!}

@endsection

@section('content')
<?php $local=$currentLanguage->locale; ?>
<div class="main-content-wrapper div-match-height-slider-bio">
    <div class="single-news-main-content-wrapper">
        <div class="main-content div-match-height">
            <h1 class="title-decoration">{!! $administration->fullname !!}</h1>
            <img src="{{  url('/uploads/administration/medium-'.$administration->photo_url) }}" alt="News Image" class="img-responsive">
            <span class="date"> <i class="icon icon-calendar"></i><strong>{!! date('M, d Y', strtotime($administration->created_at)) !!}</strong></span>
            <p>{!! __($administration->content_translation) !!}</p>
        </div>
        <!-- Sidebar-content-wrapper -->
    </div>
</div>
<!-- /.main-content-wrapper -->
<!--/END MAIN CONTENT-->
   <!--START MIN FOOTER-->
@stop

