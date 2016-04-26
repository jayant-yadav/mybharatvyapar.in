<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>myBharatVyapar|placesearch</title>
<!--    <link rel="stylesheet" href="library/css/foundation.css" />-->
    <!--    <script src="library/js/jquery-1.11.3.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!--    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/json2/20150503/json2.min.js" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>

    <!--<script src="application/apiservices.js"></script>
        <script src="library/js/jquery-1.11.3.min.js"></script>-->
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Raleway', sans-serif;
            font-size: 18px;
        }
        
        #map {
            height: 100%;
        }
        
        .columns {
            min-height: 50px;
        }
    </style>
    <script>
        // (function ($) {
        //    $(function () {

        // $('.search').click(function () {


        var c = function (pos) {
            var lat = pos.coords.latitude,
                long = pos.coords.longitude,
                coords = lat + ', ' + long;
            console.log(coords);
            sessionStorage.setItem("lat", lat);
            sessionStorage.setItem("long", long);
            sessionStorage.setItem("type", "store");


        }
        navigator.geolocation.getCurrentPosition(c);

        var map;
        var infowindow;

        function initMap() {

            var pyrmont = {
                lat: parseFloat(sessionStorage.getItem("lat")), //parseFloat is for converting string to number
                lng: parseFloat(sessionStorage.getItem("long"))
            };

            map = new google.maps.Map(document.getElementById('map'), {
                center: pyrmont,
                zoom: 15
            });

            infowindow = new google.maps.InfoWindow({
                map: map
            });





            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch({
                location: pyrmont,
                radius: '500',
                types: [sessionStorage.getItem("type")]
                    // types: [ document.getElementById('type').value]
            }, callback);
        }

        function callback(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                    // console.log(results[i]);
                    console.log(results[i].name);
                    // console.log(results[i].geometry.location);

                }


            }
        }

        function createMarker(place) {
            var placeLoc = place.geometry.location;
            var lat = sessionStorage.getItem("lat");
            var long = sessionStorage.getItem("long");

            var myLatLng = {
                lat: parseFloat(lat),
                lng: parseFloat(long)
            };

            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location,
                animation: google.maps.Animation.DROP
            });

            var mypos = new google.maps.Marker({
                map: map,
                position: myLatLng,
                // icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                label: 'A',
                animation: google.maps.Animation.DROP
            });

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
            });

            google.maps.event.addListener(mypos, 'click', function () {
                infowindow.setContent("YOU ARE HERE");
                infowindow.open(map, this);
            });
        }


        // });
        (function ($) {
            $(function () {

                $('.search').click(function () {
                    sessionStorage.setItem("type", document.getElementById('type').value);
                    location.reload(); //to reload page with the new 'type', but after reloading, the 'type' rests itself to 'store'
                    // console.log(sessionStorage.getItem("item"));
                });

            });
        })(jQuery);
    </script>
</head>

<body>
    <!-- <a href="#" id="get_location">Near ME</a> -->
    <!-- <h1>Local Stores near you<h1> -->
    <!-- WARNING!!!! do not add any <h> or <p> in this area!!! map will not render!!! -->
    <div class="row">
        <div class="medium-4 large-4 columns"></div>
        <div class="medium-4 large-4 columns">
            <input id="type" type="text" placeholder="Store/ stationary/ food joints" />
        </div>
        <div class="medium-4 large-4 columns">
            <button type="submit" class="search">Search</button>
        </div>


    </div>

    <div id="map">

    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByjOkyl56wWPpDcCm-1OyWaOVz620o1ZA&signed_in=true&libraries=places&callback=initMap" async defer></script>
</body>

</html>