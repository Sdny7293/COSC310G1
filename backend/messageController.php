<?php
//require_once '../vendor/autoload.php'; //like import in java

//class MessageController {
//     //declare variables
//     private $host;
//     private $port;
//     private $db; //Create a var for database
//     private $collection;

//     //constructor - in practice, you should not set the default parameter values
//     function __construct($host = '3.225.168.87', $port = '27017') //$host could = 'localhost'
//     //Servers will accept any incoming connection. A port is like the "door number". If you dont know the door number you can't get into the server
//     {
//         //$this means you are using the obj variable. Need "this" b/c we are creating obj.
//         $this->host = $host;
//         $this->port = $port;
//         $this->client = new MongoDB\Client("mongodb://" . $this->host . ":" . $this->port);
//         //will insert into the DB mentioned below, in this case it's 'linkedin_project'
//         $this->db = $this->client -> linkedin_project;
//     }
    
//     //Insert the newly sent message into database - insertOne is a built in function like insertMany
//     function insertMsg($obj) {  
//         //insert into the collection called "messages"
//         $this->collection = $this->db->messages;
//         $insertOneResult = $this->collection->insertOne([
//                                'content_field' => $obj->getContent(),
//                             //    'email' => $obj->b(),
//                             //    'name' => $obj->c(),
//                             ]);
//     }
//     //create one class for one obj, no need functions (except getters and setters) just attributes
// };
?>

<?php
//loads the MongoDB library needed to access the php
require_once '../vendor/autoload.php'; //like import in java

class MessageController {
    //declare variables
    private $host;
    private $port;
    private $db; //Create a var for database
    private $collection; 

    //constructor - in practice, you should not set the default parameter values
    function __construct($host = '3.225.168.87', $port = '27017') //$host could = 'localhost'
    //Servers will accept any incoming connection. A port is like the "door number". If you dont know the door number you can't get into the server
    {
        $this->host = $host;
        $this->port = $port;
        $this->client = new MongoDB\Client("mongodb://" . $this->host . ":" . $this->port);
        $this->db = $this->client -> sydney_test;
    }
    //$this means you are using the obj variable. Need "this" b/c we are creating obj.

    //insert function template
    //insertOne is a built in function like insertMany
    function insertMsg($obj) { //function is like methods in java
        $this->collection = $this->db -> sydney_users;
        $insertOneResult = $this->collection->insertOne([
                               'content_field' => $obj->getContent(),
                            //    'email' => $obj->b(),
                            //    'name' => $obj->c(),
                            ]);
    }
    //create one class for one obj, no need functions (except getters and setters) just attributes
};
?>