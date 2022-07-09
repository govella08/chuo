@extends('site.layout')
@section('title')
{!! __('label.home') !!}
@endsection

@section('content')

<div class="home-page">
	<section class="slider">
		<div class="container pt-2">
			<div class="row">
				@if($biography)
				<div class="col-md-3">
					<div class="text-center">
						@if($biography)
						<img src="{{ asset($biography->photo_url) }}" style="height: 220px; width: 190px;" alt="Profile" class="img-fluid img-thumbnail mx-auto d-block rounded-circle">

						<h5>{!! __($biography->salutation) !!} {{ $biography->name }}</h5>
						<h6>{!! __($biography->title) !!}</h6>
						@if($welcome)
						<a href="{{ url('biography',$biography->slug) }}" class="btn btn-outline-success btn-sm" style="    width: 75%;
						border-radius: 30px;"><i class="fa fa-book"></i> {{ __('label.biography', [], $currentLanguage->locale) }}</a>
						@endif
					</div>
					<div>
						<hr>
						<h5 class="text-center"><b><i class="fa fa-handshake"></i> {{__('label.welcome_note') }}</b></h5>
						<hr>
						<div class="text-justify">

							{!! str_limit(strip_tags(__($welcome->content)),120) !!} <a href="{{ url('welcome',$welcome->slug)}}"><i class="fa fa-angle-double-right"></i> {{ __('label.readmore') }}...</a>
						</div>
					</div>
					@endif
				</div>
				@endif
				<div class="{{ ($biography)?'col-md-9':'col-md-12' }}">
					<div id="home-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="7000">
						<div class="carousel-inner">
							@if(count($slideshow))
							<?php $num = 1; ?>
							@foreach($slideshow as $photo)
							<div class="carousel-item img-thumbnail <?php if($num == 1) { echo 'active'; } ?>">
								<img class="d-block w-100" height="440"  alt="{!! __($photo->title_translation) !!}" src="{!! asset($photo->image()) !!}">
								<div class="carousel-caption d-none d-md-block">
									<a href="#" class="btn btn-custom">{{ __($photo->title, [], $currentLanguage->locale) }}</a>
								</div>
							</div>
							<?php $num++; ?>
							@endforeach
							@endif
						</div>

						<a class="carousel-control-prev" href="#home-carousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">{!! __('label.prev', [], $currentLanguage->locale) !!}</span>
						</a>
						<a class="carousel-control-next" href="#home-carousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">{!! __('label.next', [], $currentLanguage->locale) !!}</span>
						</a>
					</div>
				</div>
			</div>
			
		</div>
	</section>

	<section class="welcome-note">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="card pb-3">
						<div class="card-header">
							<h5><i class="fa fa-bell"></i>{{ __('label.announcements', [], $currentLanguage->locale) }}</h5>
						</div>
						

						<ul class="list-unstyled text-justify list-group flush mb-3">
							@foreach($announcements as $announcement)
							<li class="list-group-item">
								<a href="{{ url('announcements', $announcement->slug)}}" class="link"><i class="fa fa-angle-double-right"></i>{!! __($announcement->name_translation, [], $currentLanguage->locale) !!}</a>
							</li>
							@endforeach
						</ul>
						<div class="text-center">
							<a href="{{ url('announcements') }}" class="btn btn-outline-success btn-sm">{!! __('label.more_announcements') !!}</a>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					


					<!-- services -->
					
					<hr style="margin-top: 0px;">
					<h5 class="text-center"><b>{!! __('label.our_services', [], $currentLanguage->locale) !!}</b></h5>
					<hr>
					<div class="services">
						<div class="services-list row justify-content-center">
							<!-- service -->
							@forelse($services as $key => $service)
							<?php if($key > 1) continue; ?>
							<div href="{{ url('services/'.$service->slug) }}" class="services-list-item col p-0">
								<img class="img-fluid w-100" src="{{ asset('uploads/services/medium-'.$service->photo_url) }}" alt="service">

								<div class="services-list-item-overlay px-3 d-flex flex-column">
									<h5 class="py-3"> {{ __($service->title_translation) }} <i class="ml-3 fas fa-long-arrow-alt-right"></i></h5>
									<p>{!! str_limit(__($service->summary_translation), 100) !!}</p>

									<div class="mt-auto align-self-center mb-4">
										<a class="btn btn-custom" href="{{ url('services/'.$service->id) }}"> View Details </a>
									</div>
								</div>
							</div>
							@empty
							{{ __('label.no_information') }}
							@endforelse
							<!-- ./service -->

						</div>
					</div>
					<hr>
					<div class="text-center">
						<a href="{{ url('services') }}" class="btn btn-success btn-sm">View More Services</a>
					</div>

					<!-- ./services -->
				</div>
				<div class="col-md-3 ">
					<div class="card card-primary">
						<div class="card-header text-white bg-primary">
							<h5><i class="fa fa-tint"></i> {!! __('label.water_service') !!}</h5>
						</div>
						


						<ul class="list-unstyled text-justify list-group flush">
							<li class="list-group-item">
								<a href="{{ url('online_services/new_water_connection') }}" class="link"><i class="fa fa-angle-double-right"></i> {!! __('label.water_connection_application') !!}</a>
							</li>
							<li class="list-group-item">
								<a href="{{ url('online_services/bill_registration') }}" class="link"><i class="fa fa-angle-double-right"></i> {!! __('label.bill_registration') !!}</a>
							</li>
							<li class="list-group-item">
								<a href="{{ url('online_services/bill_request') }}" class="link"><i class="fa fa-angle-double-right"></i> {!! __('label.bill_request') !!}</a>
							</li>
							<li class="list-group-item">
								<a href="{{ url('online_services/customer_account_activation') }}" class="link"><i class="fa fa-angle-double-right"></i> {!! __('label.customer_account_activation') !!}</a>
							</li>
							<li class="list-group-item">
								<a href="{{ url('online_services/change_account_password') }}" class="link"><i class="fa fa-angle-double-right"></i> {!! __('label.change_account_password') !!}</a>
							</li>
							<li class="list-group-item">
								<a href="{{ url('online_services/report_issue') }}" class="link"><i class="fa fa-angle-double-right"></i> {!! __('label.report_issue') !!}</a>
							</li>

						</ul>

						
					</div> 
					
				</div>
			</div>
			


		</div>
	</section>
	
	<section class="news-section mb-5">
		<div class="container">
			<!-- news and events -->
			<div class="row mt-5 ">
				<div class="col-md-6">
					<h3><i class="fa fa-newspaper"></i> {{ __('label.news', [], $currentLanguage->locale) }}</h3>
					<hr>
					<div class="media-list pr-2">

						@forelse($news as $news1)
						<a href="{{ url('news', $news1->slug) }}" class="link">
							<div class="media">
								<img src="{{ asset('uploads/news/thumb-'.$news1->photo_url) }}" alt="" class="img-thumbnail mr-2">
								<div class="date mr-2">
									<div class="m text-center">{{ date('M',strtotime($news1->created_at)) }}</div>
									<div class="d">{{ date('d',strtotime($news1->created_at)) }} <sup>{{date('S',strtotime($news1->created_at)) }}</sup></div>
								</div>
								<div class="media-body text-justify">
									<h5>{!! str_limit(__($news1->title_translation), 35) !!}</h5>
									<p>{!! strip_tags(str_limit(__($news1->summary_translation), 100)) !!}</p>
								</div>
							</div>
						</a>
						@empty
						{{ __('label.no_information', [], $currentLanguage->locale) }}
						@endforelse

						<div class="text-center mt-3">
							<a href="{{ url('/news') }}" class="btn btn-outline-success btn-sm">{!! __('label.more_news') !!}</a>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<h3><i class="fa fa-calendar-alt"></i> {{ __('label.events', [], $currentLanguage->locale) }}</h3>
					<hr>
					<div class="media-list pl-2">
						@if($events->count())
						@foreach($events as $event)
						<a href="{{ url('events', $event->slug) }}" class="link">
							<div class="media">

								<div class="date mr-2">
									<div class="m text-center">{{ date('M',strtotime($event->created_at)) }}</div>
									<div class="d">{{ date('d',strtotime($event->created_at)) }} <sup>{{date('S',strtotime($event->created_at)) }}</sup></div>
								</div>
								<div class="media-body text-justify">
									<h5>{!! str_limit(__($event->title_translation), 35) !!}</h5>
									<p>{!! strip_tags(str_limit(__($event->description_translation), 100)) !!}</p>
								</div>
							</div>
						</a>
						@endforeach
						@endif

						<div class="text-center mt-3">
							<a href="{{ url("/events") }}" class="btn btn-outline-success btn-sm">{!! __('label.more_events') !!}</a>
						</div>
					</div>
				</div>
			</div>
			<!-- ./news and events -->
		</div>
	</section>
</div>

@stop
@section('script')
<script>

</script>
@endsection