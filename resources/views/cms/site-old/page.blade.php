@extends('site.layout')
@section('title')
	@if(curlang() == '_sw')
		{!! $page->{langdb('title')} !!}
	@else
		{!! $page->{langdb('title')} !!}
	@endif
@endsection
@section('content')
<?php $local=$currentLanguage->locale; ?>
	<section class="main-content mb-2">
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb py-0 mb-2">
				<li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">{!! $page->{langdb('title')} !!}</li>
			</ol>
		</nav>
		<div class="content-border">

			
				@include('site.includes.left-sidebar')
			

			<div class="sub-main-content js-sub-main-height">
				<div class="row">
					<div class="col-md-12">
						{{--<h4 class="title-decoration py-2 mb-3"> Single Page</h4>--}}
						<div>
							@yield('page-content')
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/sub-main-content -->

	</section>

@stop