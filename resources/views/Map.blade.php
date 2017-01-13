@extends('layouts.master')

@section('title', 'Карта мира Yoga Travel – информация об интересных и значимых местах. Приглашения друзей в разных городах')

{{-- @section('description', 'На карте находятся чекины йогов в кемпингах, хостелах, гостиницах. Новости мира от путешественников из разных стран. Развитие людей через путешествия с Yoga Travel.') --}}

@section('description', 'Карта мира Yoga Travel – информация об интересных и значимых местах. Приглашения друзей в разных городах')

@section('customHeader')
    <style type="text/css">
        body {
            /* Margin bottom by footer height */
            margin-bottom: 0!important;
        }
    </style>
@endsection

@section('body')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div id="map-wrapper">
                <div id="map"></div>
            </div>
            <div id="over_map">
                <div class="hidden-xs mapInfoPanelWrapper">
                    <div class="mapInfoPanel">
                        <img src="/img/SVG/menu_map/left_circle_98x85.png" alt="">
                        <div class="mapInfoPanelCenter inline" data-toggle="buttons">
                            <label class="mapInfoPanelBtn btn btn-checkInn" onclick="toggle('inputAll', 'checkInnAll')">
                                <input class="checkInnBox" type="checkbox" autocomplete="off" id="inputAll">
                            </label>
                                    <span class="mapInfoPanelCell checkInnString" id="checkInnAll">
                                        {{ isset($checkInnCount) ? $checkInnCount : 0 }}
                                    </span>

                            <label class="mapInfoPanelBtn btn btn-tea" onclick="toggle('inputTea', 'checkInnTea')">
                                <input class="teaPointsBox" type="checkbox" autocomplete="off"
                                       id="inputTea">
                            </label>
                                    <span class="mapInfoPanelCell teaString" id="checkInnTea">
                                        {{ isset($teaServiceCount) ? $teaServiceCount : 0 }}
                                    </span>

                            <label class="mapInfoPanelBtn btn btn-couch" onclick="toggle('inputSleep', 'checkInnSleep')">
                                <input class="couchPointsBox" type="checkbox" autocomplete="off"
                                       id="inputSleep">
                            </label>
                                    <span class="mapInfoPanelCell couchString" id="checkInnSleep">
                                        {{ isset($couchServiceCount) ? $couchServiceCount : 0 }}
                                    </span>

                            <label class="mapInfoPanelBtn btn btn-walk" onclick="toggle('inputWalk', 'checkInnWalk')">
                                <input class="tableCell walkPointsBox" type="checkbox" autocomplete="off"
                                       id="inputWalk">
                            </label>
                                    <span class="mapInfoPanelCell walkString" id="checkInnWalk">
                                        {{ isset($walkServicesCount) ? $walkServicesCount : 0 }}
                                    </span>
                            <input id="pac-input" class="pull-right controls pac-input pac-input1" type="text"
                                   placeholder="Поиск по адресу">
                        </div>
                        <img src="/img/SVG/menu_map/right_circle_98x85.png" alt="">
                    </div>
                </div>

                <div class="visible-xs mapInfoPanelWrapperXs">
                    <div class="mapInfoPanelXs">
                        <img src="/img/SVG/menu_map/left_circle_98x85.png" alt="">
                        <div class="mapInfoPanelCenterXs inline">
                            <input id="pac-inputXs" class="pull-right controls pac-input pac-input1" type="text"
                                   placeholder="Поиск по адресу">
                        </div>
                        <img src="/img/SVG/menu_map/right_circle_98x85.png" alt="">
                    </div>
                </div>

            </div>
        </div>
        @endsection

        @section('customScripts')
            <script src="https://maps.googleapis.com/maps/api/js?v=3&ext=.js&libraries=places"></script>

            <script>
                var infoWindow = new google.maps.InfoWindow();
                var markerGroups = {
                    "checkInns": [],
                    "walkServices": [],
                    "couchService": [],
                    "teaService": []
                };

                var map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng({{$Lat}}, {{$Lng}}),
                    zoom: 10,
                    mapTypeId: 'roadmap',
                    mapTypeControl: false
                });

                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        map.setCenter(pos);
                    }, function () {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }

                // для боьших екранов
                var addressSearch = (document.getElementById('pac-input'));
                var autocomplete = new google.maps.places.Autocomplete(addressSearch);
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

                // для малых екранов
                var addressSearchXs = (document.getElementById('pac-inputXs'));
                var autocompleteXs = new google.maps.places.Autocomplete(addressSearchXs);
                autocompleteXs.setTypes(['geocode']);
                google.maps.event.addListener(autocompleteXs, 'place_changed', function () {
                    var place = autocompleteXs.getPlace();
                    if (!place.geometry) {
                        return;
                    }
                    var pos = {
                        lat: place.geometry.location.lat(),
                        lng: place.geometry.location.lng()
                    };
                    map.setCenter(pos);
                });


                $.ajax({
                  dataType: 'json',
                  url: 'getMarkers',
                  success: function(markers){
                    markers.forEach(function(marker){
                      createMarker(
                        new google.maps.LatLng(
                          parseFloat(marker.lat),
                          parseFloat(marker.lng)
                        ),
                        marker.description,
                        marker.image,
                        marker.author,
                        marker.authorId,
                        marker.serviceId,
                        marker.avatar,
                        marker.date,
                        marker.address,
                        marker.type,
                        map);
                    });
                  }
                });

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

                function toggleGroup(type) {
                  markerGroups[type].forEach(function(x){x.setVisible(!x.getVisible())});
                }

                function toggle(buttonLabel, counterLabel) {
                    if (document.getElementById(buttonLabel).checked != true)
                      document.getElementById(counterLabel).classList.add("grey-check-map");
                    else
                      document.getElementById(counterLabel).classList.remove("grey-check-map");
                }

                function createMarker(point, description, image, author, authorId, serviceId, avatar, date, address, type, map) {
                    var customIcons = {
                        checkInn:     new google.maps.MarkerImage('img/SVG/png/geometka_check-in.png',  null, null, null, new google.maps.Size(28, 46)),
                        teaService:   new google.maps.MarkerImage('img/SVG/png/geometka_tea.png',       null, null, null, new google.maps.Size(28, 46)),
                        couchService: new google.maps.MarkerImage('img/SVG/png/geometka_couch.png',     null, null, null, new google.maps.Size(28, 46)),
                        walkServices: new google.maps.MarkerImage('img/SVG/png/geometka_walk.png',      null, null, null, new google.maps.Size(28, 46))
                    };
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        icon: customIcons[type] || {},
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

                    var html = "<div><table>"
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
                            + "<tr>";

                            if (image != "default.svg") {
                                html += "<tr>"
                                          + "<td colspan=\"2\"><div class='overflow-h'><IMG BORDER=\"0\" ALIGN=\"Center\"  width='270px' SRC=" + image + "></div></td>"
                                          + "<td colspan=\"2\">"
                                          + "</td>"
                                          + "</tr>";
                            }
                            html +=  "<tr>"
                            + "<td colspan=\"2\" style='padding-bottom: 5px; line-height: normal; text-align: justify;'>" + description + " <a href='/service/" + serviceId + "'>подробнее</a></td>"
                            + "</tr>"
                            + "<tr>"
                            + "<td>" +
                            "<table>" +
                            "<tr>" +
                            "<td style='padding-right: 5px;'><IMG class='img-circle' BORDER=\"0\" height='50px' ALIGN=\"Left\" SRC=\"" + avatar + "\"></td>" +
                            "<td>Автор:<br><a href='/profile/" + authorId + "' " + colorStyle + "><b>" + author + "</b></a></td>" +
                            "</tr>" +
                            "</table>"
                            + "</td>"
                            + "<td style='float: right'>"
                            + "<div id=\"share\"></div>"
                            + "</td>"
                            + "</tr>"
                            + "</table></div>";

                    bindInfoWindow(marker, map, infoWindow, html);
                    return marker;
                }

                function bindInfoWindow(marker, map, infoWindow, html) {
                    google.maps.event.addListener(marker, 'click', function () {
                        infoWindow.setContent(html);
                        infoWindow.open(map, marker);
                        map.setCenter({
                            lat: map.getCenter().lat() + (marker.getPosition().lat() - map.getBounds().getSouthWest().lat()),
                            lng: marker.getPosition().lng()
                        })
                    });
                }

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                            'Error: The Geolocation service failed.' :
                            'Error: Your browser doesn\'t support geolocation.');
                }
            </script>

@endsection
