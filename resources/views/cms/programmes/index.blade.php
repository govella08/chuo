@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($programmes->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Programmes   
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Level</th>
							<th></th>
						</tr>
					</thead>

					<tbody>


						@foreach($programmes as $programme)
						<tr>
							<td class="show" data-item-value="{{ $programme->id }}">{{ $programme->name }}</td>
							<td class="show" data-item-value="{{ $programme->id }}"><?php echo App\Models\Programmes::level_name($programme->level_id); ?></td>
							<td>
								{!! link_to_route('cms.programmes.destroy', "", array($programme->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.programmes.edit', $programme->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $programmes->render() !!}

			</div>
			@endif

		</div>
		
	</div>
	@if(count($levels))
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Programme
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.programmes.index']) !!}

				@include('cms.programmes._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@else
	<div class="content content-large empty-content">
		<div class="empty-text">
			<span><i class="ion ion-android-checkmark-circle"></i> Please Add Programme Levels First</span>
		</div>
	</div>
	@endif
</div>


@stop
