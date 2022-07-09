<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::textarea($name, $value, array_merge(['id' => 'redactor_sw','class' => 'form-control'], $attributes)) }}
</div>