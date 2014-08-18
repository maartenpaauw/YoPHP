<?
/**
 * Yo PHP
 * A PHP class for the Yo API from dev.justyo.co
 * 
 * @Author Maarten Paauw
 */
 
require_once("class.yo.php");

$token = "YOUR_API_TOKEN";
$link = "URL";
$username = "USERNAME";

$yo = new yo($token);

// Send a Yo to all subscribers.
$yo->all();

// Send a Yo with a link to all subscribers.
$yo->all($link);

// Send a Yo to a specific subscriber.
$yo->user($username);

// Send a Yo with a link to a specific subscriber.
$yo->user($username, $link);

// Get the number of subscribers.
$yo->subscribers();