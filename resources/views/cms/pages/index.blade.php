@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Pages
	</div>
</div>

<div class="row collapse">
	<div class="large-5 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">

				@if($pages->count() == 0)
				
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

						@foreach($pages as $index => $page)
						<tr>
							<td>{{$index+1}}
								<td class="show" data-item-value="{{ $page->id }}">{{ $page->title }}</td>
								<td>
									{!! link_to_route('cms.pages.destroy', "", array($page->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.pages.edit', $page->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif


					{!!  $pages->render() !!}




				</div> 
			</div>
			
		</div>

		<div class="large-7 columns medium-12 small-12 columns">
			<div class="content-panel">
				<div class="title">
					New Page
				</div>

				<div class="content">
					{!! Form::open(['route' => 'cms.pages.index']) !!}

					@include('cms.pages._form', ['submitButton' => "Save"])
					
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