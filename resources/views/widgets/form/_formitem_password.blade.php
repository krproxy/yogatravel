<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 09.05.16
 * Time: 18:53
 */ ?>
<?php if (!isset($value)) $value = null ?>
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    @if(isset($title))
        <label for="{!! $name !!}">{{ $title }}</label>
    @endif
{{--    {!! Form::text($name, $value, array('placeholder' =>  $placeholder ,'class' => "form-control")) !!}--}}
    {!! Form::password($name, array('placeholder' =>  $placeholder, 'class' => "form-control")) !!}
    @if ($errors->has($name))
        <span class="help-block"><strong>{{ $errors->first($name) }}</strong></span>
    @endif
</div>

