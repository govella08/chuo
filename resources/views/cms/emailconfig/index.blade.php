@extends('cms.application')
@section('content')

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
	@if($emailconfig->count() == 0)
			
				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
			@else
		
		<div class="content-panel">

				<div class="title">
					Receiver Email Configuration 
				</div>

				<div class="content content-large">

					<table>
						<thead>
							<tr>
								<th>Receiver Email</th>
								<th>Category</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

						@foreach($emailconfig as $Receiver)
							<tr>
								<td class="show" data-item-value="{{ $Receiver->id }}">{{ $Receiver->email_one }}</td>
								<td class="show" data-item-value="{{ $Receiver->id }}"> @if($Receiver->category==1) {{ "Works Sector" }} @endif @if($Receiver->category==2) {{ "Communications Sector" }} @endif @if($Receiver->category==3) {{ "Transport Sector" }} @endif</td>
								<td>
									<a href="{{ URL::route('cms.emailconfig.edit', $Receiver->id) }}" class="item-edit">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>


		</div>
		@endif
	</div>
<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New 
			</div>

			<div class="content content-large">
				{!! Form::open(['route' => 'cms.emailconfig.index', 'files' => true]) !!}

					@include('emailconfig._form', ['submitButton' => "Save"])
				
				{!! Form::close() !!}
			</div>
		</div>
</div>
</div>


@stop
