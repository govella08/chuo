@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Edit {{$contacts->title_en}}
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">

			<div class="content">
				{!! Form::model($contacts, ['route' => ['cms.contacts.update', $contacts->id], 'method' => 'PATCH']) !!}

				@include('cms.contacts._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop