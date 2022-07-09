@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">

			@if($aboutus->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					Aboutus
				</div>

				<div class="content content-large">

					<table id="">
						<thead>
							<tr>
								<th width="15%">Photo</th>
								<th>Details</th>
								<th>Status</th>
								<th width="15%"></th>
							</tr>
						</thead>

						<tbody>

						@foreach($aboutus as $abt)
							<tr>
								<td>
									<img src="{{ url('/uploads/aboutus/thumb-'.$abt->photo_url) }}" style="max-height:100px !important;">
								</td>
								<td class="show" data-item-value="{{ $abt->id }}"><strong>{{ $abt->title_en }}</strong><br/>{{ $abt->summary_en }}</td>
								<td class="show" data-item-value="{{ $abt->id }}"><strong>{{ status($abt->active) }}</strong><br/></td>
								<td>
									{!! link_to_route('cms.aboutus.destroy', "", array($abt->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.aboutus.edit', $abt->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

					{!! $aboutus->render() !!}

				</div>
			@endif

		</div>
		
	</div>

	@if(!count($aboutus))
	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Aboutus Create Form
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.aboutus.index', 'files' => true]) !!}

					@include('aboutus._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@endif
</div>


@stop
