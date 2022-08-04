<?php
require("controller_user.php");
session_start();
$log = new signin_up_out();
$log -> is_login();
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Personal Homepage</title>
		<link href="css/homeStyle.css" rel="stylesheet">
		<link href="images/profile.png">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="js/layer.js"></script>
		</head>

		<body>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<nav  class="navbar navbar-light bg-light">
					<a id = "navbar" class="navbar-brand" href="#">
						<span class="Column1">					
							<img  src="/img/logo.png" alt="logo" width="80" height="40">
						</span>
						<span class="Column2">
							<input id="logo" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
						</span>
						<span class="Column3">
							<img  src="/images/home.png" alt="logo" width="40" height="40">
						</span>
						<span class="Column4">
							<img  src="/images/mynetwork.png" alt="logo" width="40" height="40">
						</span>
						<span class="Column5">
							<img  src="/images/jobs.png" alt="logo" width="40" height="40">
						</span>
						<span class="Column6">
							<img  src="/images/message.png" alt="logo" width="40" height="40">
						</span>
						<span class="Column7">
							<img  src="/images/notify.png" alt="logo" width="40" height="40">
						</span>
						
							<span class="Column8">
								<img  src="/images/work.png" alt="logo" width="40" height="40">
							</span>
							<span class="Column9">
								<p>Get Hired Faster, Try Premium Free</p>
							</span>	
					</a>
				</nav>
			</li>
		</ul>
		<br>
		<style>
		    div {
                border: 1px;
                width: 60%;
                margin: 20px auto;
            }
		</style>
		<div class="card1" style="width: 60rem; height: 30rem;" id="profile_top">
				<ul class="list-group list-group-flush">
						<li class="list-group-item">
						<img src="<?php
                            if($_SESSION['pic']=='null'){
                                echo './user/picture/default.png?rand='.rand();
                            }
                            else{
                                echo $_SESSION['pic'].'?rand='.rand();
                            }?>" onerror="this.src='./img/default.jpg'" border="1" width="80" height="80"/>
                            <p></p>
                            <input type="button" onclick="window.location.href='picture_upload.php'" value="Edit Picture">
							<h1>Welcome,  
							    <?php echo $_SESSION['username']; ?>!
							</h1>
							<h4>Email:
							    <?php echo " ".$_SESSION['email']; ?>
							</h4>
							<h4>Description:
							    <?php echo " ".$_SESSION['description']; ?>
							</h4>
							<input type="button" onclick="window.location.href='edit_profile.php'" value="Edit Profile">
						</li>
					</ul>
			</div>
		</body>
</html>

