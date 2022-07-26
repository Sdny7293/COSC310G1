<?php
// //loads the MongoDB library needed to access the php
// require_once '../vendor/autoload.php'; //like import in java
// require_once 'message.php'; //to include other files
// require_once 'messageController.php';

// //Get all the data from sendMessage.php
// $testVar = $_REQUEST['test'];

// $obj = new MessageController;
// $msgObj = new Message($testVar);
// $obj->insertMsg($msgObj);
// echo $testVar;

require_once '../vendor/autoload.php'; //like import in java
require_once 'messageController.php';
require_once 'message.php'; //to include other files

//read all the files sent from browswer, from sendMessage.php
//Get all the data from sendMessage.PHP
$whatever_name_i_want = $_REQUEST['whatever_key_value_i_want'];

$obj = new MessageController;
$msgObj = new Message($whatever_name_i_want);
$obj->insertMsg($msgObj);
// $echo2 = $_REQUEST['echo2'];
// echo "hello ".$echo1."\n\n";
echo $whatever_name_i_want;
?>