<?php

require 'vendor/autoload.php';


define('MAILGUN_KEY', 'key-88299b6a103ceb867b4d034c68444c5e');

define('MAILGUN_PUBKEY', 'pubkey-c10823b85a2e38cb36963cba32430dd2');

define('MAILGUN_DOMAIN', 'sandboxfa8dfb14a3254a60af9d8e3fe458b496.mailgun.org');

define('MAILGUN_LIST', 'news@sandboxfa8dfb14a3254a60af9d8e3fe458b496.mailgun.org');

define('MAILGUN_SECRET', 'mynameisjagga');

$mailgun = new Mailgun\Mailgun(MAILGUN_KEY);
$mailgunValidate = new Mailgun\Mailgun(MAILGUN_PUBKEY);

$mailgunOptIn = $mailgun->OptInHandler();

?>
