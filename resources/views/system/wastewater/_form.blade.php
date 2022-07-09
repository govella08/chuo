<div class="target">
</div>
<div class="form-group">
	<strong>Indicators:</strong>
	{!! Form::select('indicator_id',[''=>'--- Select Indicator---']+$wastewater,null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	<strong>Reported:</strong>
	{!! Form::number('reported', null, array('placeholder' => 'Enter Reported','class' => 'form-control','required')) !!}
</div>
<div class="form-group">
	<strong>Achievement:</strong>
	{!! Form::number('achievements', null, array('placeholder' => 'Enter Achievements','class' => 'form-control','required')) !!}
</div>




<script type="text/javascript">
        $("select[name='indicator_id']").change(function(){

          var id = $(this).val();

          var token =$("meta[name=csrf-token]").attr("content") 

          $.ajax({

            url: "<?php echo route('target-select') ?>",

            method: 'POST',

            data: {id:id, _token:token},

            success: function(data) {

              $(".target").html('');

              $(".target").html(data.options);
                    console.log(data.options); 
                  }

                });

        });

        </script>