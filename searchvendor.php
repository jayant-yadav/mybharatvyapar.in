<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>myBharatVyapar|searchvendor</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/jquery-1.11.3.min.js"></script>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/json2/20150503/json2.js" />

    <!--<script src="application/apiservices.js"></script>
        <script src="library/js/jquery-1.11.3.min.js"></script>-->
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        #map {
            height: 100%;
        }
    </style>
    <script>
        $(document).ready(function(){
            
            var t=document.getElementById('type').value;
            console.log(t);
             localStorage.setItem("type",t );
            
        var c = function (pos) {                   //how is this function working before DOM???
                var lat = pos.coords.latitude,
                    long = pos.coords.longitude,
                    coords = lat + ', ' + long;
                console.log(coords);
                localStorage.setItem("lat", lat);
                localStorage.setItem("long", long);

            }
            navigator.geolocation.getCurrentPosition(c);

            var map;
            var infowindow;

            function initMap() {

                var pyrmont = {
                    lat: parseFloat(localStorage.getItem("lat")), //parseFloat is for converting string to number
                    lng: parseFloat(localStorage.getItem("long"))
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
                    radius: 500,
                    types: [localStorage.getItem("type")]
                }, callback);
            }

            function callback(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        createMarker(results[i]);
                        console.log(results[i]);

                    }
                }
            }

            function createMarker(place) {
                var placeLoc = place.geometry.location;
                var marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location
                });

                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.setContent(place.name);
                    infowindow.open(map, this);
                });
            }
        
        
//        document.getElementById('submit').onclick = function () {
           
        //            return false;
        //        }
        });
        
    </script>
</head>

<body>
    <a href="#" id="get_location">Near ME</a>
    <form>
        <input type="text" id="type" />
        <input type="submit" id="submit" class="button" name="submit" />
    </form>
    <div id="map">

    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByjOkyl56wWPpDcCm-1OyWaOVz620o1ZA&signed_in=true&libraries=places&callback=initMap" async defer></script>
</body>

</html>