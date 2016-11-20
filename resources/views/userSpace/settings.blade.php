@extends('layouts.master')

@section('body')

    <div class="container spark-screen">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/SettingPost') }}"
              enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div id="foto_load_visible">
                        <div class="circle-div sizeToNI text-center" id="circle-div-file">
                            @if(isset(Auth::user()->avatar))
                                <img class="wh100" src="{!! asset(Auth::user()->avatar) !!}" alt="">
                            @else
                                <img class="wh100" src="{!! asset('img/SVG/profile_12x13.svg') !!}" alt="">
                            @endif
                            <div id="foto-load-transparent" class="cursor">
                                <p>
                                    <img src="/img/SVG/photo.svg" alt="" class="img18 mr10">
                                    Загрузить фото
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">

                        <div class="col-md-6">
                            <input type="file" name="avatar" id="file-load-tr" class="cursor" onchange="disableFalse();this.form.submit()">

                            @if ($errors->has('avatar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <a href="{{ URL::to('messages') }}"
                       class="btn btn-yoga-custom inputNew form-control f300-22 padding-0 sizeToNI">
                        <img src="/img/SVG/message_21x15.svg" alt="" class="img18">
                        Мои сообщения
                        <span> {{ Auth::user()->newMessagesCount() }}</span>
                    </a>
                    <br><br>


                    <button class="btn btn-yoga-custom inputNew form-control f300-22 padding-0 sizeToNI" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      Настройки <span class="caret"></span>
                    </button>

                    <div class="collapse" id="collapseExample">

                        @include('widgets.form._formitem_text', [
                            'name' => 'email', 
                            'title' => 'Ваш E-mail',
                            'value' => isset(Auth::user()->email)?Auth::user()->email:'',
                            'placeholder' => 'Укажите Ваш E-mail адрес' 
                        ])


{{--                         @include('widgets.form._formitem_select', [
                            'name' => 'instructor',
                            'values' => $instructors,
                            'value' => Auth::user()->instructor,
                            'title' => 'Ваш инструктор',
                            'placeholder' => 'Укажите Вашего инструктора'

                        ]) --}}

                      <div class="form-group">
                          <input type="password" class="form-control inputNew" placeholder="новый пароль">
                          <input type="password" class="form-control inputNew" placeholder="повторить новый пароль">
                          <input type="password" class="form-control inputNew" placeholder="старый пароль"
                                 onchange="disableFalse()">
                      </div>




                      @if(false)
                        @include('widgets._facebookSettings')
                      @endif

                    </div>
                    <div class="form-group">
                      <br><input type="submit" id="load" class="btn btn-yoga-custom inputNew submit form-control f300-22 padding-0 sizeToNI"
                                                     value="Сохранить изменения" disabled>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-9 pleft37">
                    <p id="newName">
                        <span class="corporateBlue f400-24"
                              id="nameDel"
                              style="{{isset(Auth::user()->name) && Auth::user()->name != '' ? '':'color: grey;opacity: 0.5;'}}">
                              {{ isset(Auth::user()->name) && Auth::user()->name != '' ? Auth::user()->name : 'Ваше имя' }}
                        </span>
                        <img src="/img/SVG/edit_profile_normal_16x16.svg"
                             alt="" 
                             class="img20 cursor" 
                             id="imgDel"
                             onclick="visibleInput()">
                    </p>
                    <p id="newSurName">
                        <span class="corporateBlue f400-24" 
                              id="nameDelSurName"
                              style="{{isset(Auth::user()->surname) && Auth::user()->surname != '' ? '':'color: grey;opacity: 0.5;'}}">
                              {{ isset(Auth::user()->surname) && Auth::user()->surname != '' ? Auth::user()->surname : 'Ваша фамилия' }}
                        </span>
                        <img src="/img/SVG/edit_profile_normal_16x16.svg"
                             alt="" 
                             class="img20 cursor" 
                             id="imgDelSurName"
                             onclick="visibleInputSurName()">
                    </p>
                    <p id="newStatus">
                        <span class="f300-16"
                              id="span-area"
                              style="{{isset(Auth::user()->shortStory) && Auth::user()->shortStory != '' ? '':'color: grey;opacity: 0.5;'}}">
                              {{ isset(Auth::user()->shortStory) && Auth::user()->shortStory != '' ? Auth::user()->shortStory : 'Коротко о себе' }}
                        </span>
                        <img src="/img/SVG/edit_profile_normal_16x16.svg" class="imgMenu-icons cursor" alt=""
                             onclick="visibleArea()" id="imgArea">
                    </p>

                    <p>
                        <img src="/img/SVG/StickerYogaTravel_37x30.svg" alt="" class="img20">
                        <span CLASS="corporateBlue f600-16">Рекомендую:</span>
                        @foreach($myCheckInns as $checkInn)
                            <a href="/service/{{$checkInn->id}}">{{$checkInn->address}};</a>
                        @endforeach
                        {{--<span class="corporateBlue small">Смотреть все мои места <ins><a href="">на карте</a>--}}
                        {{--</ins></span></span>--}}
                        <a href="{{url('NewCheckInn')}}">
                                <img src="{{asset('img/SVG/plus_10x10.svg')}}"
                                     alt=""
                                     class="imgMenu-icons"> Рекомендовать место</a>
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
                    @endforeach
                    <a href="{{url('NewServicePoint')}}">
                            <img src="{{asset('img/SVG/plus_10x10.svg')}}"
                                 alt=""
                                 class="imgMenu-icons">
                            Создать свое приглашение</a>
                    <!-- <br>
                    <p>
                        <span class="corporateBlue f600-16">Мои путевые заметки:</span>
                        <span></span>
                    </p> -->

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
            inp.setAttribute("onchange", "disableFalse();this.form.submit()");
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
            sps.innerHTML = "{{ isset(Auth::user()->name) && Auth::user()->name != '' ? Auth::user()->name : 'Ваше имя' }} ";
            sps.style.color = "{{ isset(Auth::user()->name) && Auth::user()->name != '' ? '' : 'grey' }}";
            sps.style.opacity = "{{ isset(Auth::user()->name) && Auth::user()->name != '' ? '1' : '0.5' }}";
            sps.classList.add("corporateBlue");
            sps.classList.add("f400-24");
            sps.setAttribute("id", "nameDel");
            i3.setAttribute("width", "20px");
        }


        function visibleInputSurName() {
            var i3 = document.getElementById("imgDelSurName");
            i3.setAttribute("width", "0");
            var sp = document.getElementById("nameDelSurName");
            newSurName.removeChild(sp);
            var inp = document.createElement("input");
            newSurName.appendChild(inp);
            inp.oninput = function () {
                disableFalse();
            };
            inp.setAttribute("autofocus", "autofocus");
            inp.setAttribute("value", "{{ isset(Auth::user()->surname)?Auth::user()->surname:'' }}");
            inp.setAttribute("id", "newSurNameInp");
            inp.setAttribute("onchange", "disableFalse();this.form.submit()");
            inp.setAttribute("name", "surname");
            inp.classList.add('newInpInline');
            inp.classList.add('form-control');
            var close = document.createElement("span");
            newSurName.appendChild(close);
            close.innerHTML = " X ";
            close.classList.add("span-close");
            close.setAttribute("id", "close-sur-name");
            close.setAttribute("onclick", "closeVisibleInputSurName()");
        }
        function closeVisibleInputSurName() {
            var s1 = document.getElementById("newSurNameInp");
            var s2 = document.getElementById("close-sur-name");
            var i3 = document.getElementById("imgDelSurName");
            newSurName.removeChild(s2);
            newSurName.removeChild(s1);
            var sps = document.createElement("span");
            newSurName.insertBefore(sps, i3);
            sps.innerHTML = "{{ isset(Auth::user()->surname) && Auth::user()->surname != '' ? Auth::user()->surname : 'Ваша фамилия' }} ";
            sps.style.color = "{{ isset(Auth::user()->surname) && Auth::user()->surname != '' ? '' : 'grey' }}";
            sps.style.opacity = "{{ isset(Auth::user()->surname) && Auth::user()->surname != '' ? '1' : '0.5' }}";
            sps.classList.add("corporateBlue");
            sps.classList.add("f400-24");
            sps.setAttribute("id", "nameDelSurName");
            i3.setAttribute("width", "20px");
        }


        function visibleArea() {
            var i3 = document.getElementById("imgArea");
            var sp = document.getElementById("span-area");
            newStatus.removeChild(sp);
            var inp = document.createElement("textarea");
            newStatus.appendChild(inp);
            inp.innerHTML = "{{ isset(Auth::user()->shortStory) ? Auth::user()->shortStory : '' }}";
            inp.oninput = function () {
                disableFalse();
            };
            inp.setAttribute("autofocus", "autofocus");
            inp.setAttribute("id", "newNameArea");
            inp.setAttribute("onchange", "disableFalse();this.form.submit()");
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
            sps.innerHTML = "{{ isset(Auth::user()->shortStory) && Auth::user()->shortStory != '' ? Auth::user()->shortStory : 'Коротко о себе' }}";
            sps.style.color = "{{ isset(Auth::user()->shortStory) && Auth::user()->shortStory != '' ? '' : 'grey' }}";
            sps.style.opacity = "{{ isset(Auth::user()->shortStory) && Auth::user()->shortStory != '' ? '1' : '0.5' }}";
            sps.setAttribute("id", "span-area");
            i3.setAttribute("width", "20px");
        }

        function disableFalse() {
            var dis = document.getElementById("load");
            dis.disabled = false;
        }

    </script>


@endsection
