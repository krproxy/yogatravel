@extends('layouts.app')

@section('title', $user->name)

@section('description', $user->shortStory)

@section('content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-3">
                <div class="circle-div sizeToNI" id="circle-div-file">
                    <img class="wh100 img-responsive"
                         src="{!! !empty($user->avatar)?asset($user->avatar):'/img/Avatars/photo_default.svg' !!}"
                         alt="">
                </div>
                <br>

                {{--<div class="form-group">--}}
                    {{--<input id="pac-input" class="pac-input1 form-control inputNew" type="text" name="address"--}}
                           {{--placeholder=" расположение" onchange="disableFalse()">--}}
                {{--</div>--}}

                <a href="{{URL::to('messages/create/' . $user->id)}}"
                   class="btn btn-green inputNew form-control f300-22 padding-0 sizeToNI">
                    <img src="/img/SVG/message_21x15.svg" alt="" class="img18">
                    Написать сообщение</span>
                </a>
                <br><br>

            </div>

            <div class="col-md-9 pleft37">
                <p id="newName">
                        <span class="corporateBlue f400-24"
                              id="span-name">{{ $user->name }}</span>
                </p>
                <p id="newStatus">
                        <span class="f300-16"
                              id="span-area">{{ $user->shortStory }}</span>
                </p>
                <p>
                    <img src="/img/SVG/StickerYogaTravel_37x30.svg" alt="" class="img20">
                    <span CLASS="corporateBlue f600-16">Рекомендую:</span>
                    @foreach($user->yogaPoints as $checkInn)
                        @if($checkInn->type==='checkInn')
                            <a href="/service/{{$checkInn->id}}">{{$checkInn->address}};</a>
                        @endif
                    @endforeach<br>
                    {{--<span class="corporateBlue small">Смотреть все мои места <ins><a href="">на карте</a>--}}
                    {{--</ins></span></span>--}}
                </p>
                <br>
                <p>
                    <img src="/img/SVG/YogaFriendsServes_50x22.svg" alt="" class="img20">
                    <span class="corporateBlue f600-16">Приглашаю:</span>
                </p>
                @foreach($user->yogaPoints as $service)
                    @if($service->type!=='checkInn')
                        <p>
                            <?php
                            if ($service->type === "teaService")
                                echo "<img width='20px' src=\"/img/SVG/png/geometka_tea.png\">";
                            else if ($service->type === "couchService")
                                echo "<img width='20px' src=\"/img/SVG/png/geometka_couch.png\">";
                            else if ($service->type === "walkServices")
                                echo "<img width='20px' src=\"/img/SVG/png/geometka_walk.png\">";
                            ?>
                            {{$service->description}}
                            <a href="/service/{{$service->id}}">подробнее</a>
                        </p>
                    @endif
                @endforeach<br>


                <ul>

                </ul>
                <br>
                <p>
                    <span class="corporateBlue f600-16">Мои путевые заметки:</span>
                    <span></span>
                </p>

            </div>
        </div>
    </div>
@endsection

