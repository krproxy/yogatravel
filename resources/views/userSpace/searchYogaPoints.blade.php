@extends('layouts.master')

@section('body')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-7 col-md-offset-2 col-md-8">
                @if($type=='services')
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <ul>
                                <li>Введите в строке поиска интересующее вас месторасположение</li>
                                <li>С помощью фильтра выберите интересующее вас опции сервиса YogaFriends
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
                <ul class="nav nav-tabs">
                    <li role="presentation" class="{{$type=="services"?"active":""}}">
                        <a href={{url('searchYogaPoints/services')}}>Поиск приглашений</a>
                    </li>
                    <li role="presentation" class="{{$type=="checkInn"?"active":""}}">
                        <a href={{url('searchYogaPoints/checkInn')}}>Поиск рекомендаций</a>
                    </li>
                    <li role="presentation" class="{{$type=="users"?"active":""}}">
                        <a href={{url('searchYogaPoints/users')}}>Поиск пользователей</a>
                    </li>
                </ul>
            </div>
            <form onkeypress="return event.keyCode != 13;" class="form-horizontal" role="form" method="POST"
                  action="{{ url('searchYogaPointsPost') }}">
                {!! csrf_field() !!}

                <div id="latFromSearch">
                    @if(isset($tmpLat))
                        <input name="checkIn_lat" type="hidden" readonly="readonly" value="{{$tmpLat}}"/>
                    @endif
                </div>

                <div id="longFromSearch">
                    @if(isset($tmpLng))
                        <input name="checkIn_lng" type="hidden" readonly="readonly" value="{{$tmpLng}}"/>
                    @endif
                </div>

                <input name="type" type="hidden" readonly="readonly" value="{{$type}}"/>

                <div class="col-md-6 col-md-offset-3">
                    @if($type=='users')
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <br><input id="tags"
                                       type="text"
                                       class="form-control inputNew"
                                       name="name"
                                       placeholder=" Поиск пользователей"
                                       value="{{isset($targetAuthorName)?$targetAuthorName:null}}">

                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                    @else
                        <div class="form-group">
                            <br><input id="pac-input"
                                       class="pac-input1 form-control inputNew"
                                       type="text"
                                       name="address"
                                       placeholder=" Поиск мест"
                                       value="{{isset($targetAddress)?$targetAddress:null}}">
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-6">
                            <input type="submit" class="btn btn-yoga-custom" value="Поиск">
                        </div>
                    </div>

                </div>
                @if(isset($types) && count($types)!=0)
                    <div class="col-md-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="types[]" value="teaService"
                                       @if(in_array('teaService',$types))checked="checked"@endif>
                                Чаепитие
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="types[]" value="couchService"
                                       @if(in_array('couchService',$types))checked="checked"@endif>
                                Ночлег
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="types[]" value="walkServices"
                                       @if(in_array('walkServices',$types))checked="checked"@endif>
                                Прогулка
                            </label>
                        </div>
                    </div>
                @endif
            </form>
        </div>
        <div class="row">
            <hr>
            <div class="col-md-6 col-md-offset-3">
                @if(isset($yogaPoints))
                    @foreach($yogaPoints as $point)
                        @if($point->type=='teaService')
                            <?php $point_class = "color-tea";$point_img_src = "/img/SVG/button_tea_135x135.svg"; ?>
                        @elseif($point->type=='checkInn')
                            <?php $point_class = "corporateBlue";$point_img_src = "/img/SVG/map_check-in_47x60.svg"; ?>
                        @elseif($point->type=='couchService')
                            <?php $point_class = "color-sleep";$point_img_src = "/img/SVG/button_couch_203_135.svg"; ?>
                        @elseif($point->type=='walkServices')
                            <?php $point_class = "color-walk";$point_img_src = "/img/SVG/button_walk_172x135 (1).svg"; ?>
                        @endif

                        <div class="media">
                            <div class="media-left">
                                <h3><a class="{{$point_class}}" href="/service/{{$point->id}}">
                                        <img class="img37" src="{{$point_img_src}}"
                                             alt="">
                                    </a>
                                </h3>
                            </div>
                            <div class="media-body media-middle">
                                <h3><a class="{{$point_class}}" href="/service/{{$point->id}}">{{$point->address}}</a>
                                </h3>
                            </div>
                        </div>
                        {{$point->description}}
                        <div class="media">
                            <div class="media-left">
                                <a href="{{URL::to('/profile/' . $point->user_id)}}">
                                    <img src="{{isset(\app\User::findOrNew($point->user_id)->avatar)?\app\User::findOrNew($point->user_id)->avatar:asset('img/SVG/profile_12x13.svg')}}"
                                         alt="" class="img37 circle .mt--5 media-object">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Автор:</h4>
                                <a href="{{URL::to('/profile/' . $point->user_id)}}">
                                    <span class="f600-16 {{$point_class}} pm-0">{{\app\User::findOrNew($point->user_id)->name}}</span>
                                </a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @endif
                @if(isset($users))
                    @foreach($users as $user)
                        <div class="media">
                            <div class="media-left">
                                <a href="{{URL::to('/profile/' . $user->id)}}">
                                    <img src="{{isset($user->avatar)&&$user->avatar!=''?$user->avatar:asset('img/SVG/profile_12x13.svg')}}"
                                         alt="" class="img37 circle .mt--5 media-object">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"></h4>
                                <a href="{{URL::to('/profile/' . $user->id)}}">
                                    <span class="f600-16 pm-0">{{$user->name}}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection

@section('customScripts')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    <script>
        function visibleLoad() {
            document.getElementById("upload").style.opacity = "1";
        }

        function initialize() {
            var address = (document.getElementById('pac-input'));
            var autocomplete = new google.maps.places.Autocomplete(address);
            autocomplete.setTypes(['geocode']);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }

                /*********************************************************************/
                /* var address contain your autocomplete address *********************/
                /* place.geometry.location.lat() && place.geometry.location.lat() ****/
                /* will be used for current address latitude and longitude************/
                /*********************************************************************/
                document.getElementById('latFromSearch').innerHTML = "<input name=\"checkIn.lat\" type=\"hidden\" readonly=\"readonly\" value=\"" + place.geometry.location.lat() + "\" />";
                document.getElementById('longFromSearch').innerHTML = "<input name=\"checkIn.lng\" type=\"hidden\" readonly=\"readonly\" value=\"" + place.geometry.location.lng() + "\" />";
//                document.getElementById('okBtn').innerHTML = "<input type=\"submit\" class=\"btn btn-default\" value=\"Сохранить\" />"
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>

    {{--тащим имена юзеров для автокомплита--}}
    <?php
    $usersNames = '[';
    foreach (\App\User::all(['name']) as $user) {
        $usersNames .= '"' . $user->name . '"' . ',';
    }
    $usersNames .= ']';
    ?>

    <script>
        $(function () {
            var availableTags = {!! $usersNames !!};
            $("#tags").autocomplete({
                source: availableTags
            });
        });
    </script>
@endsection