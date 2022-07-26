<html ng-app>
<head>
	<title>Simple Echoing to/from Server</title>
</head>

<body>
	<div ng-controller='GetRequestController'>
		Type your message: <textarea ng-model="msg"></textarea> <br/>
		<!-- Echo #2: <input ng-model="echo2"/> <br/> -->
		<button type="button" ng-click='getEcho()'>Get Echo</button>
	</div>
	
	<script src="../angular.js"></script>
	<script>
		function GetRequestController($scope, $http) {

			$scope.getEcho = function() {
				//create a http connection to send message to processRequest.php
				$http.get('processRequest.php', { ///EchoServlet/echoserve will be my php file
					//contains the "message"
					params: {
								//parameters to be passed to php
								whatever_key_value_i_want: $scope.msg, 	//key is echo1, value is $scope.echo1. The $scope.echo1 is from line 8's user input
								// echo2: $scope.echo2
							}
						}
					)
					.success(function(data, status, headers, config) {
						alert(data)
					})
					.error(function(data, status, headers, config) {
						alert(data)
					});
			};
		}
		
	</script>

</body>
</html>

