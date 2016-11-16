@extends('layouts.master')

@section('title', 'Страница регистрации и авторизации')

@section('description', 'Сайт проекта Украинской Федерации Йоги Yoga Travel.  Информация о гостиницах, хостелах, транспорте. Новости мира от йогов и путешественников')

@section('body')
    <div class="container">
        <div class="row">
{{--             <div class="col-md-8 col-md-offset-2 well text-center">
                Авторизуйтесь после активации Вашего профиля инструктором УФЙ
            </div> --}}
            <div class="col-xs-12 text-center">
                <p class="text-bigger markedText">Вход:</p><br>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                {!! csrf_field() !!}
                <div class="col-md-4 col-md-offset-4">
                    @include('widgets.form._formitem_text', ['name' => 'email', 'placeholder' => 'Укажите Ваш E-mail адрес' ])
                </div>
                <div class="col-md-4 col-md-offset-4">
                    @include('widgets.form._formitem_password', ['name' => 'password', 'placeholder' => 'Укажите Ваш пароль' ])
                </div>
                <div class="col-md-4 col-md-offset-4">
                    @include('widgets.form._formitem_btn_submit', ['title' => 'Войти' ])
                </div>
                <div class="col-md-4 col-md-offset-4 text-center markedText">
                    <a href={{ url('password/email') }}><small>Восстановление пароля</small></a>
                </div>
            </form>
            <div class="hidden-xs col-md-8 col-md-offset-2 text-right">
                <hr>
            </div>
            <div class="col-md-6 col-md-offset-3 text-center">
                Войти через соцсети:
                <div class="row"><br>
                    <div class="col-sm-6">
                        <a class="btn btn-socials" href="{{asset('auth/social/facebook')}}">
                            <i id="facebook-registration" class="fa fa-facebook-official"></i> Facebook</a>
                    </div>
                    <hr class="visible-xs">
                    <div class="col-sm-6">
                        <a class="btn btn-socials" href="{{asset('auth/social/vkontakte')}}">
                            <i class="fa fa-vk"></i> Vkontakte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
