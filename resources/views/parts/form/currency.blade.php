<div class="form-group">
    {{ Form::label($name, $label, ['class' => 'control-label']) }}
    <div class="input-group">
    	<span class="input-group-addon">$</span>
	    {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}	
    </div>
</div>