@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($levels->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					Levels
				</div>

				<div class="content content-large">

					<table id="table">
						<thead>
							<tr>
								<th>Name</th>
								<th width="30%"></th>
							</tr>
						</thead>

						<tbody>

						@foreach($levels as $level)
							<tr>
								<td class="show" data-item-value="{{ $level->id }}"><strong>{{ __($level->name) }}</strong></td>
								<td>
									{!! link_to_route('cms.levels.destroy', "", array($level->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.levels.edit', $level->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

					{!! $levels->render() !!}

				</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Level Create Form
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.levels.index', 'files' => true]) !!}

					@include('cms.levels._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
