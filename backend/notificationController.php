<?php
require_once '../vendor/autoload.php'; //like import in java
require_once 'notification_data.php'; //to include other files

date_default_timezone_set("US/Pacific"); //set default time zone to be in PST

class NotificationController {
    private $host;
    private $port;
    private $db; //a var for database
    private $collection;

    //constructor - in practice, you should not set the default parameter values
    function __construct($host = '3.225.168.87', $port = '27017') //$host could = 'localhost'
    //Servers will accept any incoming connection. A port is like the "door number". If you dont know the door number you can't get into the server
    {
        //$this means you are using the obj variable. Need "this" b/c we are creating obj.
        $this -> host = $host;
        $this -> port = $port;
        $this -> client = new MongoDB\Client("mongodb://cosc310:Cosc310g1linkedinMock@" . $this->host . ":" . $this->port);
        //will insert into the DB mentioned below, in this case it's 'linkedin_project'
        $this -> db = $this -> client -> linkedin_project;
    }
};
?>