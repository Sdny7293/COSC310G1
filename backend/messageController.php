<?php
require_once '../vendor/autoload.php'; //like import in java
require_once 'message.php'; //to include other files

date_default_timezone_set("US/Pacific"); //set default time zone to be in PST

class MessageController {
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
        $this->client = new MongoDB\Client("mongodb://cosc310:Cosc310g1linkedinMock@" . $this->host . ":" . $this->port);
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
                               'date_sent' => $new_message->getDateSent(),
                               'sender_id' => $new_message->getSenderId(),
                               'receiver_id' => $new_message->getReceiverId()
                            ]);
    }
    function displayMsg($obj) {  
        $all_msg_array = array();
        //insert into the collection called "messages"
        $this->collection = $this->db->messages;
        $cursor = $this->collection->find([
            'sender_id' => "sender", //$obj->sender_id,
            // 'receiver_id' => $obj->receiver_id,
        ]);
        foreach($cursor as $messages) {  //every row has a record. Imagine looking at every row and you have a mouse cursor pointing to current record
            $msg_array = array();
            $msg_array["content"] = $messages['content'];
            $msg_array["time_sent"] = $messages['time_sent'];
            $msg_array["date_sent"] = $messages['date_sent'];
            $msg_array["sender_id"] = $messages["sender_id"];
            $msg_array["receiver_id"] = $messages["receiver_id"];
            $all_msg_array[] = $msg_array;
        };
        return $all_msg_array;
    }
    //create one class for one obj, no need functions (except getters and setters) just attributes
};
?>