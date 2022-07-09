@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($services->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					Services 
				</div>

				<div class="content content-large">

					<table id="table">
						<thead>
							<tr>
								<th>Service Name</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						@foreach($services as $services)
							<tr>
								<td class="show" data-item-value="{{ $services->id }}">{{ $services->title_en }}</td>
								<td class="show" data-item-value="{{ $services->id }}">{{ status($services->active) }}</td>								
								<td>
									{!! link_to_route('cms.services.destroy', "", array($services->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.services.edit', $services->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

					{!! App\Models\Service::orderBy('id', 'DESC')->paginate(15)->render() !!}

				</div>
			@endif

		</div>
		
	</div> 
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New services
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.services.index', 'files' => true]) !!}

					@include('cms.services._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	
</div>


@stop
