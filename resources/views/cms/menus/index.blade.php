@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
        Menus
    </div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			@if($menus->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

		    <div class="content content-large">
			  
				<table>
						<thead>
							<tr>
								<th>Name</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						@foreach($menus as $menu)
							<tr>
								<td class="show" data-item-value="{{ $menu->id }}">{{ $menu->title }}</td>
								<td>

									{!! link_to_route('cms.menu.destroy', "", array($menu->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.menu-items.index', $menu->id) }}" class="item-edit">View Items</a>
									<a href="{{ URL::route('cms.menu.edit', $menu->id) }}" class="item-edit">Edit</a>
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
				New Menu
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.menu.index']) !!}
					@include('cms.menus._form', ['submitButton' => "Save"])
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