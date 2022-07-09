@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-12 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($data->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Welcome Note
			</div>

			<div class="content content-large">

				<table>
					<thead>
						<tr>
							<th>Details</th>
							<th width="15%"></th>
						</tr>
					</thead>

					<tbody>

						@foreach($data as $welcome)
						<tr>

							<td class="show" data-item-value="{{ $welcome->id }}">{{ $welcome->summary_en }}</td>
							<td>
								<!-- {!! link_to_route('cms.welcome.destroy', "", array($welcome->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!} -->
								<a href="{{ URL::route('cms.welcome.edit', $welcome->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $data->render() !!}

			</div>
			@endif

		</div>
		
	</div>

	<!--  <div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Welcome
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.welcome.index', 'files' => true]) !!}

					@include('cms.welcome._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>  -->
</div>


@stop
