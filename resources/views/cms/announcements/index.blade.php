@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($announcements->count() == 0)
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			@else

			<div class="title">
				Announcements
			</div>

			<div class="content content-large">

				<table>
					<thead>
						<tr>
							<th>Title</th>
							<!-- <th>Content</th> -->
							<th></th>
						</tr>
					</thead>

					<tbody>

						@foreach($announcements as $announcement)
						<tr>
							<td class="show" data-item-value="{{ $announcement->id }}">{{ $announcement->name }}</td>
							<!-- <td>{!! $announcement->content_en !!}</td> -->
							<td>
								{!! link_to_route('cms.announcements.destroy', "", array($announcement->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
								<a href="{{ URL::route('cms.announcements.edit', $announcement->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $announcements->render() !!}

			</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Announcement
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.announcements.index', 'files' => true]) !!}

				@include('cms.announcements._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
