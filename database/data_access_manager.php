<?php
require_once 'vendor/autoload.php'; //like import in java
class DataAccessController {
    //declare vars
    private $host;
    private $port;
    private $client;
    private $db;

    //in practice, you should not set the default parameter values
    //constructor
    function __construct($host = 'localhost', $port = '27017') 
    { //'localhost', '27017'
        $this->host = $host;
        $this->port = $port;
        $this->client = new MongoDB\Client("mongodb://" . $this->host . ":" . $this->port);
        $this->db = $this->client -> linkedin_project;
    }

    //insert function template
    //insertOne is a built in function like insertMany
    function insertXXX($obj) {
        $this->collection = $this->db->messages;
        $insertOneResult = $collection->insertOne([
                               'username' => $obj->a(),
                               'email' => $obj->b(),
                               'name' => $obj->c(),
                            ]);
    }
    //create one class for one obj, no need functions (except getters and setters) just attributes
}
?>