@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-12 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($settings->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Content Setting & Analytics
			</div>

			<div class="content content-large">

				<div class="row">
					<div class="large-7 columns">
						<table>
							<thead>
								<tr>
									<th>Name</th>
									<th></th>
								</tr>
							</thead>

							<tbody>

								@foreach($settings as $setting)
								<tr>
									<td>{{ $setting->title_en }}</td>
									<td>
										<a href="{{ URL::route('cms.settings.edit', $setting->id) }}" class="item-edit">Update</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>

			</div>
			@endif

		</div>
		
	</div>
<!-- 
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New settings
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.settings.index', 'files' => true]) !!}

					@include('cms.settings._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div> -->

</div>


@stop
