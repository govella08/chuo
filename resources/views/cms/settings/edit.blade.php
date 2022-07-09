@extends('cms.application')
@section('content')

<div class="row collapse">
	
	<div class="large-12 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Update {{ $setting->title_en }}
			</div>

			<div class="content">
				{!! Form::model($setting, ['route' => ['cms.settings.update', $setting->id], 'method' => 'PATCH']) !!}

				@include('cms.settings._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop