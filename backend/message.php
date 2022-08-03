<?php
// Properties of each message object
class Message{
    //declare the variables
    private $content;   //content of the message
    private $sender_id;
    private $receiver_id;
    private $time_sent;
    private $date_sent;
    
    //constructor
    function __construct($content, $sender_id, $receiver_id, $time_sent, $date_sent) //any server will accept any incoming connection. A port is like the "door number". If you dont know the door number you can't get into the server
    {
        $this->content = $content;
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->time_sent = $time_sent;
        $this->date_sent = $date_sent;
    }
    //When you create an obj, the constructor will always be called first. Constructor will assign all these variables to the newly created obj
    
    // The functions
    function getContent(){
        return $this->content;
    }
    function getSenderId(){
        return $this->sender_id;
    }
    function getReceiverId(){
        return $this->receiver_id;
    }
    function getTimeSent(){
        return $this->time_sent;
    }
    function getDateSent(){
        return $this->date_sent;
    }
};
?>