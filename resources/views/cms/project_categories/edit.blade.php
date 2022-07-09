@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Project Category
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $category->title_en }}
			</div>

			<div class="content">
				{!! Form::model($category, ['route' => ['cms.project_categories.update', $category->id], 'method' => 'PATCH']) !!}

				@include('cms.project_categories._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop