@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
        Mail Settings
    </div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
		    <div class="content content-large">
			   

			@if(!$setting)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

					<table>
						<tbody>

							<tr>
								<td>Name</td>
								<td>{{$setting->name}}</td>

							</tr>

							<tr>
								<td>Email</td>
								<td>{{$setting->email}}</td>

							</tr>
							<tr>
								<td>Host</td>
								<td>{{$setting->host}}</td>

							</tr>
							<tr>
								<td>Mail Port</td>
								<td>{{$setting->port}}</td>

							</tr>
							<tr>
								<td>Encryption</td>
								<td>{{$setting->encryption}}</td>

							</tr>

						</tbody>
					</table>
			@endif



		    </div> 
		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Mail Settings
			</div>

			<div class="content">
				{!! Form::model($setting,['route' => 'cms.contactus.index']) !!}

					@include('contactus._form', ['submitButton' => "Save"])
				
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