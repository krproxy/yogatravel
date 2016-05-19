<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <meta name="Description" content="@yield('description')">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <!-- Styles -->

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    {{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">--}}

            <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/site.css" type='text/css'>

    <link rel="stylesheet" href="/js/jquery-ui-1.11.4/jquery-ui.min.css" type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('customHeader')

</head>
<body id="app-layout">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#spark-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/">
                        <img style="height:67px; margin: 0; padding: 0" alt="Brand" src="{{asset('img/SVG/logo.svg')}}">
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    <ul class="nav navbar-nav">
                        <li @if(isset($currentPage)&&$currentPage=='YogaFriends')class="markedText"@endif><a
                                    href="/YogaFriends">YogaFriends</a></li>
                        <li @if(isset($currentPage)&&$currentPage=='StickerYogaTravel')class="markedText"@endif><a
                                    href="/StickerYogaTravel">Sticker YogaTravel</a></li>
                        <li @if(isset($currentPage)&&$currentPage=='Map')class="markedText"@endif><a
                                    href="/Map">Карта</a></li>
                        <li @if(isset($currentPage)&&$currentPage=='TravelNotes')class="markedText"@endif><a
                                    href="/TravelNotes">Путевые заметки</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <a class="btn btn-login navbar-btn" href="/auth/login">Войти</a>
                            <li><a href="/auth/register">Register</a></li>
                        @else
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default">1</button>
                                <button type="button" class="btn btn-default">2</button>

                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-login navbar-btn dropdown-toggle"
                                            id="bg-grey-img" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        {{ Auth::user()->name }}
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu menu-login">
                                        <li><p class="markedText mt14">
                                                <img src="/img/SVG/YogaFriendsServes_50x22.svg" alt="" class="imgMenu">
                                                YogaFriends сервис</p></li>
                                        <li><a href="/NewServicePoint"><img src="/img/SVG/plus_10x10.svg"
                                                                            class="imgMenu-icons"> Создать свое
                                                приглашение</a>
                                        </li>
                                        <li><a href="/AllServicePoints"><img src="/img/SVG/edit_11x11.svg" alt=""
                                                                             class="imgMenu-icons">
                                                Редактировать свои приглашение</a></li>
                                        <li><a href="{{asset('searchYogaPoints/services')}}"
                                               class="mb14"><img src="/img/SVG/find_12x12.svg" class="imgMenu-icons">
                                                Поиск
                                                по приглашениям</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><p class="markedText mt14">
                                                <img src="/img/SVG/StickerYogaTravel_37x30.svg" alt="" class="imgMenu">
                                                Sticker YogaTravel</p></li>
                                        <li><a href="/NewCheckInn"><img src="/img/SVG/plus_10x10.svg"
                                                                        class="imgMenu-icons"> Рекомендовать место</a>
                                        </li>
                                        <li><a href="/AllCheckInns"><img src="/img/SVG/like_13x13.svg"
                                                                         class="imgMenu-icons"> Мои
                                                рекомендации</a></li>
                                        <li><a href="{{asset('searchYogaPoints/checkInn')}}"
                                               class="mb14"><img src="/img/SVG/find_12x12.svg"
                                                                 class="imgMenu-icons"> Поиск
                                                по местам</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="/Settings" class="mt14"><img src="/img/SVG/profile_12x13.svg"
                                                                                  class="imgMenu-icons"> Мой профайл</a>
                                        </li>
                                        <li><a href="/auth/logout" class="mb14"><img src="/img/SVG/exit_12x12.svg"
                                                                                     class="imgMenu-icons" alt=""> Выйти</a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{URL::to('messages')}}" class="btn btn-mail navbar-btn" role="button"
                                   aria-expanded="false">
                                    <img src="/img/SVG/message_21x15.svg" class="imgMenu-icons">
                                     menuBtn menuBtnMail
                                    <span> {{ Auth::user()->newMessagesCount() }}</span>
                                </a>
                            </div>
                        @endif
                        <li><a class="langItemActive" href="#">Ru</a></li>
                        <li class="langItemDelimiter">|</li>
                        <li><a class="langItem" href="#">En</a></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <ul class="list-inline">
                    <li class="footer-social">
                        <a href="https://vk.com/yoga_travel_all"><img class="footer-social-btn"
                                                                      src="/img/SVG/footer_vk_40x41.svg" alt=""></a>
                        <a href="https://www.facebook.com/YogaTravel.All"><img class="footer-social-btn"
                                                                               src="/img/SVG/footer_fb_40x41.svg"
                                                                               alt=""></a>
                    </li>
                    <li class="footer-text">
                        <ul style="list-style-type:none">
                            <li><a href="#">Написать нам</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#FAQ">
                                    Часто задаваемые вопросы
                                </a></li>
                            <li><a href="#" data-toggle="modal" data-target="#rules">
                                    Правила пользования сайтом
                                </a></li>
                            <li class="yoga-copyright">&#169; {{date("Y")}} YogaTravel</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScripts -->
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

<script src="/js/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone-amd-module.js"></script>

<!-- fotorama.css & fotorama.js. -->
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->

@yield('customScripts')

</body>
</html>