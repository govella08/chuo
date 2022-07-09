@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($news_list->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					News
				</div>

				<div class="content content-large">

					<table id="table">
						<thead>
							<tr>
								<th width="15%">Photo</th>
								<th>Details</th>
								<th>Status</th>
								<th width="15%"></th>
							</tr>
						</thead>

						<tbody>

						@foreach($news_list as $news)
							<tr>
								<td>
									<img src="{{ url('/uploads/news/thumb-'.$news->photo_url) }}" style="max-height:100px !important;">
								</td>
								<td class="show" data-item-value="{{ $news->id }}"><strong>{{ __($news->title_translation) }}</strong></td>
								<td class="show" data-item-value="{{ $news->id }}"><strong>{{ $news->active }}</strong><br/></td>
								<td>
									{!! link_to_route('cms.news.destroy', "", array($news->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.news.edit', $news->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

					{!! $news_list->render() !!}

				</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				News Create Form
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.news.index', 'files' => true]) !!}

					@include('cms.news._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop
