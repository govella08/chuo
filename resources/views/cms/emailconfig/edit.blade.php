@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
       Receiver Email Configuration
    </div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $emailConfiguration->email_one }}
			</div>

			<div class="content">
				{!! Form::model($emailConfiguration, ['route' => ['cms.emailconfig.update', $emailConfiguration->id], 'files' => true, 'method' => 'PATCH']) !!}

					@include('emailconfig._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop