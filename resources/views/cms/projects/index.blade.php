@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($projects->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Projects 
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Category</th>
							<th>Status</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						@foreach($projects as $project)
						<tr>
							<td class="show" data-item-value="{{ $project->id }}">{{ $project->title_en }}</td>
							<td class="show" data-item-value="{{ $project->id }}">{{ $project->category->title_en }}</td>
							<td class="show" data-item-value="{{ $project->id }}">{{ status($project->active) }}</td>
							<td class="show" data-item-value="{{ $project->id }}">{{ $project->start_date }}</td>
							<td class="show" data-item-value="{{ $project->id }}">{{ $project->end_date }}</td>
							<td>
								{!! link_to_route('cms.projects.destroy', "", array($project->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.projects.edit', $project->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $projects->render() !!}

			</div>
			@endif

		</div>
		
	</div>
	@if(count($categories))
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New project
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.projects.index', 'files' => true]) !!}

				@include('cms.projects._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@else
	<div class="content content-large empty-content">
		<div class="empty-text">
			<span><i class="ion ion-android-checkmark-circle"></i> Please Add Project Category First</span>
		</div>
	</div>
	@endif

</div>


@stop
