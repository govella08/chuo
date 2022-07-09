@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($administration->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Administration (Management and Board)   
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Category</th>
							<th>Title</th>
							<th>Position</th>
							<th></th>
						</tr>
					</thead>

					<tbody>


						@foreach($administration as $admin)
						<tr>
							<td>
								<img src="{{ url('/uploads/administration/thumb-'.$admin->photo_url) }}" style="max-height:100px !important;">
							</td>
							<td class="show" data-item-value="{{ $admin->id }}">{{ $admin->fullname }}</td>
							<td class="show" data-item-value="{{ $admin->id }}"><?php echo App\Models\Administration::category_name($admin->category_id); ?></td>
							<td class="show" data-item-value="{{ $admin->id }}">{{ $admin->title_en }}</td>
							<td class="show" data-item-value="{{ $admin->id }}">{{ $admin->position }}</td>
							<td>
								{!! link_to_route('cms.administration.destroy', "", array($admin->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.administration.edit', $admin->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $administration->render() !!}

			</div>
			@endif

		</div>
		
	</div>
	@if(count($categories))
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Administration personel
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.administration.index', 'files' => true]) !!}

				@include('cms.administration._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@else
	<div class="content content-large empty-content">
		<div class="empty-text">
			<span><i class="ion ion-android-checkmark-circle"></i> Please Add Administration Category First</span>
		</div>
	</div>
	@endif
</div>


@stop
