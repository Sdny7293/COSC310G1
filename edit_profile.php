<?php
if (!isset($_COOKIE['username'])) {
    exit("<script>
        alert('Please Login');
        location.href='signin.html';
        </script>");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<script src="js/angular.js"></script>
    </head>
    <body>
		<div ng-cloak ng-app="myApp" align="center">
			<form name="myForm" action="save_profile.php" ng-controller="formController" class="container form-horizontal">
				<h1 align='center'>Edit Profile</h1>
				<p>&nbsp;</p>
                <p>Current Profile Picture：</p>
                <img src="
                <?php
                if($_COOKIE['pic']=='null'){
                    echo './user/picture/default.png?rand='.rand();
                }
                else{
                    echo $_COOKIE['pic'].'?rand='.rand();
                }?> "
                onerror="this.src='./img/default.jpg'" border="1"  width="80" height="80"/>
                <br>
                Upload New Profile Picture：<input align='center' name="pic" type="file">
                <input type="submit" name="up_load" value="Upload">
                <p></p>
				<div class="form-group has-feedback" ng-class="{'has-error':myForm.username.$dirty && myForm.username.$invalid}">
					<label class="col-sm-4 control-label">username</label>
					<div class="col-sm-4">
						<textarea rows="1" cols="20" name="username" ng-pattern="/^[a-zA-Z]{1}/" ng-required="true" required autofocus ng-minlength="2" ng-maxlength="20" class="form-control"><?php echo $_COOKIE['username']?></textarea>
						<div ng-show="myForm.username.$dirty && myForm.username.$error.maxlength" class="alert alert-danger help-block">
							maximum length of 20
						</div>
						<div ng-show="myForm.username.$dirty && myForm.username.$error.minlength" class="alert alert-danger help-block">
							minimum length of 2
						</div>
						<div ng-show="myForm.username.$dirty && myForm.username.$error.pattern" class="alert alert-danger help-block">
							must start with an english letter
						</div>
					</div>
				</div>
				<div class="form-group has-feedback" ng-class="{'has-error':myForm.email.$dirty && myForm.email.$invalid}">
					<label class="col-sm-4 control-label">email</label>
					<div class="col-sm-4">
						<textarea rows="1" cols="20" name="email" ng-required="true" required autofocus ng-minlength="5" ng-maxlength="30" class="form-control"><?php echo $_COOKIE['email']?></textarea>
						<div ng-show="myForm.email.$dirty && myForm.email.$error.maxlength" class="alert alert-danger help-block">
							maximum length of 30
						</div>
						<div ng-show="myForm.email.$dirty && myForm.email.$error.minlength" class="alert alert-danger help-block">
							minimum length of 5
						</div>
					</div>
				</div>
				<div class="form-group has-feedback" ng-class="{'has-error':myForm.description.$dirty && myForm.description.$invalid}">
					<label class="col-sm-4 control-label">description</label>
					<div class="col-sm-4">
						<textarea rows="8" cols="40" name="description" required autofocus ng-maxlength="200" class="form-control"><?php echo $_COOKIE['description']?></textarea>
						<div ng-show="myForm.description.$dirty && myForm.description.$error.maxlength" class="alert alert-danger help-block">
							maximum length of 200
						</div>
					</div>
				</div>
				<br>
				<div class="form-group">
				    <label class="col-sm-2 control-label">
                        <font color="red">*</font>&nbsp;I am 
                    </label>
                    <div class="col-sm-2">
                        <select class="selectpicker show-tick" data-width="100%" name="user_type" data-style="btn-primary">
                            <option value="">looking for a job</option>
                            <option value="1">hiring</option>
                        </select>
                    </div>
                    
                    <label id="field_text" class="col-sm-2 control-label">
                        <font color="red">*</font>&nbsp;Field：
                    </label>
                    <div class="col-sm-2" id="field_select">
                        <select class="selectpicker show-tick" data-width="100%" name="user_field" data-live-search="true" data-style="btn-primary">
                            <option value="">--Select--</option>
                            <option value="Sci">Science</option>
                            <option value="Engr">Engineering</option>
                        </select>
                    </div>
                    
                    <label id="degree_text" class="col-sm-2 control-label">
                        <font color="red">*</font>&nbsp;Degree：
                    </label>
                    <div class="col-sm-2" id="degree_select">
                        <select class="selectpicker show-tick" data-width="100%" name="user_degree" data-live-search="true" data-style="btn-primary">
                            <option value="">--Select--</option>
                            <option value="1">Bachler</option> 
                            <option value="2">Master</option>
                            <option value="3">PhD</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<button type="submit" class="btn btn-success col-sm-6" ng-click="confirm()" ng-disabled="myForm.$invalid||data.passwordConfirm!==data.password">Update</button>
						<button type="reset" class="btn btn-info col-sm-6" ng-click="reset()">Reset</button>
					</div>
				</div>
			</form>
		</div>
		<script>
			angular.module('myApp', [])
				.controller('formController', ['$scope', function($scope) {
					$scope.confirm = function() {
						//alert("form submit")
					}
					$scope.reset = function() {
						$scope.myForm.$setPristine();
					}
				}]);
		</script>
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
    $file_name = './user/picture/'.$_COOKIE['uid'].'.jpg';
    if(!move_uploaded_file($pic_info['tmp_name'],$file_name))
    {
        exit("<script>
        alert('Upload Fail');
        location.href='picture_upload.php';
        </script>");
    }
    $uid = $_COOKIE['uid'];
    $sql_read = "SELECT * FROM cosc310_user WHERE uid='$uid'";
    $sql_write = "UPDATE cosc310_user SET picture_link='$file_name' WHERE uid='$uid'";
    $conn = mysqli_connect("103.139.1.103", "COSC310", "cosc310", "cosc310");
    if (!$conn) {
        die("Connection Fail: " . mysqli_connect_error());
    }
    mysqli_query($conn, $sql_write);
    setcookie('pic',$file_name);
    exit("<script>
    alert('Upload Success');
    location.href='ppp.php';
    </script>");
}
?>