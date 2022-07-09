@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($vacancies->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Vacancy 
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

						@foreach($vacancies as $vacancy)
						<tr>
							<td class="show" data-item-value="{{ $vacancy->id }}">{{ $vacancy->title_en }}</td>
							<td>
								{!! link_to_route('cms.vacancies.destroy', "", array($vacancy->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.vacancies.edit', $vacancy->id) }}" class="item-edit">Edit</a>
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
				New Vacancy
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.vacancies.index', 'files' => true]) !!}

				@include('cms.vacancies._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>



@stop
