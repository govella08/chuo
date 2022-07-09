@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
        Related Links
    </div>
</div>

<div class="row collapse">

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $link->title_en }}
			</div>

			<div class="content">
				{!! Form::model($link, ['route' => ['cms.external_links.update', $link->id], 'method' => 'PATCH']) !!}

					@include('external_links._form', ['submitButton' => "Update"])

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop