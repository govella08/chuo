@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Page Categories
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				




				

				@if($categories->count() == 0)
				
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
				@else

				<table>
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						@foreach($categories as $index => $category)
						<tr>
							<td>{{$index+1}}
								<td class="show" data-item-value="{{ $category->id }}">{{ $category->title }}</td>
								<td>
									{!! link_to_route('cms.page-categories.destroy', "", array($category->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.page-categories.edit', $category->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif


					{!!  $categories->render() !!}


				</div> 
			</div>
			
		</div>

		<div class="large-6 columns medium-12 small-12 columns">
			<div class="content-panel">
				<div class="title">
					New Page category
				</div>

				<div class="content">
					{!! Form::open(['route' => 'cms.page-categories.index']) !!}

					@include('cms.page_categories._form', ['submitButton' => "Save"])
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>


	@stop

	@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).foundation();
		});
	</script>
	@stop