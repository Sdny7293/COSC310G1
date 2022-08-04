<?php
session_start();
$log = new signin_up_out();
$profile = new profile();
if(isset($_GET['signin'])){
    $log->signin($_GET['username'],$_GET['password']);
}
if(isset($_GET['signup'])){
    $log->signup($_GET['username'],$_GET['email'],$_GET['password']);
}
if(isset($_GET['update_profile'])){
    $profile->update_profile($_GET['username'],$_GET['email'],$_GET['description']);
}
class signin_up_out{
    public static function not_login(){
        if (isset($_SESSION['uid'])) {
            exit("<script>
                alert('Already Login');
                location.href='ppp.php';
                </script>");
        }
    }
    public static function is_login(){
        if (!isset($_SESSION['uid'])) {
            exit("<script>
                alert('Not Login Yet');
                location.href='signin.php';
                </script>");
        }
    }
    public static function signin($username,$password){
        $conn= mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
        if (!$conn) {
            die("Connection Fail: " . mysqli_connect_error());
        }
        $e_username=base64_encode($username);
        $e_password=md5($password);
        $result_read_username = mysqli_query($conn,"SELECT * FROM cosc310_user WHERE name='$e_username' AND password='$e_password'");
        $result_read_email = mysqli_query($conn,"SELECT * FROM cosc310_user WHERE email='$e_username' AND password='$e_password'" );
        if (mysqli_num_rows($result_read_username) > 0 || mysqli_num_rows($result_read_email) > 0) {
            if(mysqli_num_rows($result_read_username) > 0){
                $row = mysqli_fetch_assoc($result_read_username);
                $email = base64_decode($row['email']);
            }
            else{
                $row = mysqli_fetch_assoc($result_read_email);
                $email = $username;
                $username = base64_decode($row['name']);
            }
            $_SESSION['uid']=$row['uid'];
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            $_SESSION['description']=$row['description'];
            $_SESSION['pic']=$row['picture_link'];
            echo "<script type='text/javascript'>alert('login success'); location='ppp.php';</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Login Fail'); location='signin.php';</script>";
        }
    }
    public static function signup($username,$email,$password){
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
            echo"<script type='text/javascript'> alert('user already existed'); location='signup.php';</script>";
        } 
        else {
            $result_write = mysqli_query($conn,"INSERT INTO cosc310_user (name,password,email) VALUES ('$e_username','$e_password','$e_email')");
            $result_read_username_2 = mysqli_query($conn, $sql_read_username);
            $result_read_email_2 = mysqli_query($conn, $sql_read_email);
            if(mysqli_num_rows($result_read_username_2) > 0 && mysqli_num_rows($result_read_email_2) > 0){
                echo"<script type='text/javascript'> alert('account created'); location='signin.php';</script>";
            }
            else{
                echo"<script type='text/javascript'> alert('fail to add user'); location='signup.php';</script>";
            }
        }
    }
    public static function signout(){
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-3600,'/');
        }
        session_destroy();
        echo"<script type='text/javascript'> alert('Log Out'); location='signin.php';</script>";
    }
}
class profile{
    public static function update_profile($username,$email,$new_description){
        $conn= mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
        if (!$conn) {
            die("Connection Fail: " . mysqli_connect_error());
        }
        $new_username=base64_encode($username);
        $new_email=base64_encode($email);
        $uid = $_SESSION['uid'];
        $sql_read_username = "SELECT * FROM cosc310_user WHERE name='$new_username'";
        $sql_read_email = "SELECT * FROM cosc310_user WHERE email='$new_email'";
        $sql_write_username = "UPDATE cosc310_user SET name='$new_username' WHERE uid=$uid";
        $sql_write_email = "UPDATE cosc310_user SET email='$new_email' WHERE uid=$uid";
        $sql_write_description = "UPDATE cosc310_user SET description='$new_description' WHERE uid=$uid";
        $result_read_username = mysqli_query($conn, $sql_read_username);
        $result_read_email = mysqli_query($conn, $sql_read_email);
        if(!($username==$_SESSION['username'])){
            if (mysqli_num_rows($result_read_username) > 0) {
                exit("<script>
                    alert('Username already exist');
                    location.href='edit_profile.php';
                    </script>");
            }
            mysqli_query($conn, $sql_write_username);
            $_SESSION['username']=$username;
        }
        
        if(!($email==$_SESSION['email'])){
            if (mysqli_num_rows($result_read_email) > 0) {
                exit("<script>
                    alert('email already been used');
                    location.href='edit_profile.php';
                    </script>");
            }
            mysqli_query($conn, $sql_write_email);
            $_SESSION['email']=$email;
        }
        mysqli_query($conn, $sql_write_description);
        $_SESSION['description']=$new_description;
        exit("<script>
            alert('Update Success');
            location.href='ppp.php';
            </script>");
    }
}
?>