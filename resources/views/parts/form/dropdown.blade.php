
<div class="form-group">
    {{ Form::label($name, $label, ['class' => 'control-label']) }}
    <br>
    <select class="form-control" name="{{$name}}">
      <option value="1">Yes</option>
      <option value="2">No</option>
  </select>
</div>