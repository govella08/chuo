@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-8 medium-12 small-12 columns">
		<div class="content-panel">

			@if($roles->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				CMS Roles 
			</div>

			<div class="content content-large">

				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Display Name</th>
							<th>Description</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						@foreach($roles as $role)
						<tr>
							<td class="show">{{ $role->name }}</td>
							<td class="show">{{ $role->display_name }}</td>
							<td class="show">{{ $role->description }}</td>
							<td>
								<a href="{{ URL::route('cms.roles.edit', $role->id) }}" class="item-edit">Edit</a>
								<a href="{{ URL::route('cms.users.user-permissions-form', $role->id) }}" class="item-edit">Permissions</a>
								{!! link_to_route('cms.roles.destroy', "", array($role->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@endif

		</div>
		
	</div>

	<div class="large-4 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Role
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.roles.index', 'files' => true]) !!}

				@include('cms.users_mgt.roles._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
