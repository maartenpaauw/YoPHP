<?php

require('yo.class.php');

$api_token   = "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
$link        = "http://www.google.com/";
$username    = "m44rt3np44uw";
$passcode    = 1234;
$email       = "info@example.com";
$description = "This is a test!";
$location    = true;




$Yo = new Yo($api_token);

// CHECK USERNAME
print_r($Yo->checkUsername($username));




$Yo = new Yo($api_token);

// SUBSCRIBERS COUNT
print_r($Yo->subscribers());




$Yo = new Yo($api_token);

// USER
print_r($Yo->user($username, $link));




$Yo = new Yo($api_token);

// ALL
print_r($Yo->all($link));




$Yo = new Yo($api_token);

// CREATE USER
print_r($Yo->createAccount($username, $passcode, $link, $email, $description, $location));





