<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>myBharatVyapar|nearme</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/jquery-1.11.3.min.js"></script>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <!--<script src="application/apiservices.js"></script>
        <script src="library/js/jquery-1.11.3.min.js"></script>-->
</head>

<body>
    <div class="row">
        <div class="large-12 columns">
        </div>
    </div>
    <div class="row">
        <div class="large-5 cloumns large-centered">
            <div class="login-box">
                <h2>find nearby shops</h2>

                <a href="#" id="get_location">Near ME</a>
                <div id="map">
                    <iframe id="google_map" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in?output=embed"></iframe>
					
                </div>

				<script>
				
				var c=function (pos){
					var lat = pos.coords.latitude,
						long = pos.coords.longitude,
						coords = lat+ ', ' + long;
					
					document.getElementById('google_map').setAttribute('src','https://maps.google.co.in/?q='+coords+'&z=60&output=embed')
				}
				
				document.getElementById('get_location').onclick=function(){
				navigator.geolocation.getCurrentPosition(c);
				return false;
				}
				</script>

            </div>

        </div>
</body>

</html>