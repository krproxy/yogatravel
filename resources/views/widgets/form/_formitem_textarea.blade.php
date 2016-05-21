<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 09.05.16
 * Time: 9:54
 */?>
<?php if (!isset($value)) $value = null ?>
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="{!! $name !!}">{{ $title }}</label>
    {!! Form::textarea($name, $value, array('placeholder' =>  $placeholder ,'class' => "form-control")) !!}
    @if ($errors->has($name))
        <span class="help-block"><strong>{{ $errors->first($name) }}</strong></span>
    @endif
</div>