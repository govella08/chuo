@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		<div class="content-panel">

			@if($tenders->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					Tenders 
				</div>

				<div class="content content-large">

					<table>
						<thead>
							<tr>
								<th>Name</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						@foreach($tenders as $tender)
							<tr>
								<td class="show" data-item-value="{{ $tender->id }}">{{ $tender->title_en }}</td>
								<td>
									{!! link_to_route('cms.tenders.destroy', "", array($tender->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.tenders.edit', $tender->id) }}" class="item-edit">Edit</a>
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
				New Tender
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.tenders.index', 'files' => true]) !!}

					@include('tenders._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
