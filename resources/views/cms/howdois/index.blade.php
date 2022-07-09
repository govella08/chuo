@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
		How Do I
    </div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">

			<div class="content-panel">

			@if($howdois->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="content content-large">

					<table id="table">
						<thead>
							<tr>
								<th>Title Name</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						@foreach($howdois as $howdoi)
							<tr>
								<td class="show" data-item-value="{{ $howdoi->id }}">{{ $howdoi->title }}</td>
								<td class="show" data-item-value="{{ $howdoi->id }}">{{ status($howdoi->active) }}</td>
								<td>
									{!! link_to_route('cms.howdois.destroy', "", array($howdoi->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.howdois.edit', $howdoi->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

					{!! App\Models\HowDoI::orderBy('id', 'DESC')->paginate(15)->render() !!}

				</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New How Do I
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.howdois.index']) !!}

					@include('howdois._form', ['submitButton' => "Save"])
				
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