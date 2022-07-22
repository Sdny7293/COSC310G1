<?php
$username=base64_encode($_GET['username']);
$password=md5($_GET['password']);
$email=base64_encode($_GET['email']);
$bdhost="103.139.1.103";
$dbname="cosc310";
$dbuser="COSC310";
$dbpass="cosc310";

$sql_read_username = "SELECT * FROM cosc310_user WHERE name='$username'";
$sql_read_email = "SELECT * FROM cosc310_user WHERE email='$email'";
$sql_write = "INSERT INTO cosc310_user (name,password,email) VALUES ('$username','$password','$email')";

$conn = mysqli_connect($bdhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection Fail: " . mysqli_connect_error());
}
$result_read_username_1 = mysqli_query($conn, $sql_read_username);
$result_read_email_1 = mysqli_query($conn, $sql_read_email);
if (mysqli_num_rows($result_read_username_1) > 0 || mysqli_num_rows($result_read_email_1) > 0) {
    echo"<script type='text/javascript'> alert('user already existed'); location='signup.html';</script>";
} 
else {
    $result_write = mysqli_query($conn, $sql_write);
    $result_read_username_2 = mysqli_query($conn, $sql_read_username);
    $result_read_email_2 = mysqli_query($conn, $sql_read_email);
    if(mysqli_num_rows($result_read_username_2) > 0 && mysqli_num_rows($result_read_email_2) > 0){
        echo"<script type='text/javascript'> alert('account created'); location='signin.html';</script>";
    }
    else{
        echo"<script type='text/javascript'> alert('fail to add user'); location='signup.html';</script>";
    }
}
?>