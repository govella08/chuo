@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
{!! __('label.sitemap') !!}
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
{!! __('label.sitemap') !!}
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">{!! __('label.sitemap') !!}</li>
@endsection


<!-- page content section -->
@section('page-content')
<ol>
	@foreach(App\Models\MenuItem::where('parent','=',0)->get() as $menu)

	<li><a href='{{ $menu->url }}'>{{ __($menu->title) }}</a>

		@if(App\Models\MenuItem::where('parent','=',$menu->id)->count() > 0)
		<ul>
			@foreach(App\Models\MenuItem::where('parent','=',$menu->id)->get() as $sub_menu)
			<li><a href='{{ $sub_menu->url }}'>  {{ __($sub_menu->title) }}</a></li>
			@endforeach
		</ul>
		@endif
	</li>

	@endforeach
</ol>
@stop
<!-- ./page content section -->





























