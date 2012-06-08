<?php

// First, include Requests
include('library/Requests.php');

// Next, make sure Requests can load internal classes
Requests::register_autoloader();

// Get the payload containing all the stored values
$payload = getPayload();

// Now let's make a request!
$request = Requests::post($payload->url, array(), $payload);

// Check what we received
var_dump($request);