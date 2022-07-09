@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Create New Page
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $page->title_en }}
			</div>

			<div class="content">
				{!! Form::model($page, ['route' => ['cms.pages.store', $page->id], 'method' => 'PATCH']) !!}

				@include('cms.pages._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop