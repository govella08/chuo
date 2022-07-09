@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($events->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					events
				</div>

				<div class="content content-large">

					<table>
						<thead>
							<tr>
								<th>Title</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						@foreach($events as $event)
							<tr>
								<td class="show" data-item-value="{{ $event->id }}">{{ $event->title }}</td>
								<td>
									{!! link_to_route('cms.events.destroy', "", array($event->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.events.edit', $event->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

					{!! $events->render() !!}

				</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New event
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.events.index', 'files' => true]) !!}

					@include('cms.events._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
