@component('mail::message')
# Someone has reported an Issue


@component('mail::table')
<table width="100%">	
	<tr>
		<th>Name</th>
		<th>{{$data->full_name}}</th>
	</tr>
	<tr>
		<th>Email</th>
		<th>{{$data->email}}</th>
	</tr>
	<tr>
		<th>Phone Number</th>
		<th>{{$data->phone_number}}</th>
	</tr>
	<tr>
		<th>Ward Name</th>
		<th>{{$data->ward_name}}</th>
	</tr>
	<tr>
		<th>Street Name</th>
		<th>{{$data->street_name}}</th>
	</tr>
</table>
@endcomponent


# Reporte Issue

{!! $data->description !!}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
