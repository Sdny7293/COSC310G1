<?php
require_once '../vendor/autoload.php'; //like import in java
require_once 'message.php'; //to include other files
date_default_timezone_set("US/Pacific");

//read all the data sent from browser, from chatbox.php's chat box
$msg_content = $_REQUEST['msg_content']; //Store the key (msg_content)(in square bracket) into any variable name (In this called also called $msg_content)
$time_sent = date("H:i:s");
$date_sent = date("M j, Y");

$obj = new MessageController;   //Create a new message controller object
$msgObj = new Message($msg_content, $time_sent, $date_sent);    //Create a new message object
$obj->insertMsg($msgObj);
echo $msg_content; //test to see what has been sent to the database

class MessageController {
    //declare variables
    private $host;
    private $port;
    private $db; //a var for database
    private $collection;

    //constructor - in practice, you should not set the default parameter values
    function __construct($host = '3.225.168.87', $port = '27017') //$host could = 'localhost'
    //Servers will accept any incoming connection. A port is like the "door number". If you dont know the door number you can't get into the server
    {
        //$this means you are using the obj variable. Need "this" b/c we are creating obj.
        $this->host = $host;
        $this->port = $port;
        $this->client = new MongoDB\Client("mongodb://" . $this->host . ":" . $this->port);
        //will insert into the DB mentioned below, in this case it's 'linkedin_project'
        $this->db = $this->client -> linkedin_project;
    }
    
    //Insert the newly sent message into database - insertOne is a built in function like insertMany
    function insertMsg($obj) {  
        //insert into the collection called "messages"
        $this->collection = $this->db->messages;
        $insertOneResult = $this->collection->insertOne([
                               'content' => $obj->getContent(),
                               'time_sent' => $obj->getTimeSent(),
                               'date_sent' => $obj->getDateSent()
                            ]);
    }
    //create one class for one obj, no need functions (except getters and setters) just attributes
};
?>