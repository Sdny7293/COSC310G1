<?php
require_once '../vendor/autoload.php'; //like import in java
require_once 'message.php'; //to include other files
date_default_timezone_set("US/Pacific");

//read all the data sent from browser, from chatbox.php's chat box
$msg_content = $_REQUEST['msg_content']; //Store the key (msg_content)(in square bracket) into any variable name (In this called also called $msg_content)
$time_sent = date("H:i:s");
$date_sent = date("M j, Y");

$new_message = new MessageController;   //Create a new message controller object
$msgObj = new Message($msg_content, $time_sent, $date_sent);    //Create a new message object
$new_message->insertMsg($msgObj);
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
    function insertMsg($new_message) {  
        //insert into the collection called "messages"
        $this->collection = $this->db->messages;
        $insertOneResult = $this->collection->insertOne([
                               'content' => $new_message->getContent(),
                               'time_sent' => $new_message->getTimeSent(),
                               'date_sent' => $new_message->getDateSent()
                            ]);
    }
    function displayMsg($obj) {  
        //insert into the collection called "messages"
        $this->collection = $this->db->messages;
        $cursor = $this->collection->find([
            'content' => "wowowoowowow!"
        ]);
        foreach($cursor as $messages) {  //every row has a record. Imagine looking at every row and you have a mouse cursor pointing to current record
            $msg_content = $messages['content'];
            $msg_time = $messages['time_sent'];
            $msg_date = $messages['date'];
            var_dump($messages);
            echo json_encode($msg_time);
        };
    }
    //create one class for one obj, no need functions (except getters and setters) just attributes
};
?>