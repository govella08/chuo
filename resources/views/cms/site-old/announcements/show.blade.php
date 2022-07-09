@extends('site.layout')
@section('title')

{!! __('label.announcements') !!}

@endsection

@section('content')
<?php $local=$currentLanguage->locale; ?>
<!-- CONTENT BLOCK HERE -->
<section class="main-content mb-2">
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb py-0 mb-2">
			<li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
			<li class="breadcrumb-item active" aria-current="page">{!! __('label.announcements') !!}</li>
		</ol>
	</nav>
	<div class="content-border">

	
      @include('site.includes.left-sidebar')
    

		<div class="sub-main-content js-sub-main-height">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-decoration py-2 mb-3"> {!! __($announcement->name_translation) !!}</h3>
					@if($announcement)
					<div>
						<p class="date float-right mb-1">{{ __('label.posted') }}: <i class="fa fa-calendar"></i> {!! date('M d, Y',strtotime($announcement->created_at)) !!}</p>
					</div><br>
					<div class="news-content">
						{!! __($announcement->content_translation) !!}
					</div>
				</div>

				@else
				{!! __('label.no_information') !!}
				@endif
				<!--/sub-main-content -->
			</div>
		</div>
	</div>
	<!--/sub-main-content -->

</section>

@stop

















