YoPHP
=====

A PHP class for the Yo API from [www.justyo.co][1]

Usage
-----

```php
<?php

require('yo.class.php');

$api_token       = "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
$link            = "http://www.google.com/";
$username        = "m44rt3np44uw";
$passcode        = 1234;
$email           = "info@example.com";
$description     = "This is a test!";
$location_needed = true;
$location        = "52;4";

$Yo = new Yo($api_token);
```


__All__

Send a Yo (with a link) to all subscribers.

```php
// Send a Yo to all subscribers.
$Yo->all();

// Send a Yo with a link to all subscribers.
$Yo->all($link);
```


__User__

Send a Yo (with a link/location) to a specific subscriber.

```php
// Send a Yo to a specific subscriber.
$Yo->user($username);

// Send a Yo with a link/location to a specific subscriber.
$Yo->user($username, $link);
$Yo->user($username, $location);
```


__Subscribers__

Get the number of subscribers.

```php
// Get the number of subscribers.
$Yo->subscribers();
```


__Check Username__

Check if the username exists.

```php
// Check if the username exists.
$Yo->checkUsername($username);
```


__Create User__

Create a new Yo user.

```php
// Create a new Yo user.
$Yo->createAccount($username, $passcode, $link, $email, $description, $location_needed);
```

[1]: http://www.justyo.co/