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
            'receiver_id' => $obj -> getReceiverId()
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
        // return var_dump($obj->getReceiverId());
        // return $get_message -> getReceiverId();
    }

    function displayMsgSummary($obj) {  
        $all_msg_summary = array();
        $msg_summary = array();
        $this->collection = $this->db->messages;
        // List all the distinct receivers and store in the $receiver_cursor
        $receiver_cursor = $this->collection->distinct("receiver_id");
            // For each distinct receiver in the receiver_cursor
            foreach($receiver_cursor as $receiver_name)
            {
                // find the most recent message detail for that receiver
                $cursor = $this->collection->find(
                    [
                        "receiver_id" => $receiver_name
                    ],
                    [
                        "sort" => ['$natural' => -1],
                        "limit" => 1
                    ]
                );
                foreach($cursor as $messages)
                {
                    $msg_summary["content"] = $messages['content'];
                    $msg_summary["time_sent"] = $messages['time_sent'];
                    $msg_summary["date_sent"] = $messages['date_sent'];
                    $msg_summary["sender_id"] = $messages["sender_id"];
                    $msg_summary["receiver_id"] = $messages["receiver_id"];
                    $all_msg_summary[] = $msg_summary;
                }
            }
        // return var_dump($msg_summary);
        return $all_msg_summary;
        // return $receivers;
    }
    function searchMsg($obj) {  
        $this->collection = $this->db->messages;
        $cursor = $this->collection->find(
            [
                'content' => $obj -> getContent()
            ]
        );
        foreach($cursor as $messages)
        {
            $msg_summary["content"] = $messages['content'];
            $msg_summary["time_sent"] = $messages['time_sent'];
            $msg_summary["date_sent"] = $messages['date_sent'];
            $msg_summary["sender_id"] = $messages["sender_id"];
            $msg_summary["receiver_id"] = $messages["receiver_id"];
            $all_msg_summary[] = $msg_summary;
        }
        return $all_msg_summary;
    }
    //create one class for one obj, no need functions (except getters and setters) just attributes
};
