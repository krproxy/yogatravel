@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="col-md-8 col-md-offset-2">

                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                          action="{{ url('/NewYogaPoint') }}"
                          enctype="multipart/form-data"
                          id="boatAddForm">
                        {!! csrf_field() !!}

                        <input type="hidden" name="type" value="checkInn">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                            <p class="text-left"><span class="markedText">#stickeryogatravel</span>– это маркер, которым
                                осознанные
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

                                <!--div class="form-group" >
                                <p  class="text-center">Количество выбраных фото: <span id="remove_0">0</span><span id="uploadName"> </span></p>
                                <div class="fileform">
                                    <input id="upload" type="file" name="images[]" class="cursor"
                                           multiple accept="image/jpeg,image/png,image/gif"/>
                                    <div class="selectbutton"><img id="photo-upload" src="/img/SVG/icon_photosticker_35x34.svg" alt=""> Выбрать
                                        фото места
                                    </div>
                                    {{--<div id="close-open"></div>--}}

                                </div>
                            </div-->

                        <div class="form-group">
                            <div action="/happy"
                                 class="dropzone"
                                 id="myDropzone">
                            </div>
                        </div>


                        {{--</div>--}}

                        <div class="form-group">

                            <input type="reset" class="btn-form1" value="Отменить">
                            <input type="submit" id="load" class="btn-form1" disabled="disabled" value="Загрузить"
                                   onclick="VKShare()">

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

        $(function () {
            $('#upload').change(function () {
                $('#uploadName').text($(this.files).length);
                $('#remove_0').remove();
            });
        });
    </script>
    <script>
        // myDropzone is the configuration for the element that has an id attribute
        // with the value my-dropzone (or myDropzone)
        Dropzone.options.myDropzone = {
            url: '/happy',
            dictDefaultMessage: "Кликните, чтобы добавить фото. Также фото можно перетащить мышкой",
            init: function () {
//                this.on("addedfile", function (file) {
//
//                    // Create the remove button
//                    var removeButton = Dropzone.createElement("<button>Remove file</button>");
//
//
//                    // Capture the Dropzone instance as closure.
//                    var _this = this;
//
//                    // Listen to the click event
//                    removeButton.addEventListener("click", function (e) {
//                        // Make sure the button click doesn't submit the form:
//                        e.preventDefault();
//                        e.stopPropagation();
//
//                        // Remove the file preview.
//                        _this.removeFile(file);
//                        // If you want to the delete the file on the server as well,
//                        // you can do the AJAX request here.
//                    });
//
//                    // Add the button to the file preview element.
//                    file.previewElement.appendChild(removeButton);
//                });
                this.on("success", function (file, responseText) {
                    $("#boatAddForm").append($('<input type="hidden" ' +
                            'name="photos[]" ' +
                            'value="' + responseText.fileName + '">'));
                });
            }
        };
    </script>

    @if(Auth::user()->vkontakte_posting_allowed)

        <script src="//vk.com/js/api/openapi.js" type="text/javascript"></script>

        <div id="login_button" onclick="VK.Auth.login(scope=friends,video,offline );"></div>

        <script language="javascript">
            VK.init({
                apiId: 5077814
            });
            function authInfo(response) {
                console.log(response);
                if (response.session) {
                    VK.Api.call('users.get', {user_ids: response.session.mid}, function (r) {
                        if (r.response) {
//                        console.log(r.response)
//                        alert('Привет, ' + r.response[0].first_name);
                        }
                    });
                } else {
//                alert('not auth');
                }
            }
            VK.Auth.getLoginStatus(authInfo);
            //    VK.UI.button('login_button');
            // Post node to vk wall
            function VKShare() {
                var text = $("#textareaNew").val();

                VK.Api.call(
                        'wall.post',
                        {
//                        owner_id: '-GROUP_ID', // '-9089845' минус оставляем для группы'
                            message: text,
                            attachments:'http://yogatravel.guru/StickerYogaTravel'
                        },
                        function (response) {
// If captcha needed.
                            console.log(response);
                        }
                );
            }

        </script>
    @endif
@endsection