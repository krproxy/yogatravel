@extends('layouts.app')

@section('content')

    <div class="container spark-screen">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/SettingPost') }}"
              enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-3">
                    <div id="foto_load_visible">
                        <div class="circle-div sizeToNI text-center" id="circle-div-file">
                            @if(isset(Auth::user()->avatar))
                                <img class="wh100" src="{!! asset(Auth::user()->avatar) !!}" alt="">
                            @endif
                            <div id="foto-load-transparent" class="cursor">
                                <p>
                                    <img src="/img/SVG/photo.svg" alt="" class="img18 mr10">
                                    Загрузить фото
                                </p>
                            </div>
                        </div>
                    </div>
                    {{--<div class="text-center">--}}
                    {{--@if(isset(Auth::user()->avatar))--}}
                    {{--<img src="{!! asset(Auth::user()->avatar) !!}" alt="">--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">

                        <div class="col-md-6">
                            <input type="file" name="avatar" id="file-load-tr" class="cursor" onchange="disableFalse()">

                            @if ($errors->has('avatar'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    {{--<a href="" class="menuBtn">bbbbbbb--}}
                                    {{--<i class="fa fa-envelope"></i>--}}
                                    {{--count new mail--}}
                                    {{--<span> 2</span>--}}
                                    {{--</a>--}}

                                </span>
                            @endif
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                    {{--<input id="pac-input" class="pac-input1 form-control inputNew" type="text" name="address"--}}
                    {{--placeholder=" расположение" onchange="disableFalse()">--}}
                    {{--</div>--}}

                    <a href="{{ URL::to('messages') }}"
                       class="btn btn-green inputNew form-control f300-22 padding-0 sizeToNI">
                        <img src="/img/SVG/message_21x15.svg" alt="" class="img18">
                        Мои сообщения
                        <span> {{ Auth::user()->newMessagesCount() }}</span>
                    </a>
                    <br><br>
                    {{--<p>Настройки моего профиля:</p>--}}


                    {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                    {{--<label class="col-md-4 control-label">Имя</label>--}}

                    {{--<div class="col-md-6">--}}
                    {{--<input type="text" class="form-control" name="name"--}}
                    {{--value="{{ isset(Auth::user()->name)?Auth::user()->name:'' }}">--}}

                    {{--@if ($errors->has('name'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('name') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">--}}
                    {{--<label class="col-md-4 control-label">Фамилия</label>--}}

                    {{--<div class="col-md-6">--}}
                    {{--<input type="text" class="form-control" name="surname"--}}
                    {{--value="{{ isset(Auth::user()->surname) ? Auth::user()->surname : '' }}">--}}

                    {{--@if ($errors->has('surname'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('surname') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group{{ $errors->has('shortStory') ? ' has-error' : '' }}">--}}
                    {{--<label class="col-md-4 control-label">Коротко о себе</label>--}}

                    {{--<div class="col-md-6">--}}
                    {{--<textarea class="form-control"--}}
                    {{--name="shortStory">{{ isset(Auth::user()->shortStory)?Auth::user()->shortStory:'' }}</textarea>--}}


                    {{--@if ($errors->has('shortStory'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('shortStory') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" class="form-control inputNew"
                               value="{{ isset(Auth::user()->email)?Auth::user()->email:'' }}"
                               onchange="disableFalse()">
                        {{--<p id="newMail">--}}
                        {{--<span onclick="visibleMail()" id="span-mail" class=" inputNew" name="email">--}}
                        {{--{{ isset(Auth::user()->email)?Auth::user()->email:'' }}--}}
                        {{--<img src="/img/SVG/edit_11x11.svg" class="imgMenu-icons cursor" alt="Редактировать">--}}
                        {{--</span>--}}
                        {{--</p>--}}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control inputNew" placeholder="новый пароль">
                        <input type="password" class="form-control inputNew" placeholder="повторить новый пароль">
                        <input type="password" class="form-control inputNew" placeholder="старый пароль"
                               onchange="disableFalse()">
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"
                                   name="facebook_posting_allowed"
                                   {{Auth::user()->facebook_posting_allowed ? 'checked="checked"' : ''}}
                                   onchange="disableFalse()">
                            Постить мои приглашения и рекомендации в facebook
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"
                                   name="vkontakte_posting_allowed"
                                   {{Auth::user()->vkontakte_posting_allowed ? 'checked="checked"' : ''}}
                                   onchange="disableFalse()">
                            Постить мои приглашения и рекомендации в vkontakte
                        </label>
                    </div>

                    <div class="form-group">
                        <input type="submit" id="load" class="btn inputNew submit" value="Сохранить изменения" disabled>
                    </div>

                    {{--<p class="f300-21 ">Связанные аккаунты:</p>--}}
                    {{--<a class="f300-22 btn btn-soc facebook-color mb14">--}}
                    {{--<i class="fa fa-facebook-official" ></i>--}}
                    {{--Facebook--}}

                    {{--</a>--}}
                    {{--<button class="f300-22 btn btn-soc mb14 vk-color">--}}
                    {{--<i class="fa fa-vk"></i>--}}
                    {{--Vkontakte--}}

                    {{--</button>--}}
                    {{--<button class="f300-22 btn btn-soc google-color mb14">--}}
                    {{--<img src="/img/SVG/googleplus_24x26.svg" alt="" class="pull-left icon-soc-btn">--}}
                    {{--Google +--}}

                    {{--</button>--}}
                </div>

                <div class="col-md-9 pleft37">
                    <p id="newName">
                        <span class="corporateBlue f400-24"
                              id="nameDel">{{ isset(Auth::user()->name)?Auth::user()->name:'' }}</span>
                        <img src="/img/SVG/edit_profile_normal_16x16.svg" alt="" class="img20 cursor" id="imgDel"
                             onclick="visibleInput()">


                    </p>
                    <p id="newStatus">
                        <span class="f300-16"
                              id="span-area">{{ isset(Auth::user()->shortStory)?Auth::user()->shortStory:'' }}</span>
                        <img src="/img/SVG/edit_profile_normal_16x16.svg" class="imgMenu-icons cursor" alt=""
                             onclick="visibleArea()" id="imgArea">
                    </p>

                    <p>
                        <img src="/img/SVG/StickerYogaTravel_37x30.svg" alt="" class="img20">
                        <span CLASS="corporateBlue f600-16">Рекомендую:</span>
                        @foreach($myCheckInns as $checkInn)
                            <a href="/service/{{$checkInn->id}}">{{$checkInn->address}};</a>
                        @endforeach<br>
                        {{--<span class="corporateBlue small">Смотреть все мои места <ins><a href="">на карте</a>--}}
                        {{--</ins></span></span>--}}
                    </p>
                    <br>
                    <p>
                        <img src="/img/SVG/YogaFriendsServes_50x22.svg" alt="" class="img20">
                        <span class="corporateBlue f600-16">Приглашаю:</span>
                    </p>
                    @foreach($myServices as $service)
                        <p>
                            <?php
                            if ($service->type === "checkInn")
                                echo "<img width='20px' src=\"/img/SVG/png/geometka_check-in.png\">";
                            else if ($service->type === "teaService")
                                echo "<img width='20px' src=\"/img/SVG/png/geometka_tea.png\">";
                            else if ($service->type === "couchService")
                                echo "<img width='20px' src=\"/img/SVG/png/geometka_couch.png\">";
                            else if ($service->type === "walkServices")
                                echo "<img width='20px' src=\"/img/SVG/png/geometka_walk.png\">";
                            ?>
                            {{$service->description}}
                            <a href="/service/{{$service->id}}">подробнее</a>
                        </p>
                    @endforeach<br>
                    <br>
                    <p>
                        <span class="corporateBlue f600-16">Мои путевые заметки:</span>
                        <span></span>
                    </p>

                </div>
            </div>
        </form>
    </div>
@endsection




@section('customScripts')
    <script>
        $(function () {
            $('#foto_load_visible').hover(
                    function () {
                        $('#foto-load-transparent').css('opacity', '0.5');
                    },
                    function () {
                        $('#foto-load-transparent').css('opacity', '0');
                    }
            )
        });

        $(function () {
            $('#file-load-tr').hover(
                    function () {
                        $('#foto-load-transparent').css('opacity', '0.5');
                    },
                    function () {
                        $('#foto-load-transparent').css('opacity', '0');
                    }
            )
        });

        $(function () {
            $('#imgDel').hover(
                    function () {
                        $(this).attr("src", "/img/SVG/edit_profile_active_16x16.svg");
                    },
                    function () {
                        $(this).attr("src", "/img/SVG/edit_profile_normal_16x16.svg");
                    }
            )
        });
        $(function () {
            $('#imgArea').hover(
                    function () {
                        $(this).attr("src", "/img/SVG/edit_profile_active_16x16.svg");
                    },
                    function () {
                        $(this).attr("src", "/img/SVG/edit_profile_normal_16x16.svg");
                    }
            )
        });

        function visibleInput() {
            var i3 = document.getElementById("imgDel");
            i3.setAttribute("width", "0");
            var sp = document.getElementById("nameDel");
            newName.removeChild(sp);
            var inp = document.createElement("input");
            newName.appendChild(inp);
            inp.oninput = function () {
                disableFalse();
            };
            inp.setAttribute("autofocus", "autofocus");
            inp.setAttribute("value", "{{ isset(Auth::user()->name)?Auth::user()->name:'' }}");
            inp.setAttribute("id", "newNameInp");
            inp.setAttribute("onchange", "disableFalse()");
            inp.setAttribute("name", "name");
            inp.classList.add('newInpInline');
            inp.classList.add('form-control');
            var close = document.createElement("span");
            newName.appendChild(close);
            close.innerHTML = " X ";
            close.classList.add("span-close");
            close.setAttribute("id", "close-name");
            close.setAttribute("onclick", "closeVisibleInput()");
        }
        function closeVisibleInput() {
            var s1 = document.getElementById("newNameInp");
            var s2 = document.getElementById("close-name");
            var i3 = document.getElementById("imgDel");
            newName.removeChild(s2);
            newName.removeChild(s1);
            var sps = document.createElement("span");
            newName.insertBefore(sps, i3);
            sps.innerHTML = "{{ isset(Auth::user()->name)?Auth::user()->name:'' }} ";
            sps.classList.add("corporateBlue");
            sps.classList.add("f400-24");
            sps.setAttribute("id", "nameDel");
            i3.setAttribute("width", "20px");
        }
        function visibleArea() {
            var i3 = document.getElementById("imgArea");
            var sp = document.getElementById("span-area");
            newStatus.removeChild(sp);
            var inp = document.createElement("textarea");
            newStatus.appendChild(inp);
            inp.innerHTML = "{{ isset(Auth::user()->shortStory)?Auth::user()->shortStory:'' }}";
            inp.oninput = function () {
                disableFalse();
            };
            inp.setAttribute("autofocus", "autofocus");
            inp.setAttribute("id", "newNameArea");
            inp.setAttribute("onchange", "disableFalse()");
            inp.setAttribute("name", "shortStory");
            inp.classList.add('newInpInline');
            inp.classList.add('form-control');
            var close = document.createElement("span");
            newStatus.appendChild(close);
            close.innerHTML = " X ";
            close.classList.add("span-close");
            close.setAttribute("id", "close-area");
            close.setAttribute("onclick", "closeVisibleArea()");
            i3.setAttribute("width", "0");
        }
        function closeVisibleArea() {
            var s1 = document.getElementById("newNameArea");
            var s2 = document.getElementById("close-area");
            var i3 = document.getElementById("imgArea");
            newStatus.removeChild(s2);
            newStatus.removeChild(s1);
            var sps = document.createElement("span");
            newStatus.insertBefore(sps, i3);
            sps.innerHTML = "{{ isset(Auth::user()->shortStory)?Auth::user()->shortStory:'' }}";
            sps.setAttribute("id", "span-area");
            i3.setAttribute("width", "20px");
        }

        function disableFalse() {
            var dis = document.getElementById("load");
            dis.disabled = false;
        }

    </script>


@endsection