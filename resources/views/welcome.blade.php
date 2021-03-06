@extends('layouts.master')

@section('title', 'Yoga Travel - о йоге и путешествиях')

{{-- @section('description', 'Сайт проекта Украинской Федерации Йоги Yoga Travel.  Информация о гостиницах, хостелах, транспорте. Новости мира от йогов и путешественников') --}}

@section('description', 'Yoga Travel - о йоге и путешествиях')


@section('body')
    <div class="container-fluid yoga-screen">
        <div class="container">
            <div class="row hidden-xs visible-sm visible-md visible-lg">
                <div style="margin-left: 0; margin-right: 0" class="col-xs-6 col-md-3 ">
                    <img class="mainString" src="/img/SVG/tagline.svg" alt="">
                </div>
                <div class="col-xs-6 col-md-6">
                    <p class="mainString">Дорога &mdash; в сердце йоги. Road is in heart of yoga</p>
                </div>
                <div class="col-xs-8 col-md-2">
                    <img class="mainImage img-responsive" src="/img/SVG/logo_white.svg" alt="">
                </div>
                <div class="col-xs-4 col-md-1">
                    <a href="https://vk.com/yoga_travel_all"><img class="socialBtn" src="/img/SVG/vk.svg" alt=""></a>
                    <a href="https://www.facebook.com/YogaTravel.All"><img class="socialBtn" src="/img/SVG/fb.svg" alt=""></a>
                </div>
            </div>
            <div class="row visible-xs hidden-sm hidden-md hidden-lg">
                <div class="col-xs-12 text-center">
                    <a href="https://vk.com/yoga_travel_all"><img class="socialBtn" src="/img/SVG/vk.svg" alt=""></a>
                    <a href="https://www.facebook.com/YogaTravel.All"><img class="socialBtn" src="/img/SVG/fb.svg" alt=""></a>
                    <hr>
                </div>
                <div class="col-xs-5">
                    <img class="img-responsive" src="/img/SVG/tagline.svg" alt="">
                </div>
                <div class="col-xs-7">
                    <p class="">Дорога &mdash; в сердце йоги. Road is in heart of yoga</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <div class="well-yoga">
                        <h2>YogaTravel</h2>
                        <p class="text-justify">проект Украинской Федерации Йоги, который с 2008 года объединяет
                            осознанных
                            путешественников. За эти годы Yoga Travel стал ассоциироваться с людьми, которые прошли наши
                            тренинги,
                            слушали и читали лекции, помогали и формировали мероприятия, которые мы проводили. За каждым
                            таким событием стоят люди, эмоции, и широкий спектр опыта, которые их объединяют</p>
                    </div>
                    {{--<img class="" src="/img/SVG/bg_text_1920.png" alt="">--}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ">
                <div class="mainYogaBox">
                    <img src="/img/SVG/photo1_1920.png" alt="">

                    <p><br>Мотивирующие<br>лекции</p>
                </div>
                <div class="mainYogaBox">
                    <img src="/img/SVG/photo2_1920.png" alt="">

                    <p><br>Поездки<br>в экзотические места</p>
                </div>
                <div class="mainYogaBox">
                    <img src="/img/SVG/photo3_1920.png" alt="">

                    <p><br>Фотовыставка "Мир<br>глазами йогов"</p>
                </div>
                <div class="mainYogaBox">
                    <img src="/img/SVG/photo4_1920.png" alt="">

                    <p><br>Путешественники</p>
                </div>
                <div class="mainYogaBox">
                    <img src="/img/SVG/photo5_1920.png" alt="">

                    <p><br>Инфраструктура УФЙ</p>
                </div>
            </div>
        </div>
    </div>
@endsection