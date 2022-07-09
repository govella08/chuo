@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($groups->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Administration Groups
			</div>

			<div class="content content-large">

				<table>
					<thead>
						<tr>
							<th>Administration Group Name</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						@foreach($groups as $group)
						<tr>
							<td class="show" data-item-value="{{ $group->id }}">{{ $group->title_en }}</td>
							<td>
								{!! link_to_route('cms.administration_groups.destroy', "", array($group->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.administration_groups.edit', $group->id) }}" class="item-edit">Edit</a>
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
				New Administration Group
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.administration_groups.index']) !!}

				@include('cms.administration_groups._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
