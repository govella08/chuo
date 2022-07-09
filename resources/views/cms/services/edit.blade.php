@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
       Services
    </div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $service->title_en }}
			</div>

			<div class="content">
				{!! Form::model($service, ['route' => ['cms.services.update', $service->id], 'files' => true, 'method' => 'PATCH']) !!}

					@include('cms.services._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop