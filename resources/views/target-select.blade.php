
@if(!empty($targets))

@foreach($targets as $key => $value)
<div class="alert alert-success status-box">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h5>Target for This month is:{{ $value }}  </h5>
</div>

@endforeach
@else

<div class="alert alert-danger status-box">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h5>Please, Contact Administrator to set Target</h5>
</div>
@endif