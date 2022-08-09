<?php
session_start();

$host = "103.139.1.103";
$database = "cosc310";
$user = "COSC310";
$password = "cosc310";

try{
    $connection = mysqli_connect($host, $user, $password, $database);
    $error = mysqli_connect_error();  

        $comment = $_POST['coms'];
        $id = $_POST['comId'];
        echo "alert(".$id.");";

        $sql = "insert into comments (ID,comments) values('".$id."','".$comment."');";
        mysqli_query($connection,$sql);
        $sql3= "select * from comments";
        $result3 = mysqli_query($connection,$sql3);
        while($row = mysqli_fetch_array($result3)){
     
            $queryArray1[] = $row;
            
             }
        $_SESSION['Output1'] = $queryArray1;     
        header("Location: ../client/homepage.component.php");

        if($error != null)
        {
          $output = "<p>Unable to connect to database!</p>";
          exit($output);
          }  
    }
      catch (Exception $e){
         echo ' Caught exception: '.$e->getMessage()."<br>";
         echo ' On Line : '.$e->getLine()."<br><t>";
         echo ' Stack Trace: '.$e->getTrace()."<br>"; 
         echo "<br><br>Invalid Entry";
      
         exit();
      } finally{
      //    mysqli_free_result($results);
         mysqli_close($connection);
        }
?>