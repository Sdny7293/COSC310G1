<?php
$key=md5("cosc310");
$username=base64_encode($_GET['username']);
$password=base64_encode($_GET['password']);
$email=base64_encode($_GET['email']);
$bdhost="103.139.1.103";
$dbname="cosc310";
$dbuser="COSC310";
$dbpass="cosc310";

$sql_read_username = "SELECT * FROM cosc310_user WHERE name='$username' AND password='$password'";
$sql_read_email = "SELECT * FROM cosc310_user WHERE name='$email' AND password='$password'";

$conn = mysqli_connect($bdhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection Fail: " . mysqli_connect_error());
}
$result_read_username = mysqli_query($conn, $sql_read_username);
$result_read_email = mysqli_query($conn, $sql_read_email);
if (mysqli_num_rows($result_read_username_1) > 0 || mysqli_num_rows($result_read_email_1) > 0) {
    echo"<script type='text/javascript'>alert('login success'); location='index.html';</script>";
}
else {
    echo"<script type='text/javascript'>alert('Login Fail'); location='signin.html';</script>";
}
?>