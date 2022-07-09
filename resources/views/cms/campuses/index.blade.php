@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($campuses->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					Academic Campuses
				</div>

				<div class="content content-large">

					<table id="table">
						<thead>
							<tr>
								<th width="15%">Name</th>
								<th>Summary</th>
								<th width="15%"></th>
							</tr>
						</thead>

						<tbody>

						@foreach($campuses as $campus)
							<tr>
								<td class="show" data-item-value="{{ $campus->id }}"><strong>{{ __($campus->name_translation) }}</strong></td>
								<td class="show" data-item-value="{{ $campus->id }}"><strong>{{ __($campus->summary_translation) }}</strong><br/></td>
								<td>
									{!! link_to_route('cms.campuses.destroy', "", array($campus->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.campuses.edit', $campus->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

					{!! $campuses->render() !!}

				</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Campus Create Form
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.campuses.index']) !!}

					@include('cms.campuses._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
