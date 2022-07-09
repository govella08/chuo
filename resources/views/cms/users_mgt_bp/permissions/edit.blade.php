@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
        Tender
    </div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $tender->title_en }}
			</div>

			<div class="content">
				{!! Form::model($tender, ['route' => ['cms.tenders.update', $tender->id], 'files' => true, 'method' => 'PATCH']) !!}

					@include('tenders._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop