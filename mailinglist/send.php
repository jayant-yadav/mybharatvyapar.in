<?php

require_once 'init.php';

if(isset($_POST['subject'], $_POST['body']))
    {
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    
    $mailgun->sendMessage(MAILGUN_DOMAIN, [
        'from' => 'noreply@mybharatvyapar.in',
        'to' => MAILGUN_LIST,
        'subject' => $subject,
        'html' => "Hello %recipient_fname%,<br>{$body}<br><br><a href=\"%unsubscribe_url%\">Unsubscribe</a>"
    ]);
    header('Location: ./');
}

?>



    <!DOCTYPE html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>myBharatVyapar|send</title>
        <link rel="stylesheet" href="../../site/library/css/foundation.css" />
        <script src="../js/jquery-1.11.3.min.js"></script>
        <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection" />
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
                    <h2>Send Email</h2>
                    <form action="send.php" method="post">
                        <label>Subject:
                            <input type="text" name="subject" autocomplete="off">
                        </label>
                        <label>Body:
                            <textarea name="body" rows="8"></textarea>
                        </label>
                        <input type="submit" value="Send" class="button">
                    </form>
                </div>

            </div>
    </body>

    </html>
