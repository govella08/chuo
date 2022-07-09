  
<!DOCTYPE html>
<html lang="en">
<?php $local=$currentLanguage->locale; ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="some page description here">
        <meta name="keywords" content="page keywords here">

        
<title> @yield('title') | {{ __('label.site_title',[],$local) }} </title>

        <link rel="author" name="e-GA Designers" /> 
        <link href="https://fonts.googleapis.com/css?family=Hind|Josefin Sans|Abel" rel="stylesheet">
        
    <link rel="shortcut icon" href="{{ asset('site/images/favicon.ico')}}" type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('site/css/master.min.css')}}">

    <link rel="stylesheet" href="{{ asset('site/css/perfect-scrollber.min.css') }}">

    @yield('css-content')


        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
    
        <!-- visitors counter -->
        <div class="visitors hide-visitors-counter">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fa fa-globe"></i> Visitors Counter <button class="btn btn-outline-primary float-right px-3" id="visitors-counter-btn"><i class="btn-icon fa fa-angle-double-up"></i></button></h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><h5>Today : <span class="badge badge-info float-right">20</span></h5></li>
                        <li><h5>Yesterday : <span class="badge badge-info float-right">20</span></h5></li>
                        <li><h5>This Week : <span class="badge badge-info float-right">20</span></h5></li>
                        <li><h5>This Month : <span class="badge badge-info float-right">20</span></h5></li>
                        <li><h5>Total : <span class="badge badge-info float-right">20</span></h5></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- ./visitors counter -->

            <!-- INCLUDE HEADER -->
        <header>
            <nav class="topbar">
                <div class="container">
                    <div class="d-flex align-items-center py-1 topbar-body">
                        
                        <ul class="list-inline top-list mb-0 mr-auto">
                            <form class="form-inline py-0 pr-2">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn-search" type="submit"><i class="fa fa-search"></i> </button>
                            </form>
                        </ul>
                        <ul class="list-inline top-list mb-0">
                            
                            <li class="list-inline-item sm-hide">
                                <a href="#" class="btn btn-success btn-sm"><i class="fa fa-phone-square"></i> {{ $contact->phone }}</a>
                            </li>
                            
                            <li class="list-inline-item sm-hide">
                                <a class="btn btn-success btn-sm" href="http://mail.MOHCDGEC.go.tz" target="_blank"><i class="fa fa-envelope-open"></i> {{ __('label.mail', [], $local) }}</a>
                            </li>

                            <li class="list-inline-item">
                                <a class="btn btn-success btn-sm" href="{{ url('tenders') }}"><i class="fa fa-child"></i> {{ __('label.tenders', [], $local) }}</a>
                            </li>

                            <li class="list-inline-item">
                                <a class="btn btn-success btn-sm" href="{{ url('contactus') }}"><i class="fa fa-address-book"></i> {{ __('label.contact', [], $local) }}</a>
                            </li>

                            <li class="list-inline-item sm-hide">
                                <a class="btn btn-success btn-sm" href="{{ url('faqs') }}"><i class="fa fa-question-circle"></i> {{ __('label.faq_short', [], $local) }}</a>
                            </li>
                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdown_lang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('site/images/Tanzania.png') }}" alt=""> Swahili
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right languages-available" aria-labelledby="dropdown_lang">
                                        <a class="dropdown-item" id="usa" href="#" onclick="dropdown_langSet(this);">
                                            <img src="{{ asset('site/images/USA.png') }}" alt=""> English</a>
                                            <a class="dropdown-item" id="tanzania" href="#" onclick="dropdown_langSet(this);">
                                                <img src="{{ asset('site/images/Tanzania.png') }}" alt=""> Swahili</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="banner">
				<div class="container">
					<div class=" d-flex justify-content-between align-items-center">
						<div class="py-2 emblem">
							<img src="{{ asset('site/images/emblem.png') }}" alt="emblem" class="img-fluid">
						</div>
						<div class="text-center banner-heading">
							<h5 class="mb-0 sm-hide title">{{ __('label.title_ministry', [], $local) }}</h5>
							<h1 class="mb-1 title">{{ __('label.site_title', [], $local)}}</h1>		
							<h4 class="mb-0 sm-hide title">{{ __('label.site_subtitle', [], $local) }}</h4>
						</div>
						<div class="py-2 logo">
							<a href="{{ url('/')}}">
								<img src="{{ asset('site/images/logo.png') }}" alt="Logo" class="img-fluid">
							</a>
						</div>
					</div>
				</div>
			</div>

            <div class="baki-juu">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark top_navbar p-0">
					<div class="container">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#smallScreenNavbar" aria-controls="smallScreenNavbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="smallScreenNavbar">
							<ul class="navbar-nav mr-auto active-links">
								<li class="nav-item">
									<a class="nav-link" href="index.html"><i class="fas fa-home"></i> Home</a>
								</li>
                <!-- ####################################################################################### -->
                {!! App\Models\MenuItem::getMenu($local) !!}
                <!-- ####################################################################################### -->
                </ul>
                
            </nav>
        </div>
        </header>
           

    <div class="content-layout">
        <!-- CONTENT BLOCK HERE -->


        @yield('content')

    </div>

 
<!-- INCLUDE FOOTER -->
<footer class="mdl-mega-footer">
    <div class="footer-middle">   
 
		<div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h5 class="footer-heading"><i class="fa fa-phone"></i>{{ __('label.contact_info')}}</h5>
            <ul class="footer-list">
            @if(isset($contact->physical_address))
                <li class="px-2 py-2">
                    {{__($contact->physical_address_translation)}} <br>
                </li>
            @endif
            @if(isset($contact->phone))
                <li class="px-2 py-2">
                   {{ __('label.telephone',[],$local) }}: {!! $contact->phone !!}<br>
               </li>
            @endif
            @if(isset($contact->fax))
                <li class="px-2 py-2">
                    {{ __('label.fax',[],$local) }}: {!! $contact->fax !!}<br>
                </li>
            @endif
            @if(isset($contact->hotline))
                <li class="px-2 py-2">
                     {{ __('label.hotline',[],$local) }}: {!! $contact->hotline !!}<br>
                </li>
            @endif
            @if(isset($contact->email))
                <li class="py-2">
                    <a href="mailto:{!! $contact->email !!}">
                       {{ __('label.email',[],$local) }}: {!! $contact->email !!}
                    </a>
                </li>
            @endif
                    
            </ul>
        </div>

       
        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h5 class="footer-heading"><i class="fa fa-link"></i>{{ __('label.quick_links')}}</h5>
            <ul class="footer-list">
                @if( count( $quick_links))
                    @foreach( $quick_links as $quicklink)
                        <li><a href="{!! $quicklink->url !!}"><i class="fa fa-angle-double-right"></i> {!! __($quicklink->title_translation) !!}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>        
   
		
		<div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h5 class="footer-heading"><i class="fa fa-link"></i>{!! __('label.related_links') !!}</h5>
            <ul class="footer-list">
                @if(count($related_links))
                    @foreach ($related_links as $links)
                        <li>
                            <a href="{!! $links->url !!}" target="_blank">
                                <i class="fa fa-angle-double-right"></i>
                                {!! __($links->title_translation) !!}
                            </a>
                        </li>
                    @endforeach
                        <li class="read-more float-right mr-3 pt-2"><a href="{{ url('relatedlinks') }}">{!! __('label.more') !!} <i class="fa fa-plus"></i></a></li>
                @endif
            </ul>
        </div>
        
    
        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h5 class="footer-heading">{{__('label.social',[],$local)}}</h5>
            <ul class="footer-list">
                <!-- social media links -->
                <li>
                    <ul class="list-inline d-flex flex-wrap text-center">
						@if(count($social_links))
                            @foreach($social_links as $slink)
                                <li class="list-inline-item social-btn"><a href="{!! $slink->url !!}" target="_blank" class="bg-{!! $slink->title !!} d-flex align-items-center justify-content-center"><i class="fa fa-{!! strtolower($slink->title) !!} fa-2x" aria-hidden="true"></i></a></li>
                            @endforeach
                        @endif
                       
                    </ul>
                </li>
                <!-- ./social media links -->
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <ul class="list-inline text-center">
		
			<li  class="list-inline-item  py-2"><a href="{{ url('sitemap') }}" class="btn btn-primary btn-sm"><i class="fa fa-map"></i> {{ __('label.sitemap',[],$local) }}</a></li>
            <li  class="list-inline-item  py-2"><a href="{{ url('privacy') }}" class="btn btn-primary btn-sm"><i class="fa fa-book"></i> {{ __('label.privacy_policy',[],$local) }}</a></li>
            <li  class="list-inline-item  py-2"><a href="{{ url('terms-and-conditions') }}" class="btn btn-primary btn-sm"><i class="fa fa-legal"></i> {{ __('label.terms_conditions',[],$local) }}</a></li>
            <li  class="list-inline-item  py-2"><a href="{{ url('copyright') }}" class="btn btn-primary btn-sm"><i class="fa fa-book"></i> {{ __('label.copyright_statement',[],$local) }}</a></li>
            <li  class="list-inline-item  py-2"><a href="{{ url('disclaimer') }}" class="btn btn-primary btn-sm"><i class="fa fa-book"></i> {{ __('label.disclaimer',[],$local) }}</a></li>

        </ul>
		
        <div class="text-center">{{ __('label.copyright',[],$local) }} ©<span id="copyrightDate"></span>
						
            <a href="index.html">OSG </a> {{ __('label.copyright',[],$local) }}
            <br> 
						@if($local=='en')
                            Designed and Developed by <a href="http://ega.go.tz" target="_blank">e-Government Agency</a> <br>
                            Content Managed By <a href="{{url('/')}}"> {{ __('label.site_title',[],$local) }} </a>.
                        @else
                            Imesanifiwa, Imetengenezwa, na <a href="http://ega.go.tz" target="_blank">e-Government Agency</a> <br>
                            na Inaendeshwa na <a href="{{url('/')}}"> {{ __('label.site_title',[],$local) }} </a>.
                        @endif
			
        </div>
    </div>
</footer>

<!-- Copyright Date -->
<script>
    let currentYear = new Date().getFullYear(); let startYear = 2018;
    if (currentYear != startYear) {
        document.getElementById('copyrightDate').innerHTML = (startYear+"-"+new Date().getFullYear());
    } else {
        document.getElementById('copyrightDate').innerHTML = (new Date().getFullYear());
    }
</script> 
            
            
        </div>
<script src="{{ asset('site/js/jquery.min.js')}}"></script>
<script src="{{ asset('site/js/nprogress.min.js') }}"></script>
<script src="{{ asset('site/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('site/js/matchHeight.min.js')}}"></script>
<script src="{{ asset('site/js/customScrollbar.min.js')}}"></script>
<script src="{{ asset('site/js/slick.min.js')}}"></script>
<script src="{{ asset('site/js/custom.min.js')}}"></script>

@yield('js-content')

<script>

    var default_lang = $('.languages-available a.dropdown-item:first-child');
    function dropdown_langSet(val) {
        if(val.innerHTML!=""){
            $('#dropdown_lang').val(val.innerHTML);
            $('#dropdown_lang').html(val.innerHTML);
        }
        else{
            $('#dropdown_lang').val('');
            $('#dropdown_lang').html(default_lang);
        }
    }

</script>
   
    </body>

</html>