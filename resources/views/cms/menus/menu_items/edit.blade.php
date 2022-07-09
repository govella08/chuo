
<div class="row collapse">

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $menuitem->name }}
			</div>

			<div class="content">
				{!! Form::model($menuitem, ['route' => ['cms.menu-items.update', $menuitem->id], 'method' => 'PATCH']) !!}

					@include('cms.menus.menu_items._form', ['submitButton' => "Update"])


					<!-- <div class="row"> -->
						<div class="large-4 small-12 medium-12 columns">
								<a href="{{route('cms.menu-items.destroy',$menuitem->id)}}" class="tiny button delete-button" data-method="DELETE" data-confirm="Are you sure?">Delete</a>
						</div>
					<!-- </div> -->

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

