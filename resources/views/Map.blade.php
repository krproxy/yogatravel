@extends('layouts.master')

@section('title', 'Карта мира Yoga Travel – информация о вариантах тревела и каучсерфинг')

@section('description', 'На карте находятся чекины йогов в кемпингах, хостелах, гостиницах. Новости мира от путешественников из разных стран. Развитие людей через путешествия с Yoga Travel.')

@section('body')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div id="map-wrapper">
                <div id="map"></div>
            </div>
            <div id="over_map" class="hidden-xs">
                <div class="row mapSearchRow hidden-xs">
                    <div class="hidden-sm col-md-2 col-lg-3 mapSearchRowLeft"></div>
                    <div class="col-sm-12 col-md-8 col-lg-6 mapSearchRowCenter">
                        <div class="">
                            <div class="row mapMenuRow">
                                <div class="col-sm-offset-1 col-sm-6 col-md-offset-0 col-md-9 text-center">
                                    <div data-toggle="buttons">
                                        <label class="btn btn-checkInn" data-toggle="tooltip" data-placement="top"
                                               title="ЧекИны" onclick="toggleGreyAll()" id="bla-bla">
                                            <input class="checkInnBox" type="checkbox" autocomplete="off" id="inputAll">
                                        </label>
                                    <span class="checkInnString" id="checkInnAll"
                                          style="margin-right: 20px;margin-left: 10px">
                                        {{ isset($checkInnCount) ? $checkInnCount : 0 }}
                                    </span>

                                        <label class="btn btn-tea" data-toggle="tooltip" data-placement="top"
                                               title="Чаепитие" onclick="toggleGreyTea()" id="bla-bla1">
                                            <input class="teaPointsBox" type="checkbox" autocomplete="off"
                                                   id="inputTea">
                                        </label>
                                    <span class="teaString process" id="checkInnTea"
                                          style="margin-right: 20px;margin-left: 10px">
                                        {{ isset($teaServiceCount) ? $teaServiceCount : 0 }}
                                    </span>

                                        <label class="btn btn-couch" data-toggle="tooltip" data-placement="top"
                                               title="Ночлег" onclick="toggleGreySleep()" id="bla-bla2">
                                            <input class="couchPointsBox" type="checkbox" autocomplete="off"
                                                   id="inputSleep">
                                        </label>
                                    <span class="couchString process" id="checkInnSleep"
                                          style="margin-right: 10px;margin-left: 10px">
                                        {{ isset($couchServiceCount) ? $couchServiceCount : 0 }}
                                    </span>

                                        <label class="btn btn-walk" data-toggle="tooltip" data-placement="top"
                                               title="Прогулки" onclick="toggleGreyWalk()" id="bla-bla3">
                                            <input class="walkPointsBox" type="checkbox" autocomplete="off"
                                                   id="inputWalk">
                                        </label>
                                    <span class="walkString process" id="checkInnWalk" style="margin-left: 10px;">
                                        {{ isset($walkServicesCount) ? $walkServicesCount : 0 }}
                                    </span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 text-left">
                                    <input id="pac-input" class="controls pac-input pac-input1" type="text"
                                           placeholder="расположение">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden-sm col-md-2 col-lg-3 mapSearchRowRight"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleGreyAll() {
            var l = document.getElementById("checkInnAll");
            var c = document.getElementById("inputAll");
            if (c.checked != true) {
                l.classList.add("grey-check-map");
            }
            else {
                l.classList.remove("grey-check-map");
            }
        }

        function toggleGreyTea() {
            var l = document.getElementById("checkInnTea");
            var c = document.getElementById("inputTea");
            if (c.checked != true) {
                l.classList.add("grey-check-map");
            }
            else {
                l.classList.remove("grey-check-map");
            }
        }

        function toggleGreySleep() {
            var l = document.getElementById("checkInnSleep");
            var c = document.getElementById("inputSleep");
            if (c.checked != true) {
                l.classList.add("grey-check-map");
            }
            else {
                l.classList.remove("grey-check-map");
            }
        }

        function toggleGreyWalk() {
            var l = document.getElementById("checkInnWalk");
            var c = document.getElementById("inputWalk");
            if (c.checked != true) {
                l.classList.add("grey-check-map");
            }
            else {
                l.classList.remove("grey-check-map");
            }
        }

    </script>
@endsection

@section('customScripts')
    <script src="https://maps.googleapis.com/maps/api/js?v=3&ext=.js&libraries=places"></script>



    <script>
        $(".checkInnBox").change(function () {
            toggleGroup('checkInn')
        });
        $(".teaPointsBox").change(function () {
            toggleGroup('teaService')
        });
        $(".couchPointsBox").change(function () {
            toggleGroup('couchService')
        });
        $(".walkPointsBox").change(function () {
            toggleGroup('walkServices')
        });
    </script>

    <script>
        function xmlParse(str) {
            if (typeof ActiveXObject != 'undefined' && typeof GetObject != 'undefined') {
                var doc = new ActiveXObject('Microsoft.XMLDOM');
                doc.loadXML(str);
                return doc;
            }

            if (typeof DOMParser != 'undefined') {
                return (new DOMParser()).parseFromString(str, 'text/xml');
            }

            return createElement('div', null);
        }
        var infoWindow = new google.maps.InfoWindow();
        var customIcons = {
            checkInn: {
                icon: new google.maps.MarkerImage('img/SVG/png/geometka_check-in.png',
                        null, null, null, new google.maps.Size(28, 46))
            },
            teaService: {
                icon: new google.maps.MarkerImage('img/SVG/png/geometka_tea.png',
                        null, null, null, new google.maps.Size(28, 46))
            },
            couchService: {
                icon: new google.maps.MarkerImage('img/SVG/png/geometka_couch.png',
                        null, null, null, new google.maps.Size(28, 46))
            },
            walkServices: {
                icon: new google.maps.MarkerImage('img/SVG/png/geometka_walk.png',
                        null, null, null, new google.maps.Size(28, 46))
            }
        };

        var markerGroups = {
            "checkInns": [],
            "walkServices": [],
            "couchService": [],
            "teaService": []
        };

        function load() {
            var map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng({{$Lat}}, {{$Lng}}),
                zoom: 10,
                mapTypeId: 'roadmap',
                mapTypeControl: false
            });
            var infoWindow = new google.maps.InfoWindow();


            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    map.setCenter(pos);
                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }


            var addressSerach = (document.getElementById('pac-input'));
            var autocomplete = new google.maps.places.Autocomplete(addressSerach);
            autocomplete.setTypes(['geocode']);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }
                var pos = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng()
                };
                map.setCenter(pos);
            });

            var xml = xmlParse('{!! $markerXML !!}');
            var markers = xml.documentElement.getElementsByTagName("marker");
            for (var i = 0; i < markers.length; i++) {
                var description = markers[i].getAttribute("description");
                var image = markers[i].getAttribute("image");
                var date = markers[i].getAttribute("date");
                var author = markers[i].getAttribute("author");
                var authorId = markers[i].getAttribute("authorId");
                var serviceId = markers[i].getAttribute("serviceId");
                var avatar = markers[i].getAttribute("avatar");
                var address = markers[i].getAttribute("address");
                var type = markers[i].getAttribute("type");

                var point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));

                var marker = createMarker(point, description, image, author, authorId, serviceId, avatar, date, address, type, map);
            }
        }

        function createMarker(point, description, image, author, authorId, serviceId, avatar, date, address, type, map) {
            var icon = customIcons[type] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: icon.icon,
                // shadow: icon.shadow,
                type: type
            });
            if (!markerGroups[type]) markerGroups[type] = [];
            markerGroups[type].push(marker);

            var colorStyle;
            var colorGeo;
            var colorShare;


            if (type === "checkInn") {
                colorStyle = "style='color: #1099cc; vertical-align: top; padding-bottom: 5px'";
                colorGeo = "<img src='/img/SVG/geometka_check-in_12x20.svg' class='img18' alt=''>";
                colorShare = "<img src='/img/SVG/share_check-in_18x18.svg' class='img18' alt=''>";
            }

            else if (type === "teaService") {
                colorStyle = "style='color: #d0a102; vertical-align: top; padding-bottom: 5px'";
                colorGeo = "<img src='/img/SVG/geometka_tea_12x20.svg' class='img18' alt=''>";
                colorShare = "<img src='/img/SVG/share_tea_18x18.svg' class='img18' alt=''>";
            }

            else if (type === "couchService") {
                colorStyle = "style='color: #e67a00; vertical-align: top; padding-bottom: 5px'";
                colorGeo = "<img src='/img/SVG/geometka_couch_12x20.svg' class='img18' alt=''>";
                colorShare = "<img src='/img/SVG/share_couch_18x18.svg' class='img18' alt='' style='vertical-align: middle'>";
            }

            else if (type === "walkServices") {
                colorStyle = "style='color: #87d21a; vertical-align: top; padding-bottom: 5px'";
                colorGeo = "<img src='/img/SVG/geometka_walk_12x20.svg' class='img18' alt=''>";
                colorShare = "<img src='/img/SVG/share_walk_18x18.svg' class='img18' alt=''>";
            }


            var html = "<table width='270px; border-radius: 125px;'>"
                    + "<tr>"
                    + "<td colspan=\"2\">" +
                    "<table>" +
                    "<tr style='line-height: 120%;'>" +
                    "<td width='20px' " + colorStyle + ">" + colorGeo + "</td>" +
                    "<td width='165px'  " + colorStyle + "><b>" + address + "</b></td>" +
                    "<td width='85px' style='vertical-align: top'><img width='14px' src='/img/SVG/clock_14x14.svg'>" + " " + date + "</td>" +
                    "</tr>" +
                    "</table>"
                    + "</td>"
                    + "</tr>"
                    + "<tr>"
                    + "<td colspan=\"2\"><div class='overflow-h'><IMG BORDER=\"0\" ALIGN=\"Left\" width='270px' SRC=" + image + "></div></td>"
                    + "<td colspan=\"2\">"
                    + "</td>"
                    + "</tr>"
                    + "<tr>"
                    + "<td colspan=\"2\" style='padding-bottom: 5px;'>" + description + " <a href='/service/" + serviceId + "'>подробнее</a></td>"
                    + "</tr>"
                    + "<tr>"
                    + "<td>" +
                    "<table>" +
                    "<tr>" +
                    "<td style='padding-right: 5px;'><IMG class='img-circle' BORDER=\"0\" width='50px' ALIGN=\"Left\" SRC=\"" + avatar + "\"></td>" +
                    "<td>Автор:<br><a href='/profile/" + authorId + "' " + colorStyle + "><b>" + author + "</b></a></td>" +
                    "</tr>" +
                    "</table>"
                    + "</td>"
                    + "<td style='float: right'>" + colorShare + "</td>"
//                    + "<td style='float: right'><span class='fb-share-button' data-href='/service/" + serviceId + "' data-layout='icon' data-mobile-iframe='true'></span></td>"
                    + "</tr>"
                    + "</table>";
            bindInfoWindow(marker, map, infoWindow, html);
            return marker;
        }

        function toggleGroup(type) {
            for (var i = 0; i < markerGroups[type].length; i++) {
                var marker = markerGroups[type][i];
                if (!marker.getVisible()) {
                    marker.setVisible(true);
                } else {
                    marker.setVisible(false);
                }
            }
        }

        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
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
                alert('estj');
                map.setCenter(place.geometry.location.lat(), place.geometry.location.lng());
                /********************************************************************/
                /* var address contain your autocomplete address *********************/
                /* place.geometry.location.lat() && place.geometry.location.lat() ****/
                /* will be used for current address latitude and longitude************/
                /*********************************************************************/
                document.getElementById('latFromSearch').innerHTML = "<input class=\"form-control\" name=\"checkIn.lat\" type=\"hidden\" readonly=\"readonly\" value=\"" + place.geometry.location.lat() + "\" />";
                document.getElementById('longFromSearch').innerHTML = "<input class=\"form-control\" name=\"checkIn.lng\" type=\"hidden\" readonly=\"readonly\" value=\"" + place.geometry.location.lng() + "\" />";
                document.getElementById('okBtn').innerHTML = "<input type=\"submit\" class=\"btn btn-default\" value=\"Сохранить\" />"
            });
        }

        google.maps.event.addDomListener(window, 'load', load);
    </script>

@endsection