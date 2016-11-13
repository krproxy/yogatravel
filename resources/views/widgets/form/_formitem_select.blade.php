<?php if (!isset($value)) $value = null ?>
<?php if (!isset($placeholder)) $placeholder = null ?>
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    @if(isset($title))
        <label for="{!! $name !!}">{{ $title }}</label>
    @endif
    {!! Form::select($name, $values, $value, ['placeholder' => $placeholder, 'class' => "form-control", 'onchange' => "disableFalse()"]) !!}
    @if ($errors->has($name))
        <span class="help-block"><strong>{{ $errors->first($name) }}</strong></span>
    @endif
</div>