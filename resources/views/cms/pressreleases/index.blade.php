@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($pressreleases->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Press Release 
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th>Title</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						@foreach($pressreleases as $pressrelease)
						<tr>
							<td class="show" data-item-value="{{ $pressrelease->id }}">{{ $pressrelease->title_en }}</td>
							<td class="show" data-item-value="{{ $pressrelease->id }}">{{ status($pressrelease->active) }}</td>
							<td>
								{!! link_to_route('cms.pressreleases.destroy', "", array($pressrelease->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.pressreleases.edit', $pressrelease->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $pressreleases->render() !!}

			</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New pressrelease
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.pressreleases.index', 'files' => true]) !!}

				@include('cms.pressreleases._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
