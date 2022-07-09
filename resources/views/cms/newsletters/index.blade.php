@extends('cms.application')
@section('content')

<div class="content-panel">
    <div class="title">
		Newsletter
    </div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
	


		<div class="content-panel">

			@if($newsletters->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else

				<div class="title">
					Newsletter
				</div>

				<div class="content content-large">

					<table id="table">
						<thead>
							<tr>
								<th>Fullname</th>
								<th>Email</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						@foreach($newsletters as $newsletter)
							<tr>
								<td class="show" data-item-value="{{ $newsletter->id }}">{{ $newsletter->fullname }}</td>
								<td class="show" data-item-value="{{ $newsletter->id }}">{{ $newsletter->email }}</td>
								<td>
									{!! link_to_route('cms.newsletter.destroy', "", array($newsletter->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!}
									<a href="{{ URL::route('cms.newsletter.edit', $newsletter->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

					{!! $newsletters->render() !!}

				</div>
			@endif

		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Add Email Subscription Details
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.newsletter.index']) !!}

					@include('newsletters._form', ['submitButton' => "Save"])
				
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