<div class="form-group"><div class="form-group">
	<strong>Reported Leakage:</strong>
	{!! Form::number('number_of_leakage', null, array('placeholder' => 'Enter Reported Leakage','class' => 'form-control','required')) !!}
</div>

<div class="form-group">
	<strong>Clonic Areas Leakage:</strong>
	{!! Form::text('areas', null, array('placeholder' => 'Enter Clonic Leakage','class' => 'form-control','required')) !!}
</div>

<div class="form-group">
	<strong>Fixed Leakage:</strong>
	{!! Form::number('number_of_fixed', null, array('placeholder' => 'Enter Fixed Leakage','class' => 'form-control','required')) !!}
</div>

<div class="form-group">
	<strong>Comments to CEO:</strong>
	{!! Form::textarea('request_to_ceo', null, array('placeholder' => 'Enter Request to CEO','class' => 'form-control','required','id'=>'autoResizeTA','rows'=>'5')) !!}
</div>


<script src="{{ asset('cms_assets/js/jquery.autogrow-textarea.js') }}"></script>

    <script>
            jQuery(document).ready(function() {
                
                // Textarea Autogrow
                jQuery('#autoResizeTA').autogrow();
                
            });
        </script>