<?php
$new_username=base64_encode($_GET['username']);
$new_email=base64_encode($_GET['email']);
$new_description=$_GET['description'];
$uid = $_COOKIE['uid'];
$sql_read = "SELECT * FROM cosc310_user WHERE uid='$uid'";
$sql_read_username = "SELECT * FROM cosc310_user WHERE name='$username'";
$sql_read_email = "SELECT * FROM cosc310_user WHERE email='$email'";
$sql_write_username = "UPDATE cosc310_user SET username='$new_username' WHERE uid='$uid'";
$sql_write_email = "UPDATE cosc310_user SET email='$new_email' WHERE uid='$uid'";
$sql_write_description = "UPDATE cosc310_user SET description='$new_description' WHERE uid='$uid'";
$conn = mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
if (!$conn) {
    die("Connection Fail: " . mysqli_connect_error());
}
$result_read_username = mysqli_query($conn, $sql_read_username);
$result_read_email = mysqli_query($conn, $sql_read_email);
if($new_username!=$_COOKIE['username']){
    if (mysqli_num_rows($result_read_username) > 0) {
        exit("<script>
            alert('Username already exist');
            location.href='edit_profile.php';
            </script>");
    }
    mysqli_query($conn, $sql_write_username);
}
if($new_email!=$_COOKIE['email']){
    if (mysqli_num_rows($result_read_email) > 0) {
        exit("<script>
            alert('email already been used');
            location.href='edit_profile.php';
            </script>");
    }
    mysqli_query($conn, $sql_write_email);
}
mysqli_query($conn, $sql_write_description);
setcookie('username',$_GET['username']);
setcookie('email',$_GET['email']);
setcookie('description',$_GET['description']);
exit("<script>
    alert('Update Success');
    location.href='ppp.php';
    </script>");
?>