<?php
require("../backend/controller_user.php");
session_start();
$log = new signin_up_out();
$log->is_login();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<script src="../angular.js"></script>
    </head>
    <body>
		<div ng-cloak ng-app="myApp" align="center">
			<form name="myForm" action="controller_user.php" ng-controller="formController" class="container form-horizontal">
				<h1 align='center'>Edit Profile</h1>
				<p>&nbsp;</p>
				<div class="form-group has-feedback" ng-class="{'has-error':myForm.username.$dirty && myForm.username.$invalid}">
					<label class="col-sm-4 control-label">username</label>
					<div class="col-sm-4">
						<textarea rows="1" cols="20" name="username" ng-pattern="/^[a-zA-Z]{1}/" ng-required="true" required autofocus ng-minlength="2" ng-maxlength="20" class="form-control"><?php echo $_SESSION['username']?></textarea>
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
						<textarea rows="1" cols="20" name="email" ng-required="true" required autofocus ng-minlength="5" ng-maxlength="30" class="form-control"><?php echo $_SESSION['email']?></textarea>
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
						<textarea rows="8" cols="40" name="description" required autofocus ng-maxlength="200" class="form-control"><?php echo $_SESSION['description']?></textarea>
						<div ng-show="myForm.description.$dirty && myForm.description.$error.maxlength" class="alert alert-danger help-block">
							maximum length of 200
						</div>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<button name="update_profile" type="submit" class="btn btn-success col-sm-6" ng-click="confirm()" ng-disabled="myForm.$invalid">Update</button>
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

?>
