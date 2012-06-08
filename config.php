<?php
/**
 * #### Twilio Config ####
 * 
 * Download and include twilio-php, the offical Twilio PHP Helper Library, 
 * which can be found at http://www.twilio.com/docs/libraries.
 * Copy the 'Services' folder into the directory containing this file.
 */ 
require('Services/Twilio.php');

/**
 * Enter your Twilio credentials, which can be found on this page:
 * https://www.twilio.com/user/account
 */
$ACCOUNT_SID = '';
$AUTH_TOKEN = '';

/**
 * Finally, enter the Twilio number that you want all SMS messages to
 * come from. Go to this page if you still need to purchase a phone #:
 * https://www.twilio.com/user/account/phone-numbers/available/local
 */
$from_number = "";

/**
 * #### iron.io Config ####
 * 
 * The iron.io classes are al already included in this script, so there
 * is no need to download them. 
 */
require_once("IronCore.class.php");
require_once("IronWorker.class.php");

/** 
 * However, you will need an iron.io account and you will need to create 
 * a new project. You can create a project at https://hud.iron.io/dashboard
 * Once you have a new project
 */
$iw = new IronWorker(array(
    'token' => '', // ADD Your Token
    'project_id' => '' // ADD Your Project ID
));

/**
 * #### Site Config ####
 * 
 * I'm not good enough at PHP to know a reliable way to get the full site
 * path, so you will need to enter the full url of where followup_sms.php
 * will be located. For example, if your domain name was http://example.com,
 * you would need to type http://example.com/delayed_sms/followup_sms.php
 */
$followup_sms_url = "";

/** 
 * After you have done all of this, saved and uploaded this folder to your
 * PHP capable webserver, point the SMS Request URL for your number at
 * the URL of the 'first_response.php' file. Save and test. You should get
 * two messages, one imedately, and one more after a minute.
 */