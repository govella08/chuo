 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="some page description here">
        <meta name="keywords" content="page keywords here">

        
<title> {{ __('label.site_title') }} </title>


<link rel="stylesheet" href="{{ asset('site/css/slick.min.css')}} ">
<link rel="stylesheet" href="{{ asset('site/css/slick-theme.min.css')}} ">

        <link rel="author" name="Designers" /> 
        
        <link rel="shortcut icon" href=" {{ asset('site/images/logo.png')}} " type="image/x-icon" />

        <link rel="stylesheet" href="{{ asset('site/css/master.min.css')}}">

        
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="container">

            <!-- INCLUDE HEADER -->
            <header>
  <nav class="topbar">
    <div class="clearfix">
      <div class="float-right">
        <div class="top-list d-inline-block">
          <ul class="list-unstyled">
            @if(curlang() == '_sw')
            <li><a href="{{ url('contactus') }}">{{ __('label.contact')}}</a></li>
            <li><a href="{{ url('faqs')}}">{{ __('label.faq_short')}}</a></li>
            <li><a href="<?php if(!empty($staffemail->url)) { echo $staffemail->url; } ?>" target="_blank"> {{ __('label.mail') }} </a></li>
            @else
            <li><a href="{{ url('contactus') }}">{{ __('label.contact')}}</a></li>
            <li><a href="{{ url('faqs')}}">{{ __('label.faq_short')}}</a></li>
            <li><a href="<?php if(!empty($staffemail->url)) { echo $staffemail->url; } ?>" target="_blank"> {{ __('label.mail') }} </a></li>
            @endif
          </ul>
        </div>
        <div class="top-language d-inline-block p-1">

          <select name="countries"  style="width:110px;">
              @if(curlang() == '_sw')
             <option value="{{ url('language/sw') }}"  data-image="{{ asset('site/images/Tanzania.png')}} ">Swahili</option>
             <option value="{{ url('language/en') }}"  data-image="{{ asset('site/images/USA.png')}} ">English</option>
             @else
             <option value="{{ url('language/en') }}"  data-image="{{ asset('site/images/USA.png')}} ">English</option>
             <option value="{{ url('language/sw') }}"  data-image="{{ asset('site/images/Tanzania.png')}} ">Swahili</option>
             @endif

          </select>
    

      </div>
    </div><!-- /.container-fluid -->
  </nav>
  <div class="banner d-flex justify-content-between align-items-center px-3 py-1">
    <div>
      <img src="{{ asset('site/images/emblem.png')}} " alt="emblem" width="100" class="img-fluid">
    </div>
    <div class="text-center">
      <h3><small>{{ __('label.site_subtitle') }}</small><br>{{ __('label.title_ministry') }} <br>  {{ __('label.site_title') }}</h3>   
    </div> 

    <div>
      <a href="index.html"><img src="{{ asset('site/images/logo.png')}} " alt="Logo" width="100" class="img-fluid"></a>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light top_navbar p-0">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#smallScreenNavbar" aria-controls="smallScreenNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="smallScreenNavbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link px-3" href="index.html"><i class="fa fa-home"></i></a>
        </li>

          {!! App\Models\MenuItem::getMenu() !!}
      </ul>
      <form class="form-inline my-2 my-lg-0 pr-2">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn-search my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> </button>
      </form>
    </div>
  </nav>
</header>