<?php
/**
 * Include twilio-php, the offical Twilio PHP Helper Library, which can be found at
 * http://www.twilio.com/docs/libraries
 */ 
require('Services/Twilio.php');

// Include the IronWorker libraries
require_once("IronCore.class.php");
require_once("IronWorker.class.php");

// Credentials for IronWorker
$iw = new IronWorker(array(
    'token' => '', // ADD Your Token
    'project_id' => '' // ADD Your Project ID
));

// URL of the follow-up-sms.php
$followup_sms_url = ""; // ADD the URL where follow-up-sms.php will be located

// Twilio number which the followup SMS should come from
$from_number = ""; // ADD the Twilio number you want the SMS to come from

// Generate TwiML for the initial response
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

