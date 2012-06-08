<?php
require_once('config.php');

// Generate TwiML for the initial response. If you have your own code, enter it above this.
$response = new Services_Twilio_Twiml();
$response->sms('Thank you for texting in. You will receive another message in 1 minute.'); // CHANGE this to alter the initial message
print $response;

// Payload which the followup will need to send the SMS
$payload = array(
    'To' => $_REQUEST['From'],
	'From' => $from_number,
	'Body' => "This is your followup message", // CHANGE this to alter the followup message
	'url' => $followup_sms_url
);

// Send the Worker to iron.io
$iw->upload(dirname(__FILE__)."/worker/", 'schedule_followup.php', 'schedule_followup');
$iw->postScheduleAdvanced('schedule_followup', $payload, time()+60, null, null, 1);

