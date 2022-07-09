@extends('site.layout')
@section('title')

{!! __('label.home') !!}

@endsection

@section('content')
<?php $local=$currentLanguage->locale; ?>

<div class="home-page">
	<section class="slider">
		<div class="container pt-2">
			<div id="home-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="50000">
				<div class="carousel-inner">
					@if(count($slideshow))
					<?php $num = 1; ?>
					@foreach($slideshow as $photo)
					<div class="carousel-item img-thumbnail <?php if($num == 2) { echo 'active'; } ?>">
						<img class="d-block w-100" alt="{!! __($photo->title_translation) !!}" src="{!! asset($photo->image('large')) !!}">
						<div class="carousel-caption d-none d-md-block">
							<a href="#" class="btn btn-custom">{{ __('label.welcome_note', [], $local) }}</a>
						</div>
					</div>
					<?php $num++; ?>
					@endforeach
					@endif
				</div>

				<a class="carousel-control-prev" href="#home-carousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">{!! __('label.prev', [], $local) !!}</span>
				</a>
				<a class="carousel-control-next" href="#home-carousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">{!! __('label.next', [], $local) !!}</span>
				</a>
			</div>
		</div>
	</section>

	<section class="welcome-note">
		<div class="container">
			<div class="row">
				
				<div class="col-md-9">
					<!-- profile and welcome note -->
					<div class="row">
						<?php $biography;
						if($biographies->count()>0){
							$biography = $biographies->shift();
						}
						?>
						
						<div class="col-md-4">
							<div class="text-center">
								@if($biography)
								<img src="{{ asset($biography->photo_url) }}" width="180" alt="Profile" class="img-fluid img-thumbnail mx-auto d-block rounded-circle">

								<h5>{!! __($biography->salutation_translation) !!} {{ $biography->name }}</h5>
								<h6>{!! __($biography->title_transalation) !!}</h6>
								@if($welcome)
								<a href="biography.html" class="btn btn-outline-success btn-sm">{{ __('label.welcome_note', [], $local) }}</a>
								@endif
							</div>
							@endif
						</div>

						<div class="col-md-8 pr-3">
							<h3><b><i class="fa fa-handshake"></i> Welcome to DAWASA</b></h3>
							<hr>
							<div class="text-justify">

								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quo reprehenderit explicabo at rerum consequatur, delectus officia dolorem? Fugit rerum hic sunt ea, optio culpa, nobis qui alias aspernatur ipsa, placeat minus reiciendis facere at doloribus aliquid nihil nisi repellendus eum cum praesentium aut asperiores! Odio veniam maxime inventore pariatur </p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos repellat esse nulla eligendi sed temporibus facilis nesciunt animi sunt consequatur similique accusantium minima fugiat, veritatis a deserunt recusandae sequi commodi, autem provident aut dolores! Labore delectus sequi libero assumenda mollitia!</p>
							</div>
						</div>
						
					</div>
					<!-- ./profile and welcome note -->

					<!-- services -->
					<div class="row mt-5 pt-5">
						<div class="col-md-12">
							<h3 class="text-center"><b>{!! __('label.our_services', [], $local) !!}</b></h3>
							<hr>
							<div class="services">
								<div class="services-list row">
									<!-- service -->
									<div href="water-supply-services.html" class="services-list-item col p-0">
										<img class="img-fluid w-100" src="http://placeimg.com/300/250/animal/1" alt="service">

										<div class="services-list-item-overlay px-3 d-flex flex-column">
											<h5 class="py-3">Water Supply Service <i class="ml-3 fas fa-long-arrow-alt-right"></i></h5>
											<p>Improve product quality and speed up your time-to-market with</p>

											<div class="mt-auto align-self-center mb-4">
												<a class="btn btn-custom" href="service.html"> View Details </a>
											</div>
										</div>
									</div>
									<!-- ./service -->
									<!-- service -->
									<div href="service.html" class="services-list-item col p-0">
										<img class="img-fluid w-100" src="http://placeimg.com/300/250/nature/5" alt="service">

										<div class="services-list-item-overlay px-3 d-flex flex-column">
											<h5 class="py-3">Water Sanitation Service <i class="ml-3 fas fa-long-arrow-alt-right"></i></h5>
											<p>Improve product quality and speed up your time-to-market with</p>

											<div class="mt-auto align-self-center mb-4">
												<a class="btn btn-custom" href="service.html"> View Details </a>
											</div>
										</div>
									</div>
									<!-- ./service -->
									<!-- service -->
									<div href="service.html" class="services-list-item col p-0">
										<img class="img-fluid w-100" src="http://placeimg.com/300/250/nature/2" alt="service">

										<div class="services-list-item-overlay px-3 d-flex flex-column">
											<h5 class="py-3">Customer Service <i class="ml-3 fas fa-long-arrow-alt-right"></i></h5>
											<p>Improve product quality and speed up your time-to-market with</p>

											<div class="mt-auto align-self-center mb-4">
												<a class="btn btn-custom" href="service.html"> View Details </a>
											</div>
										</div>
									</div>
									<!-- ./service -->

								</div>
							</div>
							<hr>
							<div class="text-center">
								<a href="more-services.html" class="btn btn-success btn-sm">View More Services</a>
							</div>
						</div>
					</div>
					<!-- ./services -->
				</div>
				<div class="col-md-3 ">
					<div class="card card-primary">
						<div class="card-header text-white bg-primary">
							<h5><i class="fa fa-tint"></i> Water Services</h5>
						</div>
						


						<ul class="list-unstyled text-justify list-group flush">
							<li class="list-group-item">
								<a href="{{ url('services/new_water_connection') }}" class="link"><i class="fa fa-angle-double-right"></i> New Water Connection Application</a>
							</li>
							<li class="list-group-item">
								<a href="online-bill-registration.html" class="link"><i class="fa fa-angle-double-right"></i> Online Bill Registration</a>
							</li>
							<li class="list-group-item">
								<a href="online-customer-activation.html" class="link"><i class="fa fa-angle-double-right"></i> Online Customer Account Activation</a>
							</li>
							<li class="list-group-item">
								<a href="password-change.html" class="link"><i class="fa fa-angle-double-right"></i> Change Account Password</a>
							</li>
							<li class="list-group-item">
								<a href="report-issue.html" class="link"><i class="fa fa-angle-double-right"></i> Report Issue</a>
							</li>

						</ul>

						
					</div> <br>
					<div class="card pb-3">
						<div class="card-header">
							<h5><i class="fa fa-bell"></i>{{ __('label.announcements', [], $local) }}</h5>
						</div>
						

						<ul class="list-unstyled text-justify list-group flush mb-3">
							@foreach($announcements as $announcement)
							<li class="list-group-item">
								<a href="{{ url('announcements', $announcement->slug)}}" class="link"><i class="fa fa-angle-double-right"></i>{!! __($announcement->name_translation, [], $local) !!}</a>
							</li>
							@endforeach
						</ul>
						<div class="text-center">
							<a href="more-announcements.html" class="btn btn-outline-success btn-sm">More Announcements</a>
						</div>
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
					<h3><i class="fa fa-newspaper"></i>{{ __('label.news', [], $local) }}</h3>
					<hr>
					<div class="media-list pr-2">
						@if($news->count())
						@foreach($news as $news1)
						<a href="{{ url('news', $news1->slug) }}" class="link">
							<div class="media">
								<img src="{{ asset('uploads/news/thumb-'.$news1->photo_url) }}" alt="" class="img-thumbnail mr-2">
								<div class="date mr-2">
									<div class="m">sep</div>
									<div class="d">30</div>
								</div>
								<div class="media-body text-justify">
									<h5>{!! str_limit(__($news1->title_translation), 35) !!}</h5>
									<p>{!! strip_tags(str_limit(__($news1->summary_translation), 100)) !!}</p>
								</div>
							</div>
						</a>
						@endforeach
						@endif

						<div class="text-center mt-3">
							<a href="all-news.html" class="btn btn-outline-success btn-sm">View More News</a>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<h3><i class="fa fa-calendar-alt"></i>{{ __('label.events', [], $local) }}</h3>
					<hr>
					<div class="media-list pl-2">
						@if($events->count())
						@foreach($events as $event)
						<a href="{{ url('news', $event->slug) }}" class="link">
							<div class="media">

								<div class="date mr-2">
									<div class="m">sep</div>
									<div class="d">30</div>
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
							<a href="all-events.html" class="btn btn-outline-success btn-sm">View More Events</a>
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