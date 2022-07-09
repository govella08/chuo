

<div class="form-group">
    <strong>Full name:</strong>
    {!! Form::text('name', null, array('placeholder' => 'Full name','class' => 'form-control','required')) !!}
</div>

<div class="form-group">
    <strong>Phone:</strong>
    {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control','required')) !!}
</div>
<div class="form-group">
    <strong>Email:</strong>
    {!! Form::email('email', null, array('placeholder' => 'example@gmail.com','class' => 'form-control','required')) !!}
</div>

<div class="form-group">
    <strong>Role:</strong>
    {!! Form::select('roles[]',[''=>'--- Choose Role---']+$roles->toArray(),$userRole, array('class' => 'form-control','required')) !!}
</div>

<div class="form-group">
 <strong>Region:</strong>
 {!! Form::select('region_id',[''=>'--- Choose Region---']+$region_name,null,['class'=>'form-control','required']) !!}
</div>

<div class="form-group">
    <strong>Password:</strong>
    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
</div>

<div class="form-group">
    <strong>Confirm Password:</strong>
    {!! Form::password('confirm_password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
</div>


<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>






<script type="text/javascript">
$("select[name='region_id']").change(function(){

  var id = $(this).val();

  var token =$("meta[name=csrfToken]").attr("content")
  $.ajax({

    url: "<?php echo route('district-select') ?>",

    method: 'POST',

    data: {id:id, _token:token},

    success: function(data) {

      $("select[name='district_id'").html('');

      $("select[name='district_id'").html(data.options);
      console.log(data.options); 
  }

});

});

</script>


