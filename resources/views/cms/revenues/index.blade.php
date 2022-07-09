@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($speeches->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Speech 
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

						@foreach($speeches as $speech)
						<tr>
							<td class="show" data-item-value="{{ $speech->id }}">{!! $speech->title !!}</td>
							<!-- <td class="show" data-item-value="{{ $speech->id }}">{!! $speech->content_en !!}</td> -->								
							<td class="show" data-item-value="{{ $speech->id }}">{!! status($speech->active) !!}</td>								
							<td>
								{!! link_to_route('cms.speeches.destroy', "", array($speech->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.speeches.edit', $speech->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $speeches->render() !!}

			</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New speech
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.speeches.index', 'files' => true]) !!}

				@include('cms.speeches._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
