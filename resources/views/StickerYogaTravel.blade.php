@extends('layouts.master')

@section('title', 'Стикеры Yoga Travel рекомендуют значимые места')

{{-- @section('description', 'Йоги, путешественники клеят стикеры во всех странах мира. Странники узнают о лучших хостелах, кемпингах, местах зеленого туризма, транспорте, вариантах couchsurfing.') --}}

@section('description', 'Стикеры Yoga Travel рекомендуют значимые места')


@section('customHeader')
    <link href="/css/jquery.bxslider.css" rel="stylesheet"/>
@endsection

@section('body')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-left">
                <h1 class="corporateBlue string pleft37">#Sticker<span class="string600">Yoga</span>Travel</h1><br>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <img class="img-responsive" src="/img/SVG/stickeryogatravel.svg" alt="">
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 text-justify pleft37">
                <div class="row">
                    <div class="col-md-12">
                        <p>Яркие <span class="markedText">#‎stickeryogatravel</span> в виде логотипа YogaTravel – это маркеры, которые можно увидеть по всему миру и ощутить чувство сопричастности с теми, кто отождествляет себя с идеями нашего проекта.</p>

                        <p>Йоги много путешествуют и встречают на своем пути потоковые, интересные и просто вкусные места. Некоторые из них особенно впечатляют и запоминаются. Такие места хочется порекомендовать друзьям. Это может быть место силы, дружелюбное кафе, гостеприимный хостел/гостиница, заботливый перевозчик, уникальная достопримечательность, ключевые ашрамы йоги. Это очень ценные переживания и значимая информация для других путешественников. В этих местах ты можешь наклеить <span class="markedText">#‎stickeryogatravel</span> или просто сфотографироваться, а потом выложить свою фото-рекомендацию на карте YogaTravel с описанием того, что именно тебя впечатлило. Также ты можешь комментировать подсказки других путешественников и делиться своими переживаниями, дополняя информацию об этом месте.</p>

                        <p>Таким образом, ценный опыт наших путешественников остается не только в их памяти, но и становится информационной опорой и подсказкой всем последующим за ними!</p>

                        <p> Всем желающим взять в свое путешествие <span class="markedText">#‎stickeryogatravel</span>
                            можно обратится в следующие места:</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-9 pleft37">
                <div class="row text-center">
                    <div class="col-sm-4 listbar">
                        <p><img class="h100" src="/img/SVG/pKhkwqSp5lc.jpg" alt="logo"></p>
                        <p class="text-uppercase text-big">Kamalaya</p>
                        <p>Sutra Bar</p>
                        <p class="markedText"><img class="teaMarker" src="/img/SVG/geometka_tea.svg" alt=""> Харьков</p>
                        <p>Алчевских, 31</p>
                        <p>+38 (050) 864 53 84</p>
                    </div>

                    <div class="col-sm-4 listbar">
                        <p><img class="h100" src="/img/SVG/logo_pacha_mama_105x105.svg" alt="logo"></p>
                        <p class="text-big">Pacha Mama</p>
                        <p>Ресторан-бар</p>
                        <p class="markedText"><img class="teaMarker" src="/img/SVG/geometka_tea.svg" alt=""> Харьков</p>
                        <p>Петровского 38</p>
                        <p>+38 (066) 689 99 22</p>
                    </div>

                    <div class="col-sm-4 listbar">
                        <p><img class="h100" src="/img/SVG/logo_UFY_105x105.png" alt="logo"></p>
                        <p class="text-big">Инструктора УФЙ</p>
                        <p>Школа йоги</p>
                        <p class="markedText"><img class="teaMarker" src="/img/SVG/geometka_tea.svg" alt=""> yoga.net.ua</p>
                        <p class="text-left">Филиалы УФЙ в разных городах</p>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::check())
        <div class="row">
            <div class="col-md-6 col-md-offset-3 pleft37 text-center">
                {{--                <br><a href="{{asset('NewCheckInn')}}" class="btn btn-yoga">Выложить свой #‎stickeryogatravel</a>--}}
                <br><a href="{{asset('NewCheckInn')}}" class="btn btn-yoga-custom"><span style="font-size: 24px">Выложить свой #‎stickeryogatravel</span></a>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="corporateBlue">Новые места, отмеченные стикерами <strong>Yoga</strong>travel:</h1><br>
            </div>

            <div class="slider1" style="line-height: 100%;vertical-align: bottom">
                @foreach($stickers as $sticker)
                    @if(!empty($sticker->attaches->first()->filename))
                        <div class="slide">
                            <a class="fancybox" rel="group"
                               href="{{URL::to($sticker->attaches->first()->filename)}}"><img
                                        src="{{URL::to($sticker->attaches->first()->filename.'/300/150/chunk')}}"
                                        alt="{{$sticker->attaches->first()->alt}}"
                                        title="{{$sticker->attaches->first()->title}}"/></a>
                            <span class="corporateBlue">#‎stickeryogatravel</span><br>
                            <a href="{{url("Map?Lat={$sticker->latitude}&Lng={$sticker->longitude}")}}"
                               class="grey-check-map"
                               style="font-size: 12px">{{$sticker->address}}</a><br>
                            <span style="font-size: 10px">{{$sticker->description}}</span>
                            <div style="height: 20px"></div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('customScripts')
    <script src="/js/jquery.bxslider.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.slider1').bxSlider({
                slideWidth: 900,
                minSlides: 4,
                maxSlides: 4,
                moveSlides: 1,
                slideMargin: 10,
                pager: false
            });
        });
    </script>

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen"/>
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css"
          media="screen"/>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css"
          media="screen"/>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".fancybox").fancybox();
        });
    </script>
@endsection
