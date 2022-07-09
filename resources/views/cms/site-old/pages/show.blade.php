@extends('site.page')

@section('page-content')
<h4 class="title-decoration py-2 mb-3"> {!! __($page->title_translation) !!}</h4>
<div>
	@if($page)
	{!! __($page->content_translation) !!}
	@else
	{!! __('label.no_information') !!}
	@endif
</div>
@stop
















