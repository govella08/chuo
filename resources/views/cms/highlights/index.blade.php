@extends('cms.application')
@section('content')

	{{ $errors }}
<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($highlights->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Highlight 
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th>title</th>
							<!-- <th>content</th> -->
							<th>Status</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						@foreach($highlights as $highlight)
						<tr>
							<td class="show" data-item-value="{{ $highlight->id }}">{!! $highlight->title !!}</td>
							<!-- <td class="show" data-item-value="{{ $highlight->id }}">{!! $highlight->content_en !!}</td> -->
							<td class="show" data-item-value="{{ $highlight->id }}">{!! status($highlight->active) !!}</td>
							<td>
								{!! link_to_route('cms.highlights.destroy', "", array($highlight->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.highlights.edit', $highlight->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $highlights->render() !!}

			</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New highlight
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.highlights.index', 'files' => true]) !!}

				@include('cms.highlights._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
