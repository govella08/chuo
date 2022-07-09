<div class="content">

    <ul class="tabs" data-tab id="myTabs">
      <li class="tab-title active"><a href="#panel1">English</a></li>
    </ul>

    <div class="tabs-content">

    @if($errors->count())
    	<span class='form_error'>{!! $errors->first('email_one') !!}</span> <br />
	    <span class='form_error'>{!! $errors->first('category') !!}</span> <br />
    @endif
    

      <div class="content active" id="panel1">

        <div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('Emails', 'Receiver Email') !!}
				{!! Form::text('email_one') !!}
			</div>
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				{!! Form::label('Category', 'Choose Category') !!}
				<select name="category">
                        <option value="1">Works Sector</option>
                        <option value="2">Communications Sector</option>
                        <option value="3">Transport Sector</option>
                    </select>
			</div>
		</div>

      </div>


		<div class="row collapse">
			<div class="large-12 small-12 medium-12 columns">
				{!! Form::submit($submitButton, ['class' => 'custom-button']) !!}
			</div>
		</div>

    </div>

</div>

