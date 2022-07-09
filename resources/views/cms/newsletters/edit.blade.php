@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
       Newsletter
    </div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $newsletter->fullname }}
			</div>

			<div class="content">
				{!! Form::model($newsletter, ['route' => ['cms.newsletter.update', $newsletter->id], 'method' => 'PATCH']) !!}

					@include('newsletters._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop