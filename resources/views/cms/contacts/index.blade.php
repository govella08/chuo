@extends('cms.application')
@section('content')

<div class="content-panel">
	<div class="title">
		Contacts
	</div>
</div>

<div class="row collapse">
	<div class="large-8 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				@if(!$contacts)

				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
				@else
				<table id="table">
					<thead>
						<tr>
							<th>Physical Address</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>

						@foreach($contacts as $contact)
						<tr>
							<td class="show" data-item-value="{{ $contact->id }}"><strong>{!! $contact->physical_address !!}</strong></td>
							<td class="show" data-item-value="{{ $contact->id }}"><strong>{{ $contact->email }}</strong></td>
							<td>
								<!-- {!! link_to_route('cms.contacts.destroy', "", array($contact->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')) !!} -->
								<a href="{{ URL::route('cms.contacts.edit', $contact->id) }}" class="item-edit">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $contacts->render() !!}

				@endif



			</div> 
		</div>
		
	</div>
<!-- 
	 <div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Contacts
			</div>

			<div class="content">
				{!! Form::open(['route' => 'cms.contacts.store', 'method' => 'POST']) !!}

					@include('cms.contacts._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>  -->
</div>


@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).foundation();
	});
</script>
@stop