@extends('layouts.master')

@section('body')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="col-md-8 col-md-offset-2">

                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                          action="{{ url('/editYogaPointPost') }}"
                          enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <input type="hidden" name="pointId" value="{{$YogaPoint->id}}">

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">


                            <textarea id="textareaNew" class="form-control inputNew" name="description" autofocus
                                      rows="6">{{$YogaPoint->description}}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>

                        {{--<div class="form-group">--}}

                        {{--<input id="pac-input" class="pac-input1 form-control inputNew" type="text" name="address"--}}
                        {{--placeholder=" расположение">--}}
                        {{--</div>--}}
                        <br>

                        <div class="form-group">
                            {{--<input type="reset" class="btn-form1" value="Отменить">--}}
                            <input type="submit" id="load" class="btn btn-yoga-custom" value="Сохранить">
                        </div>

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

        function undisabledSubmit() {
            var btn = document.getElementById("load");
            btn.disabled = false;
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
@endsection