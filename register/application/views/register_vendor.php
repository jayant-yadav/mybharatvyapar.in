  <!DOCTYPE html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>myBharatVyapar|register_User</title>
        <link rel="stylesheet" href="../css/foundation.css" />
        <script src="../js/vendor/modernizr.js"></script>
        <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <!--        <script src="application/apiservices.js"></script>-->

          
        <script src="../js/jquery-1.11.3.min.js"></script>
    </head>

    <body>
        <div class="row">
            <div class="large-12 columns">
            </div>
        </div>
        <div class="row">
            <div class="large-5 cloumns large-centered">
                <div class="login-box">
                    <h2>Register</h2>
                    <form action="#" method="post">
                        <label>First Name:
                            <input type="text" name="fname" autocomplete="off">
                        </label>
                        <label>Last Name:
                            <input type="text" type="lname" autocomplete="off">
                        </label>
                            <label>Gender:<br>
                           <div class="switch">
                            Males
                            <input id="gender" type="radio" name="gender" value="male" >
                             <label for="gender"></label>
                             Female:<input type="radio" name="gender" value="female">
                                </div> 
                        </label>
                        <label>Email Id:
                            <input name="email" type="email" autocomplete="off">
                        </label>
                        <label>Password:
                            <input name="password" type="text" autocomplete="off">
                        </label>
                        <label>Phone no:
                            <input name="phno" type="text" autocomplete="off">
                        </label>
                        <label>DOB:
                            <input name="dob" type="date" autocomplete="off">
                        </label>
                        
                        <h4>Shop Details:</h4><br>
                        <label>Name:
                            <input name="name" type="text" autocomplete="off">
                        </label>
                        <label>Type:
                            <select>
                            <option>food</option>
                            <option>mechanics</option>
                            <option>stationay</option>
                            <option>handicraft</option>
                            </select>
                        </label>
                        <label>District:
                            <input name="district" type="text" autocomplete="off">
                        </label>
                        <label>City:
                            <input name="city" type="text" autocomplete="off">
                        </label>
                        <label>Area:
                            <input name="area" type="text" autocomplete="off">
                        </label>
                        <label>Postal code:
                            <input name="postal" type="text" autocomplete="off">
                        </label>
                        <input type="submit" value="submit" class="button">
                    </form>
                </div>

            </div>
    </body>

    </html>