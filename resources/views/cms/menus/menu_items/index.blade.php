@section('stylesheets')
<link rel="stylesheet" href="{!! asset('stylesheets/movable_menu.css') !!}" >
@stop
@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Menu Items for  "{{$menu->title_en}}" Menu   
		<a href="{{ URL::route('cms.menu.index') }}"><i class="icon-back"></i>  Back to Menus</a>
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				
				<div class="cf nestable-lists">

					<div class="dd" id="nestable">
						<ol class="dd-list">
							{!! recursiveMenu('0',$menu->id) !!}
						</ol>
					</div>

				</div>


			</div>
		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Menu Item
			</div>

			<div class="content">
				{!! Form::model($menuItem,['route' => 'cms.menu-items.store']) !!}

				@include('cms.menus.menu_items._form', ['submitButton' => "Save"])
				
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
<script src="{!! asset('javascript/jquery.nestable.js') !!}"></script>

<script src="{!! asset('javascript/movable_menu.js') !!}"></script>

<script src="{!! asset('javascript/forms.js') !!}"></script>

<script src="{!! asset('javascript/menu.js') !!}"></script>

<script src="{!! asset('javascript/links.js') !!}"></script>
@stop
