@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($links->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				social Links
			</div>

			<div class="content content-large">

				<table>
					<thead>
						<tr>
							<th>Title</th>
							<th>URL</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						@foreach($links as $link)
						<tr>
							<td class="show" data-item-value="{{ $link->id }}">{{ $link->title }}</td>
							<td class="show" data-item-value="{{ $link->id }}">
								<a href="{{ URL::to($link->url) }}">{{ $link->url }}</a>
							</td>
							<td>
								{!! link_to_route('cms.social_links.destroy', "", array($link->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.social_links.edit', $link->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New social Link
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.social_links.index']) !!}

				@include('cms.social_links._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
