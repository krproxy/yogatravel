@extends('layouts.master')

@section('title', 'Пить кофе, переночевать, прогуляться у друзей - Yoga Friends')

{{-- @section('description', 'Yoga Friends – couchsurfing для йогов по всем странам мира. Альтернатива хостелам, отелям, гостиницам, кемпингу. Развитие культуры путешествия.') --}}

@section('description', 'Пить кофе, переночевать, прогуляться у друзей - Yoga Friends')

@section('body')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-left">
                <h1 class="corporateBlue pleft37"><span class="string600">Yoga</span>Friends</h1><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <img class="img-responsive" src="/img/SVG/yogafriends_264x156 (1).svg" alt="">
            </div>
            <div class="col-md-9 pleft37">
                <div class="row">
                    <div class="col-md-12 text-justify">
                        <p>YogaFriends – это дружественное сообщество йогов по всему миру, которые готовы к открытому общению: приглашать и приезжать в гости к друзьям во время путешествий.</p>

                        <p>Зарегистрировавшись на сайте, вы получаете возможность путешествовать, знакомясь с йогами из разных городов и стран. В тоже время, вы можете воспользоваться сервисом YogaFriends, не покидая своего дома – для этого необходимо иметь желание принимать у себя йогов-путешественников из других мест.</p>

                        <p>Становясь частью дружественного сообщества YogaFriends, вы сможете познакомиться с новыми друзьями, их культурой, а также проникнуться их мироощущением и взглядами на практику йоги.</p>

                        <p>Йога объединяет!</p><br>
                    </div>
                </div>
                <div class="row text-left">
                    <div class="yogaFriendsButton text-center">
                        <img class="img-Tea" src="/img/SVG/button_tea_135x135.svg" alt="">

                        <p class="color-tea"><br>
                            <img class="walkMarker" src="/img/SVG/small_geometka_tea_12x20.svg"
                                 alt=""> {{ isset($teaServiceCount) ? $teaServiceCount : 0 }} YogaFriends
                        </p>

                        <p>готовы пообщаться<br>за чашечкой чая</p>
                    </div>
                    <div class="yogaFriendsButton col-md-offset-1 text-center">
                        <img class="img-couch" src="/img/SVG/button_couch_203_135.svg" alt=""><br>

                        <p class="color-sleep"><br><img class="couchMarker"
                                                        src="/img/SVG/small_geometka_couch_12x20.svg" alt="">
                            {{ isset($couchServiceCount) ? $couchServiceCount : 0 }} YogaFriends</p>

                        <p>готовы предоставить<br>ночлег</p>
                    </div>
                    <div class="yogaFriendsButton col-md-offset-1 text-center">
                        <img class="img-walk" src="/img/SVG/button_walk_172x135 (1).svg" alt=""><br>

                        <p class="color-walk"><br>
                            <img class="teaMarker" src="/img/SVG/small_geometka_walk_12x20.svg"
                                 alt=""> {{ isset($walkServicesCount) ? $walkServicesCount : 0 }} YogaFriends</p>

                        <p>хотят погулять</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <p>В "Приглашении" внизу страницы укажите варианты, которые вы можете предложить друзьям: встретиться на чашку кофе и пообщаться, предоставить диван и ночлег или вместе прогуляться по городу. Оставьте как можно больше значимой информации о себе. Чем уникальнее и точнее вы опишите свои интересы, тем вероятнее, что встретите более привлекательного именно для вас гостя.</p>
                    </div>
                </div>
                @if (Auth::check())
                <div class="row">
                    <div class="col-md-5">
                        <br><a href="{{asset('NewServicePoint')}}" class="btn btn-yoga-custom btn-block"><span style="font-size: 24px">Пригласить</span></a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
