<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>myBharatVyapar</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
    <!--        <script src="http://localhost/final_project_1/application/views/library/js/jquery-1.11.3.min.js"></script>-->
    <link rel="stylesheet" href="http://localhost/final_project_1/application/views/library/css/foundation.css" />
    <script src="http://localhost/final_project_1/application/views/library/js/foundation/foundation.js"></script>
    <script src="http://localhost/final_project_1/application/views/library/js/foundation/foundation.reveal.js"></script>

    <script src="http://localhost/final_project_1/application/views/library/js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="https://localhost/final_project_1/application/views/library/js/jquery.reveal.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/json2/20150503/json2.min.js" />
    <script type="text/javascript" src="http://localhost/final_project_1/application/views/application/init.js"></script>
    <link href="http://localhost/final_project_1/application/views/app.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <script>
        $(document).foundation();
    </script>
</head>

<body>

    <section class="hero">
        <!--make a bg img grid having multiple images, fading effect-->
        <div class="row">
            <!--"row" because the page is divided into grids and this framework tells us to do so-->
            <div class="large-12 columns">
                <div class="main-wrapper">
                    <h1>myBharatVyapar</h1>

                    <hr>
                    <div class="row">
                        <div class="large-6 columns large-centered">
                            <ul class="button-group even-4 ">
                                <li><a href="#" class="button">HOME</a></li>
                                <li><a href="#" class="button">ABOUT</a></li>
                                <?php
                                if(!$logged_in)
                                echo '<li><a href="#" data-reveal-id="myModal" class="button" id="loginout0">LOGIN</a></li>';
                                else
                                echo '<li><a href="http://localhost/final_project_1/index.php/welcome/logout" class="button" id="loginout1">LOGOUT</a></li>';
                                ?>

                                <li><a href="#" class="button">SEARCH</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--login modal-->
        <!--        <div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">-->
        
        <!--        </div>-->
        <!--end of login modal-->

        <div class="row">
            <div class="large-6 columns about-box">
                <div class="black-box">
                    <h2>Register Today!</h2>
                    <form method="post" action="#">
                        <!--                       <form method="#">-->
                        <div class="login">
                            <input id="email" type="email" name="email" placeholder="Email ID" aria-label="email" />
                            <input id="tel" type="tel" name="tel" placeholder="Phone Number" aria-label="phone" />
                        </div>
                        <div class="switch radius">
                            <p>Are you a vendor?</p>
                            <input id="yes-no" type="checkbox">
                            <label for="yes-no">
                                <span class="switch-on">Yes</span>
                                <span class="switch-off">No</span>
                            </label>
                        </div>
                        <button class="secondary small button signup">Sign Up →</button>
                        
                    </form>
                    <br>
                                        <h2>Login</h2>

                    <form action="http://localhost/final_project_1/index.php/welcome/login" method="post">
            <input value="" id="loginemail" type="email" class="validate" name="loginemail"  placeholder="Email ID">
<!--            <label for="loginemail">Email</label>-->
            <input id="loginpassword" type="password" class="validate" name="loginpassword"  placeholder="Password">
<!--            <label for="loginpassword">Password</label>-->
            <button type="submit">Login</button>
        </form>
<!--
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
-->
                </div>
            </div>
        </div>
    </section>

    <section class="hero-content">
        <h1 class="head">Business Flourishes here</h1>
        <!--use flolurish design image                  -->
        <div class="row">
            <div class="large-8 columns about-content">
                <h4>Start searching your nearest facilities...</h4>
                <form method="post" action="#">
                    <div class="large-9 small-10 columns">
                        <input type="text" placeholder="Find Stuff" name="search" id="search">
                    </div>
                    <div class="large-3 small-2 columns">
                        <button class="button radius search">Search</button>
                    </div>
                </form>
            </div>
            <div class="large-4 columns">
                <ul class="small-block-grid-2">
                    <li>
                        <a href="#"><img src="http://localhost/final_project_1/application/views/images/spices.png" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="http://localhost/final_project_1/application/views/images/stationery.png" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="http://localhost/final_project_1/application/views/images/food_truck.png" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="http://localhost/final_project_1/application/views/images/grocery.png" /></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div id="search_result"></div>
    <section>
        <div class="row">
            <div class="large-12 columns">
                <div class="panel">
                    <div class="row">
                        <div class="large-9 columns">
                            <h4>Get in touch!</h4>
                            <p>We are happy to get your feedback!</p>
                        </div>
                        <div class="large-3 columns">
                            <a href="#" class="radius button right">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="row">
            <div class="large-6 columns">
                <p>© Copyright hai ye bhaiya.</p>
            </div>
            <div class="large-6 columns">
                <ul class="inline-list right">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>