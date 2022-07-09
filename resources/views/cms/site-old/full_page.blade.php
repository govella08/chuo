<!DOCTYPE html>
<html lang="en">

<head>
	@include('site.includes.mast_head')
</head>

<body>

	<header>

		<div id="topbg">
			@include('site.includes.top_nav')
		</div>
		<!--/topbg-->



		<div class="container">

			<div id="header">

				<div id="logo">
					<a href=".">
						<img src="{{ asset('site/images/coat.png') }}" alt="">
					</a>
				</div>
				<!--/logo-->

				<h1><span>The United Republic of Tanzania</span>National Environment Management Council   </h1>


				<div id="board-logo">
					<img src="{{ asset('site/images/logo.png') }}" alt="">
				</div>
				<!-- /logo-->

			</div>
			<!--/header-->
		</div>
		<!-- /container-->


		<div id="main-menu">
			@include('site.includes.main_menu')
		</div>
		<!-- /main-menu-->

	</header>
	<!-- /header-->


	<div class="slider-bio-wrapper page-main-title">


		<div class="container">
			<h1>@yield('title')</h1>
		</div>
		<!-- /container-->
	</div>
	<!-- /slider-bio-wrapper-->


	<div class="full-page-wrap">

	<div class="container">
		<div class="full-page">
				@yield('content')
		</div><!-- /full-page-->
	</div><!-- /container-->

	</div><!-- /full-page-wrap-->
	<!-- /full-page-wrap-->


	<div class="min-footer-wrapper">
		@include('site.includes.links')
	</div>
	<!-- /mean-footer-wrapper-->


	<footer>
		@include('site.includes.footer')
	</footer>


	@include('site.includes.scripts')


</body>

</html>