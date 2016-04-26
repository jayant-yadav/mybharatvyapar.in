<?php

require_once 'init.php';

if(isset($_POST['name'], $_POST['email']))
    {
    $name = $_POST['name'];
    $email = $_POST['email'];


$validate = $mailgunValidate->get('address/validate', [
    'address' => $email
])->http_response_body;

//print_r($validate);
    
    if($validate->is_valid)
        {
        $hash = $mailgunOptIn->generateHash(MAILGUN_LIST, MAILGUN_SECRET, $email);
        //echo "$hash";
        $mailgun->sendMessage(MAILGUN_DOMAIN, [
            'from' => 'noreply@mybharatvyapar.in',
            'to' => $email,
            'subject' => 'Please confirm your subscription to us',
            'html' => "Hello {$name},<br><br>
                        You have signed up for our subscription.Please confirm below.<br><br>http://localhost/final_minor/mailinglist/confirm.php?hash={$hash}"
            
        ]); //change the above address to the domain address later TODO
        
        $mailgun->post('lists/' . MAILGUN_LIST . '/members', [
            'name' =>$name,
            'address' =>$email,
            'subscribed' => 'no'
        ]);
        header('Location: ./'); //redirect to the page telling the user that he has subscribed TODO.
    }
    
    else{
        echo "please enter a valid Emailid";
    }

}

?>



    <!DOCTYPE html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>myBharatVyapar|Subscribe</title>
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
                    <h2>Subscribe with us</h2>
                    <form action="subscribe.php" method="post">
                        <label>Name:
                            <input type="text" name="name" autocomplete="off">
                        </label>
                        <label>Email id:
                            <input name="email" type="email" autocomplete="off">
                        </label>
                        <input type="submit" value="Subscribe" class="button">
                    </form>
                </div>

            </div>
    </body>

    </html>