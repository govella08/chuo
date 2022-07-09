@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
        News
    </div>
</div>

<div class="row collapse">
	
	<div class="large-12 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Update {{ $aboutus->title_en }}
			</div>

			<div class="content">
				<div class="row">
					<div class="large-8 columns">
						{!! Form::model($aboutus, ['route' => ['cms.aboutus.update', $aboutus->id], 'files' => true, 'method' => 'PATCH']) !!}

							@include('aboutus._form', ['submitButton' => "Update"])
						
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop