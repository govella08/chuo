@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Edt  Staff Email's URL
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $staffemail->url }}
			</div>

			<div class="content">
				{!! Form::model($staffemail, ['route' => ['cms.staffemail.update', $staffemail->id], 'method' => 'PATCH']) !!}

				@include('cms.staffemail._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop