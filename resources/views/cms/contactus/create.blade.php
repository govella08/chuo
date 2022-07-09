@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
        Create New settings
    </div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit
			</div>

			<div class="content">
				{!! Form::model($settings, ['route' => ['cms.contactus.store'], 'method' => 'PATCH']) !!}

					@include('contactus._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop