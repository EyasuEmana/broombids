<?php

// require_once("../../../vendor/autoload.php");
require_once(__DIR__ . '/../../../vendor/autoload.php');
  $google_client = new Google_Client();

  $google_client->setClientId('169270268630-togak58q1gukpvujdc3g69akkut52kt6.apps.googleusercontent.com'); //Define your ClientID

  $google_client->setClientSecret('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'); //Define your Client Secret Key

  $google_client->setRedirectUri('https://localhost/broombids.com/'); //Define your Redirect Uri

  $google_client->addScope('email');

  $google_client->addScope('profile');

  

?>

