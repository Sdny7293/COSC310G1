<?php
    require("controller_user.php");
    session_start();
	$log = new signin_up_out();
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
			<form name="myForm" action="controller_user.php" ng-controller="formController" class="container form-horizontal">
				<h1 align='center'>Sign In</h1>
				<p>&nbsp;</p>
				<div class="form-group has-feedback" ng-class="{'has-error':myForm.username.$dirty && myForm.username.$invalid}">
					<label class="col-sm-4 control-label">username/email</label>
					<div class="col-sm-4">
						<input type="text" autocomplete="off" name="username" ng-required="true" required autofocus ng-minlength="2" ng-maxlength="30" ng-model="data.username" class="form-control" placeholder="username/email">
						<div ng-show="myForm.username.$dirty && myForm.username.$error.maxlength" class="alert alert-danger help-block">
							maximum length of 30
						</div>
						<div ng-show="myForm.username.$dirty && myForm.username.$error.minlength" class="alert alert-danger help-block">
							minimum length of 2
						</div>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error':myForm.password.$dirty && myForm.password.$invalid}">
					<label class="col-sm-4 control-label">password</label>
					<div class="col-sm-4">
						<input type="password" autocomplete="off" name="password" ng-required="true" ng-minlength="4" ng-maxlength="20" ng-model="data.password" class="form-control" placeholder="password">
						<div ng-show="myForm.password.$dirty && myForm.password.$error.maxlength" class="alert alert-danger help-block">
							maximum length of 20
						</div>
						<div ng-show="myForm.password.$dirty && myForm.password.$error.minlength" class="alert alert-danger help-block">
							minimum length of 4
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<button name="signin" type="submit" class="btn btn-success col-sm-6" ng-click="confirm()" ng-disabled="myForm.$invalid">Sign In</button>
						<button type="reset" class="btn btn-info col-sm-6" ng-click="reset()">Reset</button>
					</div>
				</div>
			</form>
			<div align="center">
			    <label>do not have an account?</label>
			    <button onclick="window.open('signup.php')">Sign Up</button>
			</div>
			
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