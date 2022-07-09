@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
	Groups
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $group->title_en }}
			</div>

			<div class="content">
				{!! Form::model($group, ['route' => ['cms.administration_groups.update', $group->id], 'method' => 'PATCH']) !!}

				@include('cms.administration_groups._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop