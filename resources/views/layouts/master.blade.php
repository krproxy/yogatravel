<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 20.04.16
 * Time: 17:31
 */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.01.16
 * Time: 3:56
 */ ?>
        <!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    @include('header.head')
    @yield('customHeader')
</head>
<body id="app-layout">
<!--[if lt IE 7]>
<p class="browsehappy">Вы используете <strong>слишком старый</strong> браузер. Пожалуйста <a
        href="http://browsehappy.com/">обновите ваш браузер</a> для нормального серфинга по современным сайтам.</p>
<![endif]-->
<header id="header" class="">
    @include('header.header')
</header>
{{-- @include('errors.errmsg') --}}
@yield('body')
@include('footer.footer')
@include('footer.foot_script')
@yield('customScripts')
</body>
</html>
