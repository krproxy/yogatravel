<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 20.04.16
 * Time: 17:34
 */ ?>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.6&appId=1608911852682283";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

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
                        @else
                            <div class="btn-group" role="group">
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
                                    {{-- menuBtn menuBtnMail--}}
                                    <span> {{ Auth::user()->newMessagesCount() }}</span>
                                </a>
                            </div>
                        @endif
                        {{--<li><a class="langItemActive" href="#">Ru</a></li>--}}
                        {{--<li class="langItemDelimiter">|</li>--}}
                        {{--<li><a class="langItem" href="#">En</a></li>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>