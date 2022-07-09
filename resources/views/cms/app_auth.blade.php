<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="gt-ie8 gt-ie9 not-ie pxajs"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{ __('label.site_subtitle') }} | Login</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Open Sans font from Google CDN -->
     <!--<link rel="icon" href="images/ritalogo.png">-->
	<!-- Pixel Admin's stylesheets -->
	<link href="{{ asset('lib/stylesheets/bootstrap.css') }} " rel="stylesheet" type="text/css">

	<link href="{{ asset('lib/stylesheets/pages.css') }} " rel="stylesheet" type="text/css">
	
	<link href="{{ asset('lib/stylesheets/themes.css') }} " rel="stylesheet" type="text/css">
    <script src="{{ asset('lib/js/jquery.js') }} "></script>
    <script src="{{ asset('lib/js/bootstrap.js') }} "></script>
	<!--[if lt IE 9]>
		<script src="assets/javascripts/ie.min.js"></script>
	<![endif]-->
	<style>
		#signin-demo {
			position: fixed;
			right: 0;
			bottom: 0;
			z-index: 10000;
			background: rgba(0,0,0,.6);
			padding: 6px;
			border-radius: 3px;
		}
		#signin-demo img { cursor: pointer; height: 40px; }
		#signin-demo img:hover { opacity: .5; }
		#signin-demo div {
			color: #fff;
			font-size: 10px;
			font-weight: 600;
			padding-bottom: 6px;
		}
	</style>

<body style="background:#34495E !important;" class="theme-default page-signin">
	<!-- Container -->
	<div class="signin-container" style=" width:400px;background:#FFFFFF;">

			@yield('content')


	</div>
	<!-- / Container -->

	<div class="not-a-member">
	<?php echo date('Y');?> Copyright  {{ __('label.site_title') }}. All rights reserved.
	</div>

</body></html>