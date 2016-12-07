@extends('layouts.master')

@section('title', 'Страница регистрации')

@section('description', 'Сайт проекта Украинской Федерации Йоги Yoga Travel.  Информация о гостиницах, хостелах, транспорте. Новости мира от йогов и путешественников')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 well text-center">
                Сервис предназначен для внутреннего использования YogaTravel и YogaFriends
            </div>
            <div class="col-xs-12 text-center">
                <p class="text-bigger markedText">Регистрация:</p><br>
            </div>
            <form class="form-horizontal " role="form" method="POST" action="{{ url('/auth/register') }}">
                {!! csrf_field() !!}

                <?php

                $instructors = App\User::on('mysql_admin')->where('role', '=', 'instructor')->get();
                $values = [];

                $instructors->each(function ($item, $key) use (&$values) {
                    $values[$item->email] = trim($item->name);
                });

                ?>
                <div class="col-md-4 col-md-offset-4">
                    @include('widgets.form._formitem_select', [
                        'name' => 'instructor',
                        'values' => $values,
                        'value' => null,
                        'placeholder' => 'Укажите Вашего инструктора'
                    ])
                </div>
                <div class="col-md-4 col-md-offset-4">
                    @include('widgets.form._formitem_text', ['name' => 'name', 'placeholder' => 'Укажите Ваше имя' ])
                </div>
                <div class="col-md-4 col-md-offset-4">
                    @include('widgets.form._formitem_text', ['name' => 'surname', 'placeholder' => 'Укажите Вашу фамилию' ])
                </div>
                <div class="col-md-4 col-md-offset-4">
                    @include('widgets.form._formitem_text', ['name' => 'email', 'placeholder' => 'Укажите Ваш E-mail адрес' ])
                </div>
                <div class="col-md-4 col-md-offset-4">
                    @include('widgets.form._formitem_password', ['name' => 'password', 'placeholder' => 'Укажите желаемый пароль' ])
                </div>
                <div class="col-md-4 col-md-offset-4">
                    @include('widgets.form._formitem_password', ['name' => 'password_confirmation', 'placeholder' => 'Введите пароль повторно' ])
                </div>
                <div class="col-md-4 col-md-offset-4">
                    @include('widgets.form._formitem_checkbox', ['name' => 'eula', 'label' => 'я соглашаюсь с <a href="' . url('eula') . '">пользовательским соглашением</a> на использование сервиса yogatravel.guru' ])
                </div>
                <div class="col-md-4 col-md-offset-4">
                <br>
                    @include('widgets.form._formitem_btn_submit', ['title' => 'Зарегистрироваться' ])
                </div>
            </form>
            <div class="hidden-xs col-md-8 col-md-offset-2 text-right">
                <hr>
            </div>
             <div class="col-md-6 col-md-offset-3 text-center">
                Зарегистрироваться с помощью:
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
