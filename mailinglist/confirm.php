<?php

require_once 'init.php';

if(isset($_GET['hash']))
    {
    $hash = $mailgunOptIn->validateHash(MAILGUN_SECRET, $_GET['hash']);
    //print_r($hash);
    //var_dump($hash);
    {
        if($hash)
            {
            $list = $hash['mailingList'];
            $email =$hash['recipientAddress'];
            
            $mailgun->put('lists/' . MAILGUN_LIST . '/members/' . $email, [
                'subscribed' => 'yes'
            ]);
            
            $mailgun->sendMessage(MAILGUN_DOMAIN, [
                'from' =>'noreply@mybharatvyapar.in',
                'to' => $email,
                'subject' => 'You have just subscribed',
                'text' =>'Thanks for confirming, you are now subscribed.'
            ]);
            header('Location: ./');
        }
    }
}

?>

