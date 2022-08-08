<?php
session_start();
$log = new admin_signin_up_out();
$data = new web_data();
if(isset($_GET['signin'])){
    $log->signin($_GET['id'],$_GET['password']);
}
if(isset($_GET['signup'])){
    $log->signup($_GET['id'],$_GET['password']);
}
if(isset($_GET['signout'])){
    $log->signout();
}
class admin_signin_up_out{
    public static function not_login(){
        if (isset($_SESSION['id'])) {
            exit("<script>
                alert('Already Login');
                location.href='admin.php';
                </script>");
        }
    }
    public static function is_login(){
        if (!isset($_SESSION['id'])) {
            exit("<script>
                alert('Not Login Yet');
                location.href='admin_login.php';
                </script>");
        }
    }
    public static function signup($id,$password){
        $conn= mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
        if (!$conn) {
            die("Connection Fail: " . mysqli_connect_error());
        }
        $e_id=md5($id);
        $e_password=md5($password);
        $sql_read = "SELECT * FROM cosc310_admin WHERE id='$e_id'";
        $sql_write = "INSERT INTO cosc310_admin (id,password) VALUES ('$e_id','$e_password')";
        $result_read_1 = mysqli_query($conn, $sql_read_username);
        if (mysqli_num_rows($result_read_1) > 0) {
            echo"<script type='text/javascript'> alert('admin already existed'); location='admin_add.html';</script>";
        } 
        else {
            $result_write = mysqli_query($conn, $sql_write);
            $result_read_2 = mysqli_query($conn, $sql_read);
            if(mysqli_num_rows($result_read_2) > 0){
                echo"<script type='text/javascript'> alert('admin created'); location='admin_login.html';</script>";
            }
            else{
                echo"<script type='text/javascript'> alert('fail to add user'); location='admin_add.html';</script>";
            }
        }
    }
    public static function signin($id,$password){
        $conn= mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
        if (!$conn) {
            die("Connection Fail: " . mysqli_connect_error());
        }
        $e_id=md5($id);
        $e_password=md5($password);
        $sql_read = "SELECT * FROM cosc310_admin WHERE id='$e_id' AND password='$e_password'";
        $result_read = mysqli_query($conn, $sql_read);
        if (mysqli_num_rows($result_read) > 0) {
            $_SESSION['id']=$id;
            echo"<script type='text/javascript'>alert('login success'); location='admin.php';</script>";
        }
        else {
            echo"<script type='text/javascript'>alert('Login Fail'); location='admin_login.html';</script>";
        }
    }
    public static function signout(){
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-3600,'/');
        }
        session_destroy();
        echo"<script type='text/javascript'> alert('Sign Out'); location='admin_login.php';</script>";
    }
}
class web_data{
    public $arr;
    public static function user_num(){
        $conn= mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
        if (!$conn) {
            die("Connection Fail: " . mysqli_connect_error());
        }
        return mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cosc310_user"));
    }
    public static function post_num(){
        $conn= mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
        if (!$conn) {
            die("Connection Fail: " . mysqli_connect_error());
        }
        return mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cosc310_post"));
    }
    public static function search($username){
        $conn= mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
        if (!$conn) {
            die("Connection Fail: " . mysqli_connect_error());
        }
        $e_username=base64_encode($username);
        $sql_read = "SELECT * FROM cosc310_user WHERE name='$e_username'";
        $result_read = mysqli_query($conn, $sql_read);
        if (mysqli_num_rows($result_read) > 0) {
            $row = mysqli_fetch_assoc($result_read);
            $email = base64_decode($row['email']);
            $description=$row['description'];
            $pic=$row['picture_link'];
            echo 
            "
            <h5>username: $username</h5>
            <h5>email: $email</h5>
            <h5>description: $description</h5>
            <h5>pic: $pic</h5>
            ";
        }
        else {
            echo "<h5>no user found</h5>";
        }
    }
    public static function del_user($username){
        $conn= mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
        if (!$conn) {
            die("Connection Fail: " . mysqli_connect_error());
        }
        $e_username=base64_encode($username);
        $sql_write = "DELETE FROM cosc310_user WHERE name='$e_username'";
        $sql_read = "SELECT * FROM cosc310_user WHERE name='$e_username'";
        $result_read_1 = mysqli_query($conn, $sql_read);
        if (mysqli_num_rows($result_read_1) > 0) {
            mysqli_query($conn, $sql_write);
            $result_read_2 = mysqli_query($conn, $sql_read);
            if (mysqli_num_rows($result_read_2) > 0) {
                echo "<h5>delete fail</h5>";
            }
            else{
                echo "<h5>user deleted</h5>";
            }
        }
        else {
            echo "<h5>no user found</h5>";
        }
    }
    public static function add_user($username,$email,$password){
        $conn= mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
        if (!$conn) {
            die("Connection Fail: " . mysqli_connect_error());
        }
        $e_username=base64_encode($username);
        $e_password=md5($password);
        $e_email=base64_encode($email);
        $sql_read_username = "SELECT * FROM cosc310_user WHERE name='$e_username'";
        $sql_read_email = "SELECT * FROM cosc310_user WHERE email='$e_email'";
        $result_read_username_1 = mysqli_query($conn, $sql_read_username);
        $result_read_email_1 = mysqli_query($conn, $sql_read_email);
        if (mysqli_num_rows($result_read_username_1) > 0 || mysqli_num_rows($result_read_email_1) > 0) {
            echo"<h5>user existed</h5>";
        } 
        else {
            $result_write = mysqli_query($conn,"INSERT INTO cosc310_user (name,password,email) VALUES ('$e_username','$e_password','$e_email')");
            $result_read_username_2 = mysqli_query($conn, $sql_read_username);
            $result_read_email_2 = mysqli_query($conn, $sql_read_email);
            if(mysqli_num_rows($result_read_username_2) > 0 && mysqli_num_rows($result_read_email_2) > 0){
                echo"<h5>user added</h5>";
            }
            else{
                echo"<h5>FAIL</h5>";
            }
        }
    }
}
?>