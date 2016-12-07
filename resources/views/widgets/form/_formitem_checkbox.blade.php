<?php if (!isset($label)) $label = null ?>
<div class="checkbox form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label>
        <input type="checkbox" name="{{ $name }}"> {!! $label !!}
    </label>
    @if ($errors->has($name))
        <span class="help-block"><strong>{{ $errors->first($name) }}</strong></span>
    @endif
</div>