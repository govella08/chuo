@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
        events
    </div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $event->title_en }}
			</div>

			<div class="content">
				{!! Form::model($event, ['route' => ['cms.events.update', $event->id], 'files' => true, 'method' => 'PATCH']) !!}

					@include('cms.events._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop