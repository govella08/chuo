@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Project
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit: {{ $project->title_en }}
			</div>

			<div class="content">
				{!! Form::model($project, ['route' => ['cms.projects.update', $project->id], 'files' => true, 'method' => 'PATCH']) !!}

				@include('cms.projects._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop