<?php
/**
 * Include twilio-php, the offical Twilio PHP Helper Library, which can be found at
 * http://www.twilio.com/docs/libraries
 */ 
require('Services/Twilio.php');

/* 
 * This script should be secured so that someone doesn't discover the url and API and
 * use your Twilio account to send their own SMS messages.
 */
 
$accountSid = ''; // ADD your Twilio Account SID
$authToken = ''; // ADD your Twilio AuthToken

$from = $_REQUEST['From'];
$to = $_REQUEST['To'];
$body = $_REQUEST['Body'];

$client = new Services_Twilio($accountSid, $authToken);
$message = $client->account->sms_messages->create(
  $from, // From a valid Twilio number
  $to, // Text this number
  $body
);

print $message->sid;