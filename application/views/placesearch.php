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
            sessionStorage.setItem("type", "bakery");


        }
        navigator.geolocation.getCurrentPosition(c);

        var map;
        var infowindow;

        function initMap() {

            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;

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

    //        directionsDisplay.setMap(map);



            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch({
                location: pyrmont,
                radius: '5000',
                types: [sessionStorage.getItem("type")]
                    // types: [ document.getElementById('type').value]
            }, callback);


            //calculateAndDisplayRoute(directionsService, directionsDisplay);
            //           calculateAndDisplayRoute(directionsService, directionsDisplay);

        }

        //var lat=String.valueOf(sessionStorage.getItem("lat"));
        /*var lat = sessionStorage.getItem("lat");
        var lng = sessionStorage.getItem("long");
        console.log(parseFloat(sessionStorage.getItem("lat") + sessionStorage.getItem("long")));
        console.log(parseFloat(sessionStorage.getItem("shoplat") + sessionStorage.getItem("shoplong")));
        alert(lat + " " + lng + " (types: " + (typeof lat) + ", " + (typeof lng) + ")");*/
        //var latlng = new google.maps.LatLng(pos.coords.latitude,pos.coords.longitude);
        /*console.log(latlng);
        console.log(''+sessionStorage.getItem("lat")+''+sessionStorage.getItem("long")+'')*/;
        
        //        console.log(google.maps.LatLng(parseFloat(sessionStorage.getItem("lat")),parseFloat(sessionStorage.getItem("long"))));

        /*var lt1=sessionStorage.getItem("lat");
        var lng1=sessionStorage.getItem("long");
        console.log(lt1.concat(lng1));
         var lt2=sessionStorage.getItem("shoplat");
        var lng2=sessionStorage.getItem("shoplong");
        console.log(lt2.concat(lng2));
        */
        
        /*function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            directionsService.route({
                origin: lt1.concat(lng1),
                //origin: 'latlng', //sessionStorage.getItem("lat")+sessionStorage.getItem("long"),
                destination: lt2.concat(lng2), //sessionStorage.getItem("shoplat")+sessionStorage.getItem("shoplong"),
                travelMode: google.maps.TravelMode.DRIVING
            }, function (response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }

        */
        
        
        
        /*var latlng1 = new google.maps.LatLng(lt1, lng1);
        var latlng2 = new google.maps.LatLng(lt2, lng2);
    geocoder.geocode({'latLng1': latlng1}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        
           function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            directionsService.route({
                origin: latlng1,
                //origin: 'latlng', //sessionStorage.getItem("lat")+sessionStorage.getItem("long"),
                destination: latlng2, //sessionStorage.getItem("shoplat")+sessionStorage.getItem("shoplong"),
                travelMode: google.maps.TravelMode.DRIVING
            }, function (response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
          
          
        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });*/
        
        
        
        
        
        
        
        
        
        
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