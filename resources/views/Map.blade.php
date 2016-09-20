@extends('layouts.master')

@section('title', 'Карта мира Yoga Travel – информация о вариантах тревела и каучсерфинг')

@section('description', 'На карте находятся чекины йогов в кемпингах, хостелах, гостиницах. Новости мира от путешественников из разных стран. Развитие людей через путешествия с Yoga Travel.')

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
                            <label class="mapInfoPanelBtn btn btn-checkInn" onclick="toggleGreyAll()">
                                <input class="checkInnBox" type="checkbox" autocomplete="off" id="inputAll">
                            </label>
                                    <span class="mapInfoPanelCell checkInnString" id="checkInnAll">
                                        {{ isset($checkInnCount) ? $checkInnCount : 0 }}
                                    </span>

                            <label class="mapInfoPanelBtn btn btn-tea" onclick="toggleGreyTea()">
                                <input class="teaPointsBox" type="checkbox" autocomplete="off"
                                       id="inputTea">
                            </label>
                                    <span class="mapInfoPanelCell teaString" id="checkInnTea">
                                        {{ isset($teaServiceCount) ? $teaServiceCount : 0 }}
                                    </span>

                            <label class="mapInfoPanelBtn btn btn-couch" onclick="toggleGreySleep()">
                                <input class="couchPointsBox" type="checkbox" autocomplete="off"
                                       id="inputSleep">
                            </label>
                                    <span class="mapInfoPanelCell couchString" id="checkInnSleep">
                                        {{ isset($couchServiceCount) ? $couchServiceCount : 0 }}
                                    </span>

                            <label class="mapInfoPanelBtn btn btn-walk" onclick="toggleGreyWalk()">
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
                    for (var i = 0; i < markerGroups[type].length; i++) {
                        var marker = markerGroups[type][i];
                        if (!marker.getVisible()) {
                            marker.setVisible(true);
                        } else {
                            marker.setVisible(false);
                        }
                    }
                }

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

            <script>
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

                function load() {
                    var map = new google.maps.Map(document.getElementById("map"), {
                        center: new google.maps.LatLng({{$Lat}}, {{$Lng}}),
                        zoom: 10,
                        mapTypeId: 'roadmap',
                        mapTypeControl: false
                    });

                    // Try HTML5 geolocation.
                    var infoWindow = new google.maps.InfoWindow();
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
                            + "<tr>"
                            + "<td colspan=\"2\"><div class='overflow-h'><IMG BORDER=\"0\" ALIGN=\"Left\" SRC=" + image + "></div></td>"
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
//                    + "<td style='float: right'>" + colorShare + "</td>"
                            + "<td style='float: right'>"
////                    + "<td style='float: right'><span class='fb-share-button' data-href='/service/" + serviceId + "' data-layout='icon' data-mobile-iframe='true'></span></td>"
//
//
//                    + "<a href=\"http://vk.com/share.php?url=_URL_&title=_TITLE_&description=_DESCRIPTION_&image=_URL_TO_IMAGE_\" class=\"btn btn-default\">"
//                    + "<i class=\"fa fa-vk fa-lg vk\"></i>"
//                    + "</a>"
//
//
//                    + "<a href=\"http://www.facebook.com/sharer.php?u=http://yogatravel.guru//service/" + serviceId + "\" class=\"btn btn-default\">"
//                    + "<i class=\"fa fa-thumbs-o-up fa-lg fb\"></i>"
//                    + "</a>"
//
//
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

                google.maps.event.addDomListener(window, 'load', load);
            </script>

@endsection
