<?php

if (isset($_COOKIE['username'])) {
    exit("<script>
        alert('Already Login');
        location.href='ppp.php';
        </script>");
}

$username=base64_encode($_GET['username']);
$password=md5($_GET['password']);
$bdhost="103.139.1.103";
$dbname="cosc310";
$dbuser="COSC310";
$dbpass="cosc310";

$sql_read_username = "SELECT * FROM cosc310_user WHERE name='$username' AND password='$password'";
$sql_read_email = "SELECT * FROM cosc310_user WHERE email='$username' AND password='$password'";

$conn = mysqli_connect($bdhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection Fail: " . mysqli_connect_error());
}
$result_read_username = mysqli_query($conn, $sql_read_username);
$result_read_email = mysqli_query($conn, $sql_read_email);
if (mysqli_num_rows($result_read_username) > 0 || mysqli_num_rows($result_read_email) > 0) {
    //get data
    if(mysqli_num_rows($result_read_username) > 0){
        $row = mysqli_query($conn, "SELECT * FROM cosc310_user WHERE name='$username' AND password='$password'")->fetch_assoc();
        $username = $_GET['username'];
        $email = base64_decode($row['email']);
        $description = $row['description'];
    }
    else{
        $row = mysqli_query($conn, "SELECT * FROM cosc310_user WHERE email='$username' AND password='$password'")->fetch_assoc();
        $email = $_GET['username'];
        $username = base64_decode($row['name']);
        $description = $row['description'];
    }
    //create cookie
    setcookie('username',$username,time()+3600);
    setcookie('email',$email,time()+3600);
    setcookie('description',$description,time()+3600);
    //terminate
    echo"<script type='text/javascript'>alert('login success'); location='ppp.php';</script>";
}
else {
    echo"<script type='text/javascript'>alert('Login Fail'); location='signin.html';</script>";
}
?>

