@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		<div class="content-panel">

			@if($users->count() == 0)
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					users 
				</div>
				
				<div class="content content-large">

					<table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Role(s)</th>
								<th></th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						@foreach($users as $user)
							<tr>
								<td class="show" data-item-value="{{ $user->id }}">{{ $user->name }}</td>
								<td class="show" data-item-value="{{ $user->id }}">{{ $user->email }}</td>
								<td class="show">{{ str_replace('"','',json_encode($user->roles->lists('name'))) }}</td>
								<td>
									<!-- <a href="{{ URL::route('cms.users.create-user-form', $user->id) }}" class="item-edit">Edit</a> -->
									<a href="{{ URL::route('cms.users.user-roles-form', $user->id) }}" class="item-edit">View Roles</a>
								</td>
								<td>
									{!! link_to_route('cms.users.destroy', "", array($user->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
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
				New User
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.users.create-user']) !!}

					@include('users_mgt._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
