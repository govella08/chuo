@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($allocations->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					allocations
				</div>

				<div class="content content-large">

					<table>
						<thead>
							<tr>
								<th>Description</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						@foreach($allocations as $allocation)
							<tr>
								<td class="show" data-item-value="{{ $event->id }}">{{ $allocation->description }}</td>
								<td>
									{!! link_to_route('cms.allocations.destroy', "", array($allocation->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.allocations.edit', $allocation->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

					{!! $allocations->render() !!}

				</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New allocation
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.allocations.index', 'files' => true]) !!}

					@include('cms.allocations._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
