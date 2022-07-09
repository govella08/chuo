<div class="form-group">
	<strong>Achievement:</strong>
	{!! Form::number('achievement', null, array('placeholder' => 'Enter Achievements','class' => 'form-control','required')) !!}
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