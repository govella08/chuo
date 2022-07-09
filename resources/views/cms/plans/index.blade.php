@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($plans->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					plans
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

						@foreach($plans as $plan)
							<tr>
								<td class="show" data-item-value="{{ $plan->id }}">{{ $plan->description }}</td>
								<td>
									{!! link_to_route('cms.plans.destroy', "", array($plan->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.plans.edit', $plan->id) }}" class="item-edit">Edit</a>
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
				New plan
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.plans.index', 'files' => true]) !!}

					@include('cms.plans._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
