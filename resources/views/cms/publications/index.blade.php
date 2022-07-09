@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($publications->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Publication 
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Category</th>
							<th>Status</th>
							<th>Published Date</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						@foreach($publications as $publication)
						<tr>
							<td class="show" data-item-value="{{ $publication->id }}">{{ $publication->title_en }}</td>
							<td class="show" data-item-value="{{ $publication->id }}">{{ $publication->category->title_en }}</td>
							<td class="show" data-item-value="{{ $publication->id }}">{{ status($publication->active) }}</td>
							<td class="show" data-item-value="{{ $publication->id }}">{{ $publication->published_date }}</td>
							<td>
								{!! link_to_route('cms.publications.destroy', "", array($publication->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.publications.edit', $publication->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $publications->render() !!}

			</div>
			@endif

		</div>
		
	</div>
	@if(count($categories))
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New publication
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.publications.index', 'files' => true]) !!}

				@include('cms.publications._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@else
	<div class="content content-large empty-content">
		<div class="empty-text">
			<span><i class="ion ion-android-checkmark-circle"></i> Please Add Publication Category First</span>
		</div>
	</div>
	@endif

</div>


@stop
