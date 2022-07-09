<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <meta name="description" content="some page description here">
    <meta name="keywords" content="page keywords here">


    <title> @yield('title')|{{ label('lbl_site_title') }} </title>

    <link rel="author" name="Nassor Nassor/ Kelvin Mbwilo" />

    <link rel="shortcut icon" href="{{ asset('site/images/logo.png')}} " type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('site/css/master.min.css')}}">
    @yield('css-content')


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- INCLUDE HEADER -->
<header>
    <nav class="topbar">
        <div class="container">
            <div class="clearfix">
                <div class="float-right">
                    <div class="top-list d-inline-block">
                        <ul class="list-unstyled">
                            <li><a href="{{ url('contactus') }}"><i class="fa fa-phone"></i> {{ label('lbl_contact')}}</a></li>
                            <li><a href="{{ url('faqs')}}"><i class="fa fa-question-circle"></i> {{ label('lbl_faq_short')}}</a></li>
                            <li><a href="{{ url('sitemap')}}"><i class="fa fa-map-o"></i> {{ label('lbl_sitemap')}}</a></li>
                        </ul>
                    </div>
                    <div class="top-list d-inline-block">
                        <ul class="list-unstyled">
                            <li><a href="{{url('language/en')}}" style="color: white"><img src="{{ asset('site/images/USA.png')}}"/> En</a></li>
                            <li><a href="{{url('language/sw')}}" style="color: white"><img src="{{ asset('site/images/Tanzania.png')}}"/> Sw</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </nav>
    <div class="banner">
        <div class="container ">
            <div class=" d-flex justify-content-between align-items-center px-3 py-1">

                <div class="pt-2 pb-2 pl-0">
                    <img src="{{ asset('site/images/emblem.png')}}" alt="emblem" width="80" class="img-fluid">
                </div>
                <div class="text-center heading">
                    <h3>
                        <small>{{ label('lbl_site_subtitle') }}</small>
                        <br>{{ label('lbl_title_ministry') }}
                        <br>{{ label('lbl_site_title') }}</h3>
                </div>
                <div class="pt-2 pb-2 pr-0">
                    <a href="{{ url('/') }}"><img src="{{ asset('site/images/logo.png')}}" alt="Logo" width="80" class="img-fluid"></a>
                </div>

            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark top_navbar p-0">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#smallScreenNavbar" aria-controls="smallScreenNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="smallScreenNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">{{ label('lbl_home') }}</a>
                    </li>
                    {!! App\Models\MenuItem::getMenu() !!}
                </ul>
                <form class="form-inline my-2 my-lg-0 pr-2">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn-search" type="submit"><i class="fa fa-search"></i> </button>
                </form>
            </div>
        </div>
    </nav>

</header>
<div class="container">
    <div class="content-layout">
        <!-- CONTENT BLOCK HERE -->
        @yield('content')

    </div>
</div>
<!-- INCLUDE FOOTER -->
<footer class="mdl-mega-footer">
    <div class="footer-middle container py-5">

        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h5 class="footer-heading"><i class="fa fa-link"></i>{{ label('lbl_quick_links')}}</h5>
            <ul class="footer-list">
                @if( count( $quick_links))
                    @foreach( $quick_links as $quicklink )
                        <li><a href="{!! $quicklink->url !!}"><i class="fa fa-angle-double-right"></i> {!! $quicklink->{langdb('title')} !!}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>

        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h5 class="footer-heading"><i class="fa fa-link"></i>{!! label('lbl_related_links') !!}</h5>
            <ul class="footer-list">
                @if(count($related_links))
                    @foreach ($related_links as $links)
                        <li>
                            <a href="{!! $links->url !!}" target="_blank">
                                <i class="fa fa-angle-double-right"></i>
                                {!! $links->{ langdb('title') } !!}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>


        <div class="footer-dropdown">
            <input class="footer-checkbox" type="checkbox" checked>
            <h5 class="footer-heading"><i class="fa fa-phone"></i>{{ label('lbl_contact_info')}}</h5>
            <ul class="footer-list">
                @if(count($contact->{langdb('physical_address')}))
                    <li class="px-2">
                        <b>{{ label('lbl_address') }}</b> <br>
                        {{ $contact->{langdb('physical_address')} }} <br>
                    </li>
                @endif
                @if(count($contact->phone))
                    <li class="px-2"><b>{{ label('lbl_call_us')}}</b><br>
                        {!! $contact->phone !!}/{!! $contact->fax !!}<br></li>
                @endif
                @if(count($contact->hotline))
                    <li class="px-2"><b>{{ label('lbl_hotline')}}</b><br>
                        {!! $contact->hotline !!}<br>
                    </li>
                @endif
                @if(count($contact->email))
                    <li class="px-2"><b>{{ label('lbl_email') }}</b><br>
                        <a href="mailto:{!! $contact->email !!}">
                            {!! $contact->email !!}
                        </a>
                    </li>
            @endif
            <!-- social media links -->
                <li>
                    @if(count($social_links))
                        @foreach($social_links as $slink)
                            <button class="social-btn">
                                <a href="{!! $slink->url !!}" target="_blank" class="bg-{!! $slink->title !!} d-flex align-items-center justify-content-center">
                                    <i class="fa fa-{!! $slink->title !!}  fa-2x" aria-hidden="true"></i>
                                </a>
                            </button>
                        @endforeach
                    @endif
                </li>
            </ul>
        </div>

        @if(isset($video))
            <div class="footer-dropdown">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/{{ explode("=",$video->url)[sizeof(explode("=",$video->url)) -1 ] }}"></iframe>
                </div>
                <div class="pt-2">
                    <a href="{{ url('galleries/listing/videos') }}" class="btn btn-dark btn-block"><i class="fa fa-file-video-o"></i> <span>{{ label('lbl_more_videos') }}</span></a>
                </div>
            </div>
        @endif
    </div>

    <div class="footer-bottom pb-5">
        <ul class="list-inline text-center">
            <li  class="list-inline-item"><a href="{{ url('sitemap') }}">{{ label('lbl_sitemap') }}</a></li>
            <li  class="list-inline-item"><a href="{{ url('privacy') }}">{{ label('privacy_policy') }}</a></li>
            <li  class="list-inline-item"><a href="{{ url('terms') }}">Terms & Conditions</a></li>
            <li  class="list-inline-item"><a href="{{ url('copyright') }}">Copyright Statement</a></li>
            <li  class="list-inline-item"><a href="{{ url('disclaimer') }}">{{ label('disclaimer') }}</a></li>
        </ul>
        <div class="text-center">Ownership. ©<script>document.write(new Date().getFullYear())</script> <a href="index.html">{{ label('lbl_site_title') }} </a>. {{ label('lbl_copyright') }}
            <br> @if(curlang()=='_en')
                Designed and developed by <a href="http://ega.go.tz"  target="_blank">e-Government Agency (eGA)</a>. Contents managed by {{ label('lbl_site_title') }}
            @else
                Imesanifiwa, Imetengenezwa, na <a href="http://ega.go.tz"  target="_blank">Wakala ya Serikali Mtandao (eGA)</a> na Inaendeshwa na {{ label('lbl_site_title') }}
            @endif
        </div>
    </div>
</footer>
<script src="{{ asset('site/js/jquery.min.js')}}"></script>
<script src="{{ asset('site/js/matchHeight.min.js')}}"></script>
<script src="{{ asset('site/js/popper.min.js')}}"></script>
<script src="{{ asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('site/js/jquery.dd.min.js')}}"></script>
<script src="{{ asset('site/js/custom.min.js')}}"></script>

<script>
    $(document).ready(function(e) {
        try {
            $("body select").msDropDown();
        }
        catch(e) {
            alert(e.message);
        }
    });
</script>
@yield('js-content')


</body>

</html>
