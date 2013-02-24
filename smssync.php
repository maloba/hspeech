<?php

include 'source.php';
$secret = "";
$from = "";
$message = "";
$sent_to = "";
/**
 *  Get the phone number that sent the SMS.
 */
if (isset($_POST['from']))
{
    $from = $_POST['from'];
}
 
/**
 * Get the SMS aka the message sent.
 */ 
if (isset($_POST['message']))
{
    $message = $_POST['message'];
}
 
// Set success to false as the default success status
$success = "false";
 
/**
 * Get the secret key set on SMSSync side 
 * for matching on the server side.
 */ 
if (isset($_POST['secret']))
{
    $secret = $_POST['secret'];
}
 
/**
 * Get the timestamp of the SMS
 */
if(isset($_POST['sent_timestamp']))
{
    $sent_timestamp = $_POST['sent_timestamp'];
}
 
/**
 * Get the phone number of the device SMSSync is 
 * installed on.
 */
if (isset($_POST['sent_to'])) 
{
    $sent_to = $_POST['sent_to'];
}
 
/**
 * Get the unique message id
 */
if (isset($_POST['message_id']))
{
    $message_id = $_POST['message_id'];
}
 
/**
 * Now we have retrieved the data sent over by SMSSync 
 * via HTTP. Next thing to do is to do something with 
 * the data. Either echo it or write it to a file or even 
 * store it in a database. This is entirely up to you. 
 * After, return a JSON string back to SMSSync to know 
 * if the web service received the message successfully or not. 
 *
 * In this demo, we are just going to save the data 
 * received into a text file.
 *
 */
if ($from && $message)
{
    /* The screte key set here is 123456. Make sure you enter 
     * that on SMSSync. 
     */
    if ( ( $secret == '123456'))
    {
        $success = "true";
    }
    // now let's write the info sent by SMSSync
    //to a file called test.txt

    //$from $message $sent_timestamp $message_id $sent_to
    Source::addSource("sms", ($from), $message);
 
} 
 
/**
 * Now send a JSON formatted string to SMSSync to 
 * acknowledge that the web service received the message
 */
echo json_encode(array("payload"=>array(
    "success"=>$success)));
 
/**
 * Comment the code below out if you want to send an instant 
 * reply as SMS to the user.
 *
 * This feature requires the "Get reply from server" checked on SMSSync.
 */
 
/**
 * $msg = "Your message has been received";
 *   
 * $reply[0] = array("to" => $from, "message" => $msg);
 *   
 * echo json_encode(array("payload"=>array("success"=>$success,"task"=>"send","messages"=>array_values($reply))));
 */

?>