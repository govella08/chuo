@extends('site.page-layout')

<!-- setting browser tab title -->
@section('title')
@if(isset($content)) 
{{ __($content->title)  }}
@endif
@endsection
<!-- ./setting browser tab title -->

<!-- setting page title -->
@section('page-title')
@if(isset($content)) 
{{ __($content->title)  }}
@endif
@endsection
<!-- ./setting page title -->

@section('breadcrumbs-list')
<li class="breadcrumb-item active">
	@if(isset($content)) 
	{{ __($content->title)  }}
	@endif
</li>
@endsection


<!-- page content section -->
@section('page-content')

@if(isset($content))
{!! nl2br( 
	__($content->content)  
	) !!}
	@else
	{!! __('label.no_information') !!}
	@endif

	@stop
	<!-- ./page content section -->















