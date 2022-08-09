<?php

session_start();
$host = "103.139.1.103";
$database = "cosc310";
$user = "COSC310";
$password = "cosc310";



$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();

if($error != null)
{
 $output = "<p>Unable to connect to database!</p>";
 exit($output);
}

try{
    $sql = "select * from comments;";
    $sql2 ="select * from newspost;";
    $results2 = mysqli_query($connection,$sql);
    $results1 = mysqli_query($connection,$sql2);

    while($row = mysqli_fetch_assoc($results1)){
     
   $queryArray[] = $row;
   
    }

    while($row1 = mysqli_fetch_assoc($results2)){
     
      $queryArray1[] = $row1;
      
       }
    
    $_SESSION['Output'] = $queryArray;
    $_SESSION['Output1'] = $queryArray1;
   header("Location: homepage.component.php");
}
catch (Exception $e){
   echo ' Caught exception: '.$e->getMessage()."<br>";
   echo ' On Line : '.$e->getLine()."<br><t>";
   echo ' Stack Trace: '.$e->getTrace()."<br>"; 
   echo "<br><br>Invalid Entry";
 

   exit();
} finally{
   mysqli_close($connection);
  }


?>
