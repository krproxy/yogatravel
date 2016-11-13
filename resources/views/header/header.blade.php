<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 20.04.16
 * Time: 17:34
 */ ?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-lg-3 ">
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
                    <a class="navbar-brand hidden-xs hidden-sm hidden-md visible-lg" href="{{url('/')}}">
                        <img src="{{asset('img/SVG/logo.svg')}}"
                             alt="Brand"
                             class="image-logo">
                    </a>
                    <a class="navbar-brand visible-xs visible-sm visible-md hidden-lg" href="{{url('/')}}">
                        <img src="{{asset('img/SVG/logo_small.png')}}"
                             alt="Brand"
                             class=image-logo">
                    </a>
                </div>
            </div>
            <div class="col-md-11 col-lg-9">
                <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    <ul class="nav navbar-nav">
                        <li @if(isset($currentPage)&&$currentPage=='YogaFriends')class="markedText"@endif>
                            <a href="{{url('YogaFriends')}}">YogaFriends</a></li>
                        <li @if(isset($currentPage)&&$currentPage=='StickerYogaTravel')class="markedText"@endif>
                            <a href="{{url('StickerYogaTravel')}}">Sticker YogaTravel</a></li>
                        @if (Auth::check())
                          <li @if(isset($currentPage)&&$currentPage=='Map')class="markedText"@endif>
                              <a href="{{url('Map')}}">Карта</a></li>
                        @endif
                        <!-- <li @if(isset($currentPage)&&$currentPage=='TravelNotes')class="markedText"@endif>
                            <a href="{{url('TravelNotes')}}">Путевые заметки</a></li> -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <div class="btn-group" role="group">
                                <a class="btn btn-login navbar-btn" href="{{url('auth/login')}}">Вход</a>
                                <a class="btn btn-mail navbar-btn" href="{{url('auth/register')}}">Регистрация</a>
                            </div>
                        @else
                            <div class="btn-group" role="group">
                                <div class="btn-group" role="group">
                                    <button type="button"
                                            class="btn btn-login navbar-btn dropdown-toggle"
                                            id="bg-grey-img"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                        <span class="visible-sm">
                                            {{ substr(explode(" ", Auth::user()->name)[0],0,1) }} ... <span
                                                    class="caret"></span>
                                        </span>
                                        <span class="hidden-sm">
                                            {{ explode(" ", Auth::user()->name)[0] }} <span class="caret"></span>
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu menu-login">
                                        <li><p class="markedText mt14">
                                                <img src="{{asset('img/SVG/YogaFriendsServes_50x22.svg')}}"
                                                     alt=""
                                                     class="imgMenu">
                                                YogaFriends</p></li>
                                        <li><a href="{{url('NewServicePoint')}}">
                                                <img src="{{asset('img/SVG/plus_10x10.svg')}}"
                                                     alt=""
                                                     class="imgMenu-icons">
                                                Создать свое приглашение</a></li>
                                        <li><a href="{{url('AllServicePoints')}}">
                                                <img src="{{asset('img/SVG/edit_11x11.svg')}}"
                                                     alt=""
                                                     class="imgMenu-icons">
                                                Редактировать свои приглашения</a></li>
                                        <li><a href="{{url('searchYogaPoints/services')}}"
                                               class="mb14">
                                                <img src="{{asset('img/SVG/find_12x12.svg')}}"
                                                     alt=""
                                                     class="imgMenu-icons">
                                                Поиск приглашений</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><p class="markedText mt14">
                                                <img src="{{asset('img/SVG/StickerYogaTravel_37x30.svg')}}"
                                                     alt=""
                                                     class="imgMenu">
                                                Sticker YogaTravel</p></li>
                                        <li><a href="{{url('NewCheckInn')}}">
                                                <img src="{{asset('img/SVG/plus_10x10.svg')}}"
                                                     alt=""
                                                     class="imgMenu-icons"> Рекомендовать место</a></li>
                                        <li><a href="{{url('AllCheckInns')}}">
                                                <img src="{{asset('img/SVG/like_13x13.svg')}}"
                                                     alt=""
                                                     class="imgMenu-icons">
                                                Мои рекомендации</a></li>
                                        <li><a href="{{url('searchYogaPoints/checkInn')}}"
                                               class="mb14">
                                                <img src="{{asset('img/SVG/find_12x12.svg')}}"
                                                     alt=""
                                                     class="imgMenu-icons">
                                                Поиск рекомендаций</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{url('Settings')}}" class="mt14">
                                                <img src="{{asset('img/SVG/profile_12x13.svg')}}"
                                                     alt=""
                                                     class="imgMenu-icons">
                                                Мой профайл</a></li>
                                        <li><a href="{{asset('searchYogaPoints/users')}}">
                                                <img src="{{asset('img/SVG/find_12x12.svg')}}"
                                                     alt=""
                                                     class="imgMenu-icons">
                                                Поиск пользователей</a></li>
                                        <li><a href="{{url('auth/logout')}}" class="mb14">
                                                <img src="{{asset('img/SVG/exit_12x12.svg')}}"
                                                     alt=""
                                                     class="imgMenu-icons">
                                                Выйти</a></li>
                                    </ul>
                                </div>
                                <a href="{{url('messages')}}"
                                   class="btn btn-mail navbar-btn"
                                   role="button"
                                   aria-expanded="false">
                                    <img src="{{asset('img/SVG/message_21x15.svg')}}"
                                         alt=""
                                         class="imgMenu-icons">
                                    <span> {{ Auth::user()->newMessagesCount() }}</span>
                                </a>
                            </div>
                        @endif
                    </div>


                    @if(isset($currentPage)&&$currentPage=='Map')
                        <div class="visible-xs well">
                            <div data-toggle="buttons">
                                <label class="mapInfoPanelBtn btn btn-checkInn" onclick="toggleGreyAll()">
                                    <input class="checkInnBox" type="checkbox" autocomplete="off" id="inputAllXs">
                                </label>
                                    <span class="mapInfoPanelCell checkInnString" id="checkInnAllXs">
                                        {{ isset($checkInnCount) ? $checkInnCount : 0 }}
                                    </span>

                                <label class="mapInfoPanelBtn btn btn-tea" onclick="toggleGreyTea()">
                                    <input class="teaPointsBox" type="checkbox" autocomplete="off"
                                           id="inputTeaXs">
                                </label>
                                    <span class="mapInfoPanelCell teaString" id="checkInnTeaXs">
                                        {{ isset($teaServiceCount) ? $teaServiceCount : 0 }}
                                    </span>
                                <hr>
                                <label class="mapInfoPanelBtn btn btn-couch" onclick="toggleGreySleep()">
                                    <input class="couchPointsBox" type="checkbox" autocomplete="off"
                                           id="inputSleepXs">
                                </label>
                                    <span class="mapInfoPanelCell couchString" id="checkInnSleepXs">
                                        {{ isset($couchServiceCount) ? $couchServiceCount : 0 }}
                                    </span>

                                <label class="mapInfoPanelBtn btn btn-walk" onclick="toggleGreyWalk()">
                                    <input class="tableCell walkPointsBox" type="checkbox" autocomplete="off"
                                           id="inputWalkXs">
                                </label>
                                    <span class="mapInfoPanelCell walkString" id="checkInnWalkXs">
                                        {{ isset($walkServicesCount) ? $walkServicesCount : 0 }}
                                    </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
