@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="col-md-8 col-md-offset-2">

                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                          action="{{ url('/NewYogaPoint') }}"
                          enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <input type="hidden" name="type" value="checkInn">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                            <p class="text-left"><span class="markedText">#stickeryogatravel</span>– это маркер, которым осознанные
                                путешественники обозначают кафе, хостелы, гостиницы, экстрим-парки,
                                достопримечательности, ашрамы йоги и другие впечатляющие места.</p>
                            <p class="text-left">Для этого:</p>

                            <ul class="text-left">
                                <li>Загрузите фото со стикером Yoga Travel (если под рукой нет наклейки, его можно
                                    нарисовать или распечатать);
                                </li>
                                <li>Отметьте расположение места;</li>
                                <li>Оставьте комментарий для других путешественников, которые посетят рекомендуемое
                                    место.
                                </li>
                            </ul>
                            <p class="text-left">Главная цель – поделиться своим ценным опытом путешествий с друзьями и
                                единомышленниками.</p>


                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">


                            <textarea id="textareaNew" class="form-control inputNew" name="description"
                                      placeholder="Описание" autofocus rows="6"></textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input id="pac-input" class="pac-input1 form-control inputNew" type="text" name="address"
                                   placeholder=" расположение">
                        </div>
                        <br>


                        {{--<div class="form-group" >--}}
                            {{--<div class="col-md-7 col-md-offset-3">--}}
                            {{--<label for=""><span class="markedText"><ins>Выберите фотографию:</ins></span> </label>--}}
                            {{--<input type="file" id="upload" name="images[]" class="cursor" multiple accept="image/jpeg,image/png,image/gif">--}}
                            {{--</div>--}}
                            {{--<div class="fileform">--}}
                                {{--<input id="upload" type="file" name="images[]" class="cursor"--}}
                                       {{--multiple accept="image/jpeg,image/png,image/gif"/>--}}
                                {{--<div class="selectbutton"><img id="photo-upload" src="/img/SVG/icon_photosticker_35x34.svg" alt="">--}}
                                    {{--Выбрать фото со стикером--}}
                                {{--</div>--}}
                                {{--<div id="close-open"></div>--}}
                            {{--</div>--}}
                            <div class="form-group" >
                                <p  class="text-center">Количество выбраных фото: <span id="remove_0">0</span><span id="uploadName"> </span></p>
                                <div class="fileform">
                                    <input id="upload" type="file" name="images[]" class="cursor"
                                           multiple accept="image/jpeg,image/png,image/gif"/>
                                    <div class="selectbutton"><img id="photo-upload" src="/img/SVG/icon_photosticker_35x34.svg" alt=""> Выбрать
                                        фото места
                                    </div>
                                    {{--<div id="close-open"></div>--}}

                                </div>
                            </div>

                        {{--</div>--}}

                        <div class="form-group">

                            <input type="reset" class="btn-form1" value="Отменить">
                            <input type="submit" id="load" class="btn-form1" disabled="disabled" value="Загрузить">

                        </div>


                        {{--?????????????????????????????????-----------------------}}
                        <div id="latFromSearch"></div>
                        <div id="longFromSearch"></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customScripts')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    <script>
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

        function undisabledSubmit() {
            var btn = document.getElementById("load");
            btn.disabled = false;
        }

        google.maps.event.addDomListener(window, 'load', initialize);

        $(function(){
            $('#upload').change(function(){
                $('#uploadName').text($(this.files).length);
                $('#remove_0').remove();
            });
        });
    </script>
@endsection