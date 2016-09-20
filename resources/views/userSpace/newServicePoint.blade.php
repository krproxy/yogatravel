@extends('layouts.master')

@section('body')
    {{--<div class="container spark-screen">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-6 col-md-offset-3">--}}
    {{--<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"--}}
    {{--action="{{ url('/NewYogaPoint') }}"--}}
    {{--enctype="multipart/form-data">--}}
    {{--{!! csrf_field() !!}--}}

    {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}

    {{--<div class="col-md-6 col-md-offset-3">--}}
    {{--<input type="text" class="form-control inputNew" name="name"--}}
    {{--value="" placeholder="Название" autofocus>--}}

    {{--@if ($errors->has('name'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('name') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">--}}


    {{--<div class="col-md-6 col-md-offset-3">--}}
    {{--<textarea id="textareaNew" class="form-control inputNew" name="description"--}}
    {{--placeholder="Описание"></textarea>--}}

    {{--@if ($errors->has('description'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('description') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--<div class="col-md-6 col-md-offset-3">--}}
    {{--<label for="type">Выберите тип:</label>--}}
    {{--<select class="form-control" id="type" name="type">--}}
    {{--<option value="teaService">чаепитие</option>--}}
    {{--<option value="couchService">ночлег</option>--}}
    {{--<option value="walkServices">прогулка</option>--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}

    {{--<div class="col-md-6 col-md-offset-3">--}}
    {{--<input id="pac-input" class="pac-input1 form-control inputNew" type="text" name="address"--}}
    {{--placeholder=" расположение">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}

    {{--<div class="col-md-6 col-md-offset-3">--}}
    {{--<label for=""><span class="markedText"><ins>Выберите фотографию:</ins></span> </label>--}}
    {{--<input type="file" id="upload" name="images[]" class="cursor" multiple--}}
    {{--accept="image/jpeg,image/png,image/gif">--}}

    {{--</div>--}}

    {{--</div>--}}
    {{--<br>--}}
    {{--<div class="form-group">--}}

    {{--<div class="col-md-6 col-md-offset-3 text-center">--}}
    {{--<input type="reset" class="btn-form" value="Отменить">--}}
    {{--<input type="submit" id="load" class="btn-form btn-form1" disabled="disabled"--}}
    {{--value="Загрузить">--}}
    {{--</div>--}}
    {{--</div>--}}


    {{--?????????????????????????????????-----------------------}}
    {{--<div id="latFromSearch"></div>--}}
    {{--<div id="longFromSearch"></div>--}}

    {{--<div class="form-group">--}}
    {{--<div class="col-md-offset-4 col-md-6">--}}
    {{--<div id="okBtn"></div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}



    <div class="container spark-screen">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                          action="{{ url('/NewYogaPoint') }}"
                          enctype="multipart/form-data"
                          id="boatAddForm">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                            <p class="text-left">
                                Опыт человека состоит из связей и коммуникаций с другими людьми. Чем шире и
                                разнообразнее
                                ваш круг общения, тем богаче опыт! Ресурс YogaFriends позволяет йогинам из разных
                                городов и
                                стран встречаться за кофе во время путешествия, селиться друг у друга и знакомиться для
                                совместной поездки:
                            </p>
                            <ol class="text-left count-bracket">
                                <li>Выберите тип приглашения:</li>
                                <div class="form-group">
                                    <div class="row  text-center">
                                        <div class="col-md-3">
                                            <label for="type" onclick="inCheckR()" class="label-radio"
                                                   data-toggle="tooltip" data-placement="top"
                                                   title="Чаепитие">
                                                <img class="img-newService" src="/img/SVG/button_tea_135x135.svg"
                                                     alt=""><br>
                                                <input type="radio" checked name="type" id="itr" value="teaService"><br>

                                            </label>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <label for="type" onclick="inCheckR2()" class="label-radio"
                                                   data-toggle="tooltip" data-placement="top"
                                                   title="Ночлег">
                                                <img class="img-newService" src="/img/SVG/button_couch_203_135.svg"
                                                     alt=""><br>
                                                <input type="radio" name="type" id="itr2" value="couchService"><br>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="type" onclick="inCheckR3()" class="label-radio"
                                                   data-toggle="tooltip" data-placement="top"
                                                   title="Прогулка">
                                                <img class="img-newService" src="/img/SVG/button_walk_172x135 (1).svg"
                                                     alt=""><br>
                                                <input type="radio" name="type" id="itr3" value="walkServices"><br>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <li>Оставьте комментарий о сути вашего приглашения, фото и укажите место:</li>
                                <p class="text-left smaller-text">
                                    Чем уникальнее ваше предложение, тем понятнее станет для путешественников, что они
                                    хотят
                                    именно к вам.
                                </p>
                            </ol>

                            {{--<input type="text" class="form-control inputNew" name="name"--}}
                            {{--value="" placeholder="Название" autofocus>--}}

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

                        <div id="latFromSearch"></div>
                        <div id="longFromSearch"></div>


                        {{--<div class="form-group" >--}}
                        {{--<p  class="text-center">Количество выбраных фото: <span id="remove_0">0</span><span id="uploadName"> </span></p>--}}
                        {{--<div class="fileform">--}}
                        {{--<input id="upload" type="file" name="images[]" class="cursor"--}}
                        {{--multiple accept="image/jpeg,image/png,image/gif"/>--}}
                        {{--<div class="selectbutton"><img id="photo-upload" src="/img/SVG/photo.svg" alt=""> Выбрать--}}
                        {{--фото места--}}
                        {{--</div>--}}
                        {{--<div id="close-open"></div>--}}

                        {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <div action="/happy"
                                 class="dropzone"
                                 id="myDropzone">
                            </div>
                        </div>

                        <input type="submit" id="load" class="btn btn-yoga-custom" disabled="disabled" value="Пригласить">

                        <div class="form-group">
                            {{--<input type="reset" class="btn-form1" value="Отменить">--}}
                        </div>


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
                undisabledSubmit();
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }

                /*********************************************************************/
                /* var address contain your autocomplete address *********************/
                /* place.geometry.location.lat() && place.geometry.location.lat() ****/
                /* will be used for current address latitude and longitude************/
                /*********************************************************************/
                document.getElementById('latFromSearch').innerHTML = "<input class=\"form-control\" name=\"checkIn.lat\" type=\"hidden\" readonly=\"readonly\" value=\"" + place.geometry.location.lat() + "\" />";
                document.getElementById('longFromSearch').innerHTML = "<input class=\"form-control\" name=\"checkIn.lng\" type=\"hidden\" readonly=\"readonly\" value=\"" + place.geometry.location.lng() + "\" />";
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
            // maxFilesize: 10, // MB
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
@endsection
<script>


    function inCheckR() {
        var r1 = document.getElementById("itr");
        r1.checked = true;
    }
    function inCheckR2() {
        var r1 = document.getElementById("itr2");
        r1.checked = true;
    }
    function inCheckR3() {
        var r1 = document.getElementById("itr3");
        r1.checked = true;
    }
</script>
