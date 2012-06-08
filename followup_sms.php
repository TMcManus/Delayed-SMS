<?php
require_once('config.php');

$from = $_REQUEST['From'];
$to = $_REQUEST['To'];
$body = $_REQUEST['Body'];

$client = new Services_Twilio($ACCOUNT_SID, $AUTH_TOKEN);
$message = $client->account->sms_messages->create(
  $from, // From a valid Twilio number
  $to, // Text this number
  $body
);

print $message->sid;