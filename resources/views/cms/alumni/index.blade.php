@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($alumnis->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Alumni
			</div>

			<div class="content content-large">

				<table id="table">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Title</th>
							<th>Alumni</th>
							<th></th>
						</tr>
					</thead>

					<tbody>


						@foreach($alumnis as $alumni)
						<tr>
							<td>
								<img src="{{ url('/uploads/alumni/thumb-'.$alumni->photo_url) }}" style="max-height:100px !important;">
							</td>
							<td class="show" data-item-value="{{ $alumni->id }}">{{ $alumni->fullname }}</td>
							<td class="show" data-item-value="{{ $alumni->id }}">{{ $alumni->title_en }}</td>
							<td class="show" data-item-value="{{ $alumni->id }}">{!! $alumni->alumni !!}</td>
							<td>
								{!! link_to_route('cms.alumni.destroy', "", array($alumni->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.alumni.edit', $alumni->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $alumnis->render() !!}

			</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Alumni personel
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.alumni.index', 'files' => true]) !!}

					@include('cms.alumni._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	
</div>


@stop
