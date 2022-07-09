@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
		Campus
    </div>
</div>

<div class="row collapse">
	
	<div class="large-12 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Update {{ $campuses->name_en }}
			</div>

			<div class="content">
				<div class="row">
					<div class="large-8 columns">
						{!! Form::model($campuses, ['route' => ['cms.campuses.update', $campuses->id], 'method' => 'PATCH']) !!}

							@include('cms.campuses._form', ['submitButton' => "Update"])
						
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop