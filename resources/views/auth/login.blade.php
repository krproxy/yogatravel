@extends('layouts.master')

@section('title', 'Страница регистрации и авторизации')

@section('description', 'Сайт проекта Украинской Федерации Йоги Yoga Travel.  Информация о гостиницах, хостелах, транспорте. Новости мира от йогов и путешественников')

@section('body')
    <div class="container">
        <div class="row">
            <div id="vertical-line" class="col-xs-12 col-sm-6 col-md-4 col-md-offset-2 text-right auth-space">
                <div class="row">
                    <div class="col-xs-12">
                        <p>Для новых пользователей</p>
                    </div>
                    <div class="col-xs-12">
                        <p class="text-bigger markedText">Регистрация:</p>
                    </div>
                </div>
                <div class="row">
                    <form class="form-horizontal " role="form" method="POST" action="{{ url('/auth/register') }}">
                        {!! csrf_field() !!}
                        <br>
                        <div class="col-md-9 col-md-offset-3">
                            @include('widgets.form._formitem_text', ['name' => 'name', 'placeholder' => 'Укажите Ваше имя' ])
                        </div>
                        <div class="col-md-9 col-md-offset-3">
                            @include('widgets.form._formitem_text', ['name' => 'surname', 'placeholder' => 'Укажите Вашу фамилию' ])
                        </div>
                        <div class="col-md-9 col-md-offset-3">
                            @include('widgets.form._formitem_text', ['name' => 'email', 'placeholder' => 'Укажите Ваш E-mail адрес' ])
                        </div>
                        <div class="col-md-9 col-md-offset-3">
                            @include('widgets.form._formitem_password', ['name' => 'password', 'placeholder' => 'Укажите желаемый пароль' ])
                        </div>
                        <div class="col-md-9 col-md-offset-3">
                            @include('widgets.form._formitem_password', ['name' => 'password_confirmation', 'placeholder' => 'Введите пароль повторно' ])
                        </div>
                        <div class="col-md-9 col-md-offset-3">
                            @include('widgets.form._formitem_btn_submit', ['title' => 'Зарегистрироваться' ])
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 auth-space">
                <div class="row">
                    <div class="col-xs-12">
                        <p>Для зарегистрированых ранее</p>
                    </div>
                    <div class="col-xs-12">
                        <p class="text-bigger markedText">Авторизация:</p>
                    </div>
                </div>
                <div class="row">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        {!! csrf_field() !!}
                        <br>
                        <div class="col-md-9">
                            @include('widgets.form._formitem_text', ['name' => 'email', 'placeholder' => 'Укажите Ваш E-mail адрес' ])
                        </div>
                        <div class="col-md-9">
                            @include('widgets.form._formitem_password', ['name' => 'password', 'placeholder' => 'Укажите желаемый пароль' ])
                        </div>
                        <div class="col-md-9">
                            @include('widgets.form._formitem_btn_submit', ['title' => 'Войти' ])
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--<div><img src="" alt=""></div>--}}
        {{--<br><br>--}}
        <div class="row">
            <div class="hidden-xs col-md-8 col-md-offset-2 text-right auth-space">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                Войти через соцсети:
                <div class="row"><br>
                    <div class="col-sm-6 auth-space">
                        <a class="btn btn-socials" href="{{asset('auth/social/facebook')}}">
                            <i id="facebook-registration" class="fa fa-facebook-official"></i> Facebook</a>
                    </div>
                    <hr class="visible-xs">
                    <div class="col-sm-6 auth-space">
                        <a class="btn btn-socials" href="{{asset('auth/social/vkontakte')}}">
                            <i class="fa fa-vk"></i> Vkontakte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection