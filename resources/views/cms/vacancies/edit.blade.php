@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		vacancies
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $vacancy->title_en }}
			</div>

			<div class="content">
				{!! Form::model($vacancy, ['route' => ['cms.vacancies.update', $vacancy->id], 'files' => true, 'method' => 'PATCH']) !!}

				@include('cms.vacancies._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop