@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
       How Do I
    </div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $howdoi->name }}
			</div>

			<div class="content">
				{!! Form::model($howdoi, ['route' => ['cms.howdois.update', $howdoi->id], 'method' => 'PATCH']) !!}

					@include('howdois._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop