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
                <p class="text-bigger markedText">Уточните данные необходимые при регистрации:</p><br>
            </div>
            <form class="form-horizontal " role="form" method="POST" action="{{ url('auth/registerViaSocialSet') }}">
                {!! csrf_field() !!}
                {{ Form::hidden('name', $name) }}
                {{ Form::hidden('email', $email) }}
                {{ Form::hidden('avatar', $avatar) }}

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
                    @include('widgets.form._formitem_checkbox', ['name' => 'eula', 'label' => 'я соглашаюсь с <a href="' . url('eula') . '">пользовательским соглашением</a> на использование сервиса yogatravel.guru' ])
                </div>
                <div class="col-md-4 col-md-offset-4">
                <br>
                    @include('widgets.form._formitem_btn_submit', ['title' => 'Зарегистрироваться' ])
                </div>
            </form>
        </div>
    </div>
@endsection
