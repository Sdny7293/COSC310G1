<?php
// Properties of each notification object
class Notification{
    private $type;   //type of notification
    private $sender_id;
    private $receiver_id;
    private $time_sent;
    private $date_sent;
    
    function __construct($type, $sender_id, $receiver_id, $time_sent, $date_sent)
    {
        $this->content = $type;
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->time_sent = $time_sent;
        $this->date_sent = $date_sent;
    }

    function getType(){
        return $this->type;
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