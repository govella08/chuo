@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($categories->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Project Categories
			</div>

			<div class="content content-large">

				<table>
					<thead>
						<tr>
							<th>Category Name</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						@foreach($categories as $category)
						<tr>
							<td class="show" data-item-value="{{ $category->id }}">{{ $category->title }}</td>
							<td>
								{!! link_to_route('cms.project_categories.destroy', "", array($category->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.project_categories.edit', $category->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Category
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.project_categories.index']) !!}

				@include('cms.project_categories._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
