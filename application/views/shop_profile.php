<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>myBharatVyapar|user_page</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://localhost/final_project_1/application/views/library/js/vendor/modernizr.js"></script>
    <script src="http://localhost/final_project_1/application/views/application/user_page.js"></script>
    <!--    <script src="library/js/jquery-1.11.3.min.js"></script>-->
    <link rel="stylesheet" href="http://localhost/final_project_1/application/views/library/css/foundation.css" />
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/final_project_1/application/views/shop_profile.css" />
</head>

<body>

    <div class="row">
        <div class="large-12 columns">
            <section id="content"></section>
        </div>
    </div>
    <!--<div class="pic-wrapper">
        <figure class="pic-1"></figure>
        <figure class="pic-2"></figure>
        <figure class="pic-3"></figure>
        <figure class="pic-4"></figure>
    </div>-->

    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Foundation | Welcome</title>
        <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    </head>

    <body>


        <div class="row columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="http://localhost/final_project_1/index.php">Home</a></li>
                    <li><a href="#">Shops</a></li>
                    <li class="disabled">
                        <?php echo $shop_name; ?>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="medium-6 columns">
                <br>
                <img class="thumbnail" src="http://placehold.it/650x350">

            </div>
            <div class="medium-6 large-5 columns">
                <br>
                <h2><?php echo $shop_name; ?></h2>



                <a href="http://localhost/final_project_1/index.php/welcome/map" class="button large expanded">On Map</a>
                <div class=" secondary expanded button-group">


                    <a href="http://localhost/final_project_1/index.php/welcome/subscribe" class="button">following</a>

                    <!--                    <a href="http://localhost/final_project_1/index.php/welcome/comments" class="button" id="com">comments</a>-->
                </div>
                
                <form action="http://localhost/final_project_1/index.php/welcome/comments" method="post">
                    <button id="com" name="com" type="submit" value="<?php echo $id ?>" >comments</button>
                </form>
                <br>
                <form action="http://localhost/final_project_1/index.php/welcome/addtofav" method="post">
                    <button id="fav" name="fav" type="submit" value="<?php echo $id ?> ">Add_to_favourites</button>
                </form>

            </div>

        </div>
        <div class="row">
            <div class="large-6 columns details">
                <br>
                <br>
                <br>


                <ul class="large-block-grid-2">
                    <li>
                        <ul>
                            <li class="add" id="add0"><strong>Address: </strong>
                                <?php echo $street; ?>
                            </li>
                            <li class="timing" id="timing0"><strong>Timings:</strong></li>
                            <li class="rating" id="rating0"><strong>Ratings:</strong>/5.0</li>
                            <li class="coords" id="coords"><strong>Coords: </strong>
                                <div class="coords1" id="<?php echo $lat?>">
                                    <?php echo $lat?>
                                </div>
                                <div class="coords2" id="<?php echo $lang?>">
                                    <?php echo $lang?>
                                </div>
                            </li>

                        </ul>
                    </li>

                </ul>


            </div>
            <div class="large-6 columns">
                <div class="pic-wrapper">
                    <figure class="pic-1"></figure>
                    <figure class="pic-2"></figure>
                    <figure class="pic-3"></figure>
                    <figure class="pic-4"></figure>
                </div>
            </div>


        </div>
        <!--
        <div class="row">
            <div class="large-6 columns">

                <div class="pic-wrapper">
                    <figure class="pic-1"></figure>
                    <figure class="pic-2"></figure>
                    <figure class="pic-3"></figure>
                    <figure class="pic-4"></figure>
                </div>
                
            </div>

        </div>-->



        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
        <script>
            $(document).foundation();
        </script>
        <script>
            sessionStorage.setItem("shoplat", document.getElementsByClassName('coords1')[0].getAttribute("id"));
            sessionStorage.setItem("shoplong", document.getElementsByClassName('coords2')[0].getAttribute("id"));
        </script>

    </body>


    </html>