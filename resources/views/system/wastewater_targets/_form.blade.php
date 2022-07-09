<div class="form-group ">
	<strong>Targets:</strong>
	{!! Form::number('target', null, array('placeholder' => 'Enter Targets','class' => 'form-control','required')) !!}
</div>


<div class="form-group ">
	<strong>Region:</strong>
	{!! Form::select('region_id',[''=>'--- Choose Region---']+$region_name,null,['class'=>'form-control','required']) !!}
</div>

<div class="form-group ">
	<strong>Indicators:</strong>
	{!! Form::select('indicator_id',[''=>'--- Choose Indicator---']+$indicator_name,null,['class'=>'form-control','required']) !!}
</div>








