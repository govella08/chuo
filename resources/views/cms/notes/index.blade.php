@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
        Welcome Note
    </div>
</div>

<div class="row collapse">
	<div class="large-5 medium-12 small-12 columns">
		
		<div class="content-panel">
		    <div class="content content-large">
				<ul>
					<li>
							<p><img style="width: 200px;height: 200px;" src="{{asset($notes->photourl)}}" />
								{!! Form::open(['files'=>true, 'route' => 'cms.notes.photo']) !!}
									<span class='form_error'>{!! $errors->first('photourl') !!}</span>

									{!! Form::file('photourl') !!}
									{!! Form::submit('Change', ['class' => 'custom-button']) !!}
								{!! Form::close() !!}

							</p>
							<p><b>Name</b> {{$notes->name}} </p>

							<b>Salutation</b>
							<p>English {{$notes->salutation_en}} </p>
							<p>Swahili {{$notes->salutation_sw}}</p>

							<b>Title</b>
							<p>English {{$notes->title_en}}</p>
							<p>Swahili {{$notes->title_sw}}</p>

					</li>


					<li>
						<h4>English</h4>
						{!! $notes->content_en !!}

					</li>

					<li>
						<h4>Swahili</h4>
						{!! $notes->content_sw !!}

					</li>

				</ul>


		    </div> 
		</div>
		
	</div>

	<div class="large-7 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Welcome Note
			</div>

			<div class="content">
				{!! Form::model($notes,['route' => 'cms.notes.index']) !!}

					@include('notes._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
		    $(document).foundation();
		});
	</script>
	<link rel="stylesheet" href="{{asset('cms/cropper/dist/cropper.min.css')}}">
@stop