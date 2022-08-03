<?php
require_once 'vendor/autoload.php';
class DatabaseController {
    private $host;
    private $port;
    private $db;
    private $collection;

    //constructor
    function __construct($host = '3.225.168.87', $port = '27017')
    {
        $this->host = $host;
        $this->port = $port;
        $this->client = new MongoDB\Client("mongodb://cosc310:Cosc310g1linkedinMock@" . $this->host . ":" . $this->port);
        $this->db = $this->client -> linkedin_project;
    }
}
?>