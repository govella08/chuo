@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Announcement
	</div>
</div>

<div class="row collapse">
	
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit {{ $announcement->title_en }}
			</div>

			<div class="content">
				{!! Form::model($announcement, ['route' => ['cms.announcements.update', $announcement->id], 'files' => true, 'method' => 'PATCH']) !!}

				@include('cms.announcements._form', ['submitButton' => "Update"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop