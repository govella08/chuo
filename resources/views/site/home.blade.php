@extends('site.layout')
@section('title')
    {!! __('label.home') !!}
@endsection

@section('content')

    <div class="content-layout">
        <div class="container clearfix">
            <!-- CONTENT BLOCK HERE -->

            <div class="home-page">
                <article class="slider">
                    <div class="row">


                        <div class="col-md-12">
                            <div id="home-carousel" class="carousel slide carousel-fade bs-0" data-ride="carousel"
                                 data-interval="7000">
                                <div class="carousel-inner">
                                    @if(count($slideshow))
                                        <?php $num = 1; ?>
                                        @foreach($slideshow as $photo)
                                            <div class="carousel-item <?php if ($num == 1) {
                                                echo 'active';
                                            } ?>">
                                                <img class="d-block w-100" alt="First slide [1125x400]"
                                                     src="{{ asset($photo->path.'large_' . $photo->filename) }}">
                                                <a class="carousel-caption d-none d-md-block" href="#">
                                                    {{ __($photo->content, [], $currentLanguage->locale) }}</a>
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
                </article>
                <article class="">
                    <div class="highlights bs-0 bg-light d-flex align-items-center">
                        <h5 class="skew py-1 px-3 m-0 mr-5">Highlights</h5>
                        <div class="py-1">
                            <!-- Note: limit number of words -->

                            @if($highlights)
                                <marquee behavior="scroll" direction="left" onmouseover="this.stop();"
                                         onmouseout="this.start();">
                                    @foreach($highlights as $highlight)
                                        <a class="mr-5" href="{{ url('highlights', $highlight->id) }}">
                                            <span class="text-black">
                                                {!! $highlight->title !!}:
                                            </span>
                                            {{ $highlight->content }}
                                        </a>
                                    @endforeach


                                    @endif

                                </marquee>
                        </div>
                    </div>
                </article>
                <article class="mt-4">
                    <div class="row mb-0">
                        <div class="col-md-4">
                            <div class="d-flex flex-column bg-light bs-0 jsHeight">
                                <h4 class="title-text py-3 bs-1 text-center">Welcome to {{ __('label.site_subtitle') }}</h4>
                                <div class="announcements pl-3 pr-2 mt-3">
                                    <div class="media border-bottom">
                                        <div class="media-body">
                                                
                                            <div class="mt-2"></div>
                                                
                                                   
                                            <div class="profile-body clearfix">
                                                <div class="card-profile float-md-left mr-3 mb-1 text-center">
                                                    <img class="card-img-top img-thumbnail" src="{{ asset($biography->photo_url) }}" alt="Card image cap">
                                                    <div class="card-body p-1">
                                                        <span class="" ><h6 class="card-title mb-1">{{ __($biography->title_translation) }}</h6></span> 
                                                        <h6 class="card-title mb-1">{{ __($biography->salutation_translation) }} {{ $biography->name }}</h6>
                                                        <!-- <a class="" href="biography.html">Biography </a> -->
                                                    </div>
                                                </div>
                                                <div class="d-md-inline text-justify">
                                                    <p> 
                                                        {!! str_limit(strip_tags(__($biography->content_translation)),210) !!}
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                                
                                        </div>

									</div>
                                    
								</div>
                                <div class="text-center mt-auto mb-2">
                                    <a class="btn btn-custom btn-sm" href="{{ url('biography',$biography->slug)}}">{{ __('label.readmore') }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="d-flex flex-column bg-light bs-0 jsHeight">

                                <h4 class="title-text py-3 bs-1 text-center"><i class="far fa-newspaper"></i> <strong>{{ __('label.news') }}</strong></h4>
                                <div class="pl-3 pr-2 mt-3">
                                    <div class="news mb-3">
                                        @forelse($news as $key => $newss)
                                            <div class="media border-bottom">
                                                <img class="mr-2 img-fluid" alt="[150x90]"
                                                     src="{{ asset("uploads/news/thumb-".$newss->photo_url) }}">
                                                <div class="media-body">
                                                    <div class="d-flex">
                                                        <div class="news-date">
                                                            <div class="date-dec">{{ date('d', strtotime($newss->created_at)) }}</div>
                                                            <div class="month-dec">{{ date('M', strtotime($newss->created_at)) }}</div>
                                                        </div>
                                                        <div>
                                                            <h6> {{ __($newss->title_translation) }}</h6>
                                                            <p> {!! str_limit( __($newss->summary_translation), 100) !!}
                                                                <a class="text-nowrap read-more" 
                                                                   href="{{ url('news/'.$newss->slug) }}">{{ __('label.readmore') }}</a>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @empty
                                            {{ __('label.no_information') }}
                                        @endforelse

                                    </div>
                                </div>
                                <div class="text-center mt-auto mb-2">
                                    <a class="btn btn-custom btn-sm"
                                       href="{{ url('news')}}">{{ __('label.view_more') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="my-4">
                    <div class="row mb-0">
                        <div class="col-md-4">
                            <div class="d-flex flex-column bg-light bs-0 jsHeight">
                                <h4 class="title-text py-3 bs-1 text-center"><i class="fas fa-bullhorn"></i> <strong>
                                {{ __('label.announcements')}}</strong></h4>
                                <div class="howdoi pl-3 pr-2 mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="list-unstyled">
                                                @forelse($announcements as $announcement)
                                                    <li class="mb-4 border-bottom">
                                                        <div class="pb-2 border-bottom">
                                                            <h6 class="mb-1">Title: {{ __($announcement->name_translation) }}</h6>
                                                                <p class="mb-2">{!! strip_tags(str_limit( __($announcement->content_translation), 50)) !!}
                                                                <a href="{{ url('announcements',$announcement->slug) }}">{{ __('label.readmore') }} <i
                                                        class="fa fa-arrow-circle-right"></i></a></p> 
                                                            <p class="date mb-1">{{ __('label.posted') }}: <i class="fas fa-calendar-alt"></i>
                                                            {{ date('F d, Y', strtotime($announcement->created_at)) }} </p>
                                                        </div>
                                                    </li>
                                                @empty
                                                    {{ __('label.no_information') }}
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-auto mb-2">
                                    <a class="btn btn-custom btn-sm" href="{{ url('announcements') }}">{{ __('label.view_more') }}</a>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-8">
							<div class="d-flex flex-column bg-light bs-0 jsHeight">
								<h4 class="title-text py-3 bs-1 text-center"> <i class="fas fa-clipboard-list"></i><strong>
										Programmes
									</strong></h4>
                                    <?php $for_new_row = 1; //not used so far
                                        $level_id = 55;
                                        $classrow = 0;
                                        $new_col = true;
										$row_level_name = "";
										$col_closer = 1;
										$row_open = 0;
                                        $classrownew = 99;
                                        $classrowold = 98;?>
                                    @forelse($programmes as $index => $programme)

										

                                        @if($level_id != $programme->level_id)
										
                                            @if(($classrow)%2 == 0)
                                            
                                                @if($classrow != $classrowold)

                                                    @if($index != 0)
                                                        </div>
                                                    @endif

                                                    <?php
                                                        $classrowold = $classrow;
                                                    ?>

                                                    <div class="row">
                                                @endif

                                            @endif

                                            <?php
                                                $level_id = $programme->level_id;
                                                    $classrow++;
                                            ?>
                                        @endif

                                        <?php $programme_name = App\Models\Programmes::level_name($programme->level_id); ?> 
                                        @if($row_level_name != $programme_name)
											
											@if($index != 0)
												    </div>
                                                </div>
                                            @endif

                                            <div class="col-md-6">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item text-center tit "> {{ $programme_name }} </a>
                                                    <?php $row_level_name = $programme_name; ?>
                                        @endif
                                                <a href="{{ url('programmes',$programme->slugy) }}" class="list-group-item"><i class="fas fa-chevron-circle-right"></i>
                                                {{ __($programme->name_translation) }}</a>
                                        
										@empty
											{{ __('label.no_information') }}
										@endforelse
										
                                       
                                        
										
								
									<!-- 2 divs are special -->
												</div>
												</div>
							</div>
						</div>
                    </div>
                </article>

                <footer class="mdl-mega-footer">

                    <div class="container">
                        <div class="footer-middle">
                            <div class="row">
                                <h4 class="text-center footer-heading"><i class="fas fa-university"></i> ACADEMIC CAMPUS </h4>

                                <div class="mt-2"></div>
								@forelse($campuses as $campus)
                                <div class="col-md-4">
                                    <h4 class="footer-heading">{{ __($campus->name_translation) }}</h4>
                                    <p>{{ __($campus->summary_translation) }}</p>
                                    <div class="text-center mt-auto mb-2">
                                        <a class="btn btn-custom btn-sm" href="{{ url('campuses', $campus->slugy) }}">{{ __('label.view_more') }}</a>
                                    </div>
                                </div>
								@empty
									{{ __('label.no_information') }}
								@endforelse
                                

                            </div>

                        </div>
                    </div>
                </footer>
                <footer class="mdl-mega-footer">

                    <div class="container">
                        <div class="footer-middle">
                            <div class="row ">
                                <h4 class="text-center footer-heading"><i class="fas fa-graduation-cap"></i> <strong> Alumni
                                    </strong> </h4>


                                <div class="mt-2"></div>


								@forelse($alumnis as $alumni)
                                <div class="col-md-3 border ">
                                    <div class="mx-2 mt-3 d-flex pl-2">

                                        <!-- <img class="mr-2 img-fluid" alt="[150x150]" src="images/profile.jpg"> -->
                                        <img src="{{ asset('/uploads/alumni/thumb-'.$alumni->photo_url) }}" class="img-alumn" alt="">
                                    </div>
                                    
                                    <div class="p-2">
                                        <span class="badge badge-info text-center">{{ $alumni->fullname }}</span>
                                        <p> {!! str_limit(strip_tags(__($alumni->alumni)),60) !!} <a class="text-nowrap btn btn-warning btn-sm read-more"
                                                href="{{ url('alumni',$alumni->slugy) }}"> {{ __('label.readmore') }} </a></p>
                                    </div>
                                </div>
								@empty
									{{ __('label.no_information') }}
								@endforelse


                            </div>
                            <div class="text-center mt-auto mb-2">
                                <a class="btn btn-custom btn-sm" href="{{ url('alumni') }}">View More</a>
                            </div>

                        </div>
                    </div>
                </footer>

            </div>


        </div>
    </div>

@stop
@section('script')
    <script>

    </script>
@endsection