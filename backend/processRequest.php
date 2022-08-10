<?php
require_once '../vendor/autoload.php'; //like import in java
require_once 'message.php'; //to include other files
require_once 'messageController.php'; //to include other files
date_default_timezone_set("US/Pacific"); //set default time zone to be in PST

$act = $_REQUEST["act"];
//Messages
if($act == "insertMessage") 
{
    $messageController = new MessageController;   //Create a new message controller object
    $msgObj = new Message($_REQUEST["msg_content"], $_REQUEST["sender"], $_REQUEST["receiver"], $_REQUEST["time"], $_REQUEST["date"]);    //Create a new message object
    $messageController->insertMsg($msgObj);
} 
else if ($act == "displayMessages") 
{
    $messageController = new MessageController;   //Create a new message controller object
    $msgObj = new Message("msg_content", "sender_id", "receiver_id", "time_sent", "date_sent");    //Create a new message object
    //here you retrieve all the messages
    echo json_encode($messageController->displayMsg($msgObj));
} 
else if ($act == "displayMsgSummary") 
{
    $messageController = new MessageController;   //Create a new message controller object
    $msgObj = new Message("msg_content", "sender_id", "receiver_id", "time_sent", "date_sent");    //Create a new message object
    //here you retrieve all the messages
    echo json_encode($messageController->displayMsgSummary($msgObj));
}
//Notifications
else if($act == "displayNotifications"){

}



?>