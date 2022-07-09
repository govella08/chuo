@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
		Departments
    </div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
		    <div class="content content-large">
			   
				<ul class="accordion" data-accordion>
					@foreach($department as $index => $department)
					  <li class="accordion-navigation">
					    <a href="#panel{{ $department->id }}">{{ $index + 1 }}. {{ $department->dept_name }}</a>
					    <div id="panel{{ $department->id }}" class="content {{ $index == 0 ? 'active' : '' }}">
					      {!! nl2br($department->content) !!}

					       <div>
						    	<a href="{{ URL::route('cms.department.edit', $department->id) }}"><i class="ion-edit"></i>  EDIT</a> | <a href="{{ URL::route('cms.department.destroy',   $department->id) }}" data-method='delete', data-confirm='Are you Sure?'><i class="ion-android-delete"></i>  DELETE</a>
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
				New Department
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.department.index']) !!}

					@include('department._form', ['submitButton' => "Save"])
				
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