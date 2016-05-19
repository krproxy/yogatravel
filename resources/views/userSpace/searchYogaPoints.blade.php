@extends('layouts.master')

@section('body')
    {{--    {{dd($types)}}--}}
    <div class="container spark-screen">
        <div class="row">
            {{--<div class="ui-widget">--}}
            {{--<label for="tags">Tags: </label>--}}
            {{--<input id="tags">--}}
            {{--</div>--}}
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/searchYogaPointsPost') }}">
                {!! csrf_field() !!}

                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="tags" type="text" class="form-control inputNew" name="name"
                               placeholder="Имя пользователя">

                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="pac-input" class="pac-input1 form-control inputNew" type="text" name="address"
                               placeholder=" расположение">
                    </div>
                    <div class="form-group">
                        {{--<input type="reset" class="btn-form1" value="Отменить">--}}
                        <div class="col-md-offset-3 col-md-6">
                            <input type="submit" class="btn btn-yoga-custom" value="Поиск">
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="types[]" value="checkInn"
                                   @if(in_array('checkInn',$types))checked="checked"@endif>
                            Места
                        </label>
                    </div>
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
                                    <img src="{{isset(\app\User::findOrNew($point->user_id)->avatar)?$service->user->avatar:asset('img/SVG/profile_12x13.svg')}}"
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
                undisabledSubmit();
//                document.getElementById('okBtn').innerHTML = "<input type=\"submit\" class=\"btn btn-default\" value=\"Сохранить\" />"
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <script>
        $(function () {
            var availableTags = {!! $usersNames !!};
            $("#tags").autocomplete({
                source: availableTags
            });
        });
    </script>
@endsection