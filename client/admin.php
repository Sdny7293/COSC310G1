<?php
    require("../backend/controller_admin.php");
    session_start();
	$log = new admin_signin_up_out();
	$log->is_login();
	$data = new web_data();
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="..css/bootstrap.min.css" />
	<script src="../angular.js"></script>
    <head>
        <meta charset="UTF-8">
        <title>admin</title>
        <style>
            *{margin:0;padding:0;}
            #header{
                height:50px;
                background:lightblue;
            }
            #main{
                width:100%;
                overflow:hidden;
            }
            #main .main1{
                width:25%;
                height:800px;
                background:yellow;
                float:left;
            }
            #main .main2{
                width:25%;
                height:800px;
                background:lightgreen;
                float:left;
            }
            #main .main3{
                width:25%;
                height:800px;
                background:pink;
                float:left;
            }
            #main .main4{
                width:25%;
                height:800px;
                float:left;
            }
            #footer{
                height:50px;
                background:gray;
            }
        </style>
    </head>
    <body>
        <div id="header">
            <h1 align="center">Website Management</h1>
            <button name="signout" type="post" ></button>
        </div>
        <div id="main">
            <div class="main1">
                <h3 align="center">General Data</h3>
                <h4>
                    <?php
                        echo "number of users: ".($data->user_num());
                    ?>
                </h4>
                <p>&nbsp;</p>
                <h4>
                    <?php
                        echo "number of posters: ".($data->post_num());
                    ?>
                </h4>
            </div>
            <div class="main2">
                <h3 align="center">User Info</h3>
                <form>
                    <div>
                        <label>username: </label>
                        <div class="form-group has-feedback" ng-class="{'has-error':myForm.username_add.$dirty && myForm.username_add.$invalid}">
                            <input type="text" autocomplete="off" name="username_search" ng-pattern="/^[a-zA-Z]{1}/" ng-required="true" required autofocus ng-minlength="2"  ng-model="data.username" class="form-control" placeholder="username to search">
                        </div>
                        <div class="form-group" align="center">
    						<button name="search" type="submit" ng-click="confirm()" ng-disabled="myForm.$invalid">Search</button>
        				</div>
                        <?php
                        $username = $_GET['username_search'];
                        if(isset($_GET['search'])){
                            $data->search($username);
                        }
                        ?>
                    </div>
                </form>
            </div>
            <div class="main3">
                <h3 align="center">Delete User</h3>
                <form>
                    <div>
                        <label>username: </label>
                        <div class="form-group has-feedback" ng-class="{'has-error':myForm.username_add.$dirty && myForm.username_add.$invalid}">
                            <input type="text" autocomplete="off" name="username_del" ng-pattern="/^[a-zA-Z]{1}/" ng-required="true" required autofocus ng-minlength="2"  ng-model="data.username" class="form-control" placeholder="username to delete">
                        </div>
                        <div class="form-group">
        					<div align="center">
        						<button name="delete" type="submit" ng-click="confirm()" ng-disabled="myForm.$invalid">Delete User</button>
        					</div>
        				</div>
                    </div>
                </form>
                <?php
                $username = $_GET['username_del'];
                if(isset($_GET['delete'])){
                    $data->del_user($username);
                }
                ?>
            </div>
            <div class="main4">
                <h3 align="center">Add User</h3>
                <form>
    				<div class="form-group has-feedback" ng-class="{'has-error':myForm.username_add.$dirty && myForm.username_add.$invalid}">
    					<label>username:</label>
    					<div>
    						<input name="username_add" type="text" autocomplete="off" ng-pattern="/^[a-zA-Z]{1}/" ng-required="true" required autofocus ng-minlength="2" ng-maxlength="20" ng-model="data.username" class="form-control" placeholder="start with an English letter">
    					</div>
    				</div>
    				<div class="form-group has-feedback" ng-class="{'has-error':myForm.email.$dirty && myForm.email.$invalid}">
    					<label>email:</label>
    					<div>
    						<input name="email_add" type="text" autocomplete="off" ng-required="true" required autofocus ng-minlength="5" ng-maxlength="30" ng-model="data.email" class="form-control" placeholder="email addressr">
    					</div>
    				</div>
    				<div class="form-group" ng-class="{'has-error':myForm.password.$dirty && myForm.password.$invalid}">
    					<label>password:</label>
    					<div>
    						<input name="password_add" type="password" autocomplete="off" ng-required="true" ng-minlength="4" ng-maxlength="20" ng-model="data.password" class="form-control" placeholder="password">
    					</div>
    				</div>
    				<div class="form-group">
    					<div align="center">
    						<button name="add_user" type="submit" ng-click="confirm()" ng-disabled="myForm.$invalid">Create User</button>
    						<button type="reset" ng-click="reset()">Reset</button>
    					</div>
    				</div>
    			</form>
    			<?php
                $username = $_GET['username_add'];
                $email = $_GET['email_add'];
                $password = $_GET['password_add'];
                echo"$username";
                if(isset($_GET['add_user'])){
                    $data->add_user($username,$email,$password);
                }
                ?>
            </div>
        </div>
        <div id="footer">footer here</div>
    </body>
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
</html>
