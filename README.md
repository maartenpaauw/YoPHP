YoPHP
=====

A PHP class for the Yo API from [www.justyo.co][1]

Usage
-----

```php

<?php

require_once("class.yo.php");

$token = "YOUR_API_TOKEN";
$link = "URL";
$username = "USERNAME";

$yo = new yo($token);
```

__All__

Send a Yo (with a link) to all subscribers.

```php
// Send a Yo to all subscribers.
$yo->all();

// Send a Yo with a link to all subscribers.
$yo->all($link);
```

__User__

Send a Yo (with a link) to a specific subscriber.

```php
// Send a Yo to a specific subscriber.
$yo->user($username);

// Send a Yo with a link to a specific subscriber.
$yo->user($username, $link);
```

__Subscribers__

Get the number of subscribers.

```php
// Get the number of subscribers.
$yo->subscribers();
```

[1]: http://www.justyo.co/
