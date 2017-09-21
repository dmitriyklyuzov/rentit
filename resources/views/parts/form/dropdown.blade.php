
<div class="form-group">
    {{ Form::label($name, $label, $selectedOption, ['class' => 'control-label']) }}
    <br>
    <select class="form-control" name="{{$name}}">
      <option value="1" @if($selectedOption=="1") selected @endif>Yes</option>
      <option value="2" @if($selectedOption=="2") selected @endif>No</option>
  </select>
</div>