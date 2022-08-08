<?php
require("../backend/controller_user.php");
session_start();
$log = new signin_up_out();
$log->is_login();
?>
<html>
<head>
    <title>Upload User Profile Picture</title>
</head>
<style>
    form {
            border: 1px;
            width: 60%;
            margin: 5% auto;
        }
</style>
<body align="center">
<form action="" method="post" enctype="multipart/form-data">
    <h2>User Profile Picture</h2>
    <p>Username：<?php echo $_SESSION['username'];?></p>
    <p>Current Profile Picture：</p>
    <img src="<?php
    if($_SESSION['pic']=='null'){
        echo './user/picture/default.png?rand='.rand();
    }
    else{
        echo $_SESSION['pic'].'?rand='.rand();
    }?>" onerror="this.src='./img/default.jpg'" border="1" width="150" height="150"/>
    <p>&nbsp;</p>
    Upload New Profile Picture：<input name="pic" type="file">
    <input type="submit" name="up_load" value="Upload">
</form>
</body>
</html>
 
<?php
if(isset($_FILES['pic']))
{
    $pic_info = $_FILES['pic'];
    if($pic_info['error'] > 0)
    {
        $error_msg = 'ERROR:';
        switch ($pic_info['error']) {
            case 1:
                $error_msg .= 'File size exceeds upload_max_filesize value in php';
                break;
            case 2:
                $error_msg .= 'File size exceeds max_file value';
                break;
            case 3:
                $error_msg .= 'Only part of file uploaded';
                break;
            case 4:
                $error_msg .= 'No file uploaded';
                break;
            case 6:
                $error_msg .= 'Can not find temp file';
                break;
            case 7:
                $error_msg .= 'Unable to upload！';
                break;
            default:
                $error_msg .= 'UNKNOWN';
                break;
        }
        die($error_msg);
    }
    $type = substr(strrchr($pic_info['name'],'.'),1);
    if ($type !== 'jpg')
    {
        die('only .jpg file allowed');
    }
    $file_name = './user/picture/'.$_SESSION['uid'].'.jpg';
    if(!move_uploaded_file($pic_info['tmp_name'],$file_name))
    {
        exit("<script>
        alert('Upload Fail');
        location.href='picture_upload.php';
        </script>");
    }
    $uid = $_SESSION['uid'];
    $sql_read = "SELECT * FROM cosc310_user WHERE uid='$uid' AND";
    $sql_write = "UPDATE cosc310_user SET picture_link='$file_name' WHERE uid='$uid'";
    $conn = mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
    if (!$conn) {
        die("Connection Fail: " . mysqli_connect_error());
    }
    mysqli_query($conn, $sql_write);
    $_SESSION['pic']=$file_name;
    exit("<script>
    alert('Upload Success');
    location.href='ppp.php';
    </script>");
}
?>
