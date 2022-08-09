<?php
    require("../backend/controller_user.php");
    session_start();
	$log = new signin_up_out();
	$log->not_login();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<script src="../angular.js"></script>
    </head>
    <body>
		<div ng-cloak ng-app="myApp" style="margin-top: 60px;">
			<form name="myForm" action="controller_user.php" ng-controller="formController" class="container form-horizontal">
				<h1 align='center'>Sign Up</h1>
				<p>&nbsp;</p>
				<div class="form-group has-feedback" ng-class="{'has-error':myForm.username.$dirty && myForm.username.$invalid}">
					<label class="col-sm-4 control-label">username</label>
					<div class="col-sm-4">
						<input type="text" autocomplete="off" name="username" ng-pattern="/^[a-zA-Z]{1}/" ng-required="true" required autofocus ng-minlength="2" ng-maxlength="20" ng-model="data.username" class="form-control" placeholder="start with an English letter">
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
						<input type="text" autocomplete="off" name="email" ng-required="true" required autofocus ng-minlength="5" ng-maxlength="30" ng-model="data.email" class="form-control" placeholder="email addressr">
						<div ng-show="myForm.email.$dirty && myForm.email.$error.maxlength" class="alert alert-danger help-block">
							maximum length of 30
						</div>
						<div ng-show="myForm.email.$dirty && myForm.email.$error.minlength" class="alert alert-danger help-block">
							minimum length of 5
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
				<div class="form-group" ng-class="{'has-error':myForm.passwordConfirm.$dirty && myForm.passwordConfirm.$invalid}">
					<label class="col-sm-4 control-label">confirm password</label>
					<div class="col-sm-4">
						<input type="password" autocomplete="off" name="passwordConfirm" ng-required="true" ng-model="data.passwordConfirm" class="form-control" placeholder="confirm password">
						<div ng-show="myForm.password.$dirty && myForm.passwordConfirm.$dirty && data.password!==data.passwordConfirm" class="alert alert-danger help-block">
							password not match
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<button name="signup" type="submit" class="btn btn-success col-sm-6" ng-click="confirm()" ng-disabled="myForm.$invalid||data.passwordConfirm!==data.password">Sign Up</button>
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
