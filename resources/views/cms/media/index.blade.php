@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		{{$gallery->type}} for "{{$gallery->title_en}}" Gallery (<a href="{{route('cms.galleries.index')}}">Back to galleries</a>) 
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			
			<div class="content content-large">
				
				<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-5   admin-video-gallery">
					<?php $flag  = true; ?>
					@foreach($gallery->{$gallery->type} as $index => $med)
					<?php $flag  = false; ?>
					<li>
						@if($gallery->type=='photos')
						<img src="{{asset($med->image('thumb'))}}">
						@endif
						@if($gallery->type=='videos')

						<iframe src="https://www.youtube.com/embed/{!! utube_hash($med->url) !!}" width="190" height="170" frameborder="2"   allowfullscreen></iframe>
						
						@endif
						<div>
							<div>

								<a href="{{ URL::route('cms.media.edit', $med->id) }}"><i class="ion-edit"></i>  EDIT</a> | 
								<a href="{{ URL::route('cms.media.destroy', $med->id) }}" data-method='delete', data-confirm='Are you Sure?'><i class="ion-android-delete"></i>DELETE</a>

							</div>
						</div>
						
					</li>
					@endforeach
				</ul>

				@if(!$flag)
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>

				@endif


			</div> 





		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New 
			</div>

			<div class="content">
				{!! Form::model($media,['files'=>true,'route' => 'cms.media.store']) !!}
				{!! Form::hidden('gallery_id') !!}
				{!! Form::hidden('type',$gallery->type) !!}
				@include('cms.media.'.$gallery->type.'_form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).foundation();
	});
</script>
@stop