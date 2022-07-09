@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
		Regional Office
    </div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
		    <div class="content content-large">
			   
				<ul class="accordion" data-accordion>
					@foreach($regional_offices as $index => $regional_office)
					  <li class="accordion-navigation">
					    <a href="#panel{{ $regional_office->id }}-view">{{ $index + 1 }}. {{ $regional_office->name }}</a>
					    <div id="panel{{ $regional_office->id }}-view" class="content {{ $index == 0 ? 'active' : '' }}">
					      <ul class="list-unstyled">
							  <li>{{ $regional_office->physical_address }}</li>
							  <li>{{ $regional_office->phone }}</li>
							  <li>{{ $regional_office->fax }}</li>
							  <li>{{ $regional_office->email }}</li>
						  </ul>

					       <div>
						    	<a href="{{ URL::route('cms.regional_office.edit', $regional_office->id) }}">
									<i class="ion-edit"></i>
									EDIT
								</a>
							   | <a href="{{ URL::route('cms.regional_office.destroy',   $regional_office->id) }}" data-method='delete', data-confirm='Are you Sure?'>
								   <i class="ion-android-delete"></i>
								   DELETE
							   </a>
						    </div>
					    </div>
					   
					  </li>
				 	@endforeach
				</ul>


		    </div> 
		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Regional Office
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.regional_office.index']) !!}

					@include('regional_office._form', ['submitButton' => "Save"])
				
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
@stop