<?php
    require("controller_admin.php");
    session_start();
	$log = new admin_signin_up_out();
	$log->not_login();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<script src="js/angular.js"></script>
    </head>
    <body>
		<div ng-cloak ng-app="myApp" style="margin-top: 60px;">
			<form name="myForm" action="controller_admin.php" ng-controller="formController" class="container form-horizontal">
				<h1 align='center'>Admin Login</h1>
				<p>&nbsp;</p>
				<div class="form-group has-feedback" ng-class="{'has-error':myForm.id.$dirty && myForm.id.$invalid}">
					<label class="col-sm-4 control-label">admin id</label>
					<div class="col-sm-4">
						<input type="text" name="id" ng-required="true" required autofocus class="form-control" placeholder="id">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">password</label>
					<div class="col-sm-4">
						<input type="password" name="password" ng-required="true" class="form-control" placeholder="password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<button name="signin" type="submit" class="btn btn-success col-sm-6" ng-click="confirm()">Sign In</button>
						<button type="reset" class="btn btn-info col-sm-6" ng-click="reset()">Reset</button>
					</div>
				</div>
			</form>
		</div>
		<script>
			angular.module('myApp', [])
				.controller('formController', ['$scope', function($scope) {
					$scope.confirm = function() {
					}
					$scope.reset = function() {
						$scope.myForm.$setPristine();
					}
				}]);
		</script>
	</body>
</html>