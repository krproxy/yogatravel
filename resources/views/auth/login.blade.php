@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div id="vertical-line" class="col-sm-6 col-md-4 col-md-offset-2 text-right">
                <div>
                    <div class="panel-heading">
                        <p>Для новых пользователей</p>
                        <p class="text-bigger markedText">Регистрация:</p>
                    </div>


                    <form class="form-horizontal " role="form" method="POST" action="{{ url('/auth/register') }}">
                        {!! csrf_field() !!}
                        <div class="panel-body pull-right">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="col-md-6 ">
                                    <input type="text" class="form-control margin15" name="name" placeholder="Ваше Имя"
                                           value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sename" placeholder="Ваша Фамилия">
                                </div>

                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Ваш E-mail адрес"
                                           value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" placeholder="пароль">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation"
                                           placeholder="повторить пароль">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 ">
                                    <button type="submit" class="btn btn-registration">
                                        <span>Зарегистрироваться</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-sm-6 col-md-4">
                <div class="panel-heading">
                    <p>Для зарегистрированых ранее</p>
                    <p class="text-bigger markedText">Авторизация:</p>

                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="E-mail адрес"
                                       value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="пароль">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label class="cursor" for="remember">--}}
                                        {{--<input type="checkbox" name="remember" id="check-remember">--}}
                                        {{--<span onclick="check()">Запомнить&nbsp;меня</span>--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-registration">Войти</button>
                                {{--<a class="btn btn-link" href="{{ url('/password/email') }}">--}}
                                    {{--<ins>Забыли пароль?</ins>--}}
                                {{--</a>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div><img src="" alt=""></div>
        <br><br>

        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <div>
                    <p>Войти через соцсети:
                        <a class="btn btn-socials" href="{{asset('auth/social/facebook')}}">
                            <i id="facebook-registration" class="fa fa-facebook-official"></i> Facebook</a>
                        <a class="btn btn-socials" href="{{asset('auth/social/vkontakte')}}"><i class="fa fa-vk"></i>
                            Vkontakte</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <script>
        function check() {
            var c = document.getElementById("check-remember");
            if (c.checked != true) {
                c.checked = true;
            }
            else {
                c.checked = false;
            }
        }
    </script>

@endsection