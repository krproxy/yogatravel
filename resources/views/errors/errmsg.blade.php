<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 20.04.16
 * Time: 17:37
 */?>

@if ($errors->any())
    <div class="alert alert-danger alert-block">
        {{-- <button type="button" class="close" data-dismiss="alert"><i class="fa fa-minus-square"></i></button> --}}
        <strong>Ошибка</strong>
        @if ($message = $errors->first(0, ':message'))
            {{ $message }}
        @else
            Пожалуйста проверьте правильность заполнения формы
        @endif
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-minus-square"></i></button>
        <strong>Success</strong> {{ $message }}
    </div>
@endif
