<!DOCTYPE html>
<html lang="en">
	<!-- TODO: -->
	<!-- Fix all paths for refs -->
    <head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<script src="js/angular.js"></script>
    </head>
    <body>
		<div ng-cloak ng-app="myApp" style="margin-top: 60px;">
			<form name="myForm" action="signin.php" ng-controller="formController" class="container form-horizontal">
				<h1 align='center'>Sign In</h1>
				<p>&nbsp;</p>
				<div class="form-group has-feedback" ng-class="{'has-error':myForm.username.$dirty && myForm.username.$invalid}">
					<label class="col-sm-4 control-label">username/email</label>
					<div class="col-sm-4">
						<input type="text" autocomplete="off" name="username" ng-required="true" required autofocus ng-model="data.username" class="form-control" placeholder="username/email">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error':myForm.password.$dirty && myForm.password.$invalid}">
					<label class="col-sm-4 control-label">password</label>
					<div class="col-sm-4">
						<input type="password" autocomplete="off" name="password" ng-required="true" ng-model="data.password" class="form-control" placeholder="password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<button type="submit" class="btn btn-success col-sm-6" ng-click="confirm()" ng-disabled="!myForm.username.$dirty || !myForm.password.$dirty ">Sign In</button>
						<button type="reset" class="btn btn-info col-sm-6" ng-click="reset()">Reset</button>
					</div>
					<div class="col-sm-offset-4 col-sm-4">
					    <input type="button" class="btn btn-info col-sm-6" onclick="window.location.href='signup.html'" value="Sign Up">
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