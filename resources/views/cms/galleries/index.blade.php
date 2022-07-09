@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Galleries
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				

				@if($types->count() == 0)
				
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
				@else

				@foreach($types as $title=>$type)
				<h4 style="text-transform: capitalize;">{{$title}}</h4>
				<table >
					<thead>
						<tr>
							<th>Name</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						@foreach($type as $gallery)
						<tr>
							<td class="show" data-item-value="{{ $gallery->id }}">{{ $gallery->title_en }}</td>
							<td>
								{!! link_to_route('cms.galleries.destroy', "", array($gallery->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.media.index', $gallery->id) }}" class="item-edit">View {{ucwords($gallery->type)}}</a>
								<a href="{{ URL::route('cms.galleries.edit', $gallery->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@endforeach
				@endif

			</div> 
		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Gallery
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.galleries.index']) !!}

				@include('cms.galleries._form', ['submitButton' => "Save"])
				
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