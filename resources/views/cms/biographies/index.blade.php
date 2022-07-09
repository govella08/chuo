@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
        Biography
    </div>
</div>

<div class="row collapse">

	<div class="large-12 medium-12 small-12 columns">
		
		<div class="content-panel">
		    <div class="content content-large">
		    
		    @if($biography)
				<ul class="large-12 medium-12 small-12 columns">

					<li class="row">
						<p>
							<a href="{{ URL::route('cms.biography.edit', $biography->id) }}" class="">Edit Profile</a>
						</p>
						<p><img style="width: 200px;height: 200px;" src="{{ asset($biography->photo_url) }}" />
							{!! Form::open(['files'=>true, 'route' => ['cms.biography.photo',$biography->id]]) !!}
								<span class='form_error'>{!! $errors->first('photourl') !!}</span>
								{!! Form::label('photourl', 'Preferred size 600 x 745') !!}
								{!! Form::file('photourl') !!}


								{!! Form::submit('Change', ['class' => 'custom-button']) !!}
							{!! Form::close() !!}

						</p>
						<p><b>Name</b> {{$biography->name}} </p>

						<b>Salutation</b>
						<p>English {{__($biography->salutation_translation,[],'en')}} </p>
						<p>Swahili {{ $biography->salutation }}</p>

						<b>Title</b>
						<p>English {{ $biography->title_en }}</p>
						<p>Swahili {{ $biography->title }}</p>

					</li>

					<li>
						<h4>English</h4>
						{!! __($biography->content_translation,[],'en') !!}
					</li>

					<li>
						<h4>Swahili</h4>
						{!! $biography->content !!}
					</li>
				</ul>
			@endif
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