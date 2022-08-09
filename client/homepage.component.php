<!DOCTYPE html>
<html lang="en">
  
<head>
  <?php 
  session_start();
//   require("../backend/controller_user.php");
// session_start();
// $log = new signin_up_out();
// $log -> is_login();

  ?>
  <title>LinkedIn Homepage</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/homepage.component.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>

<!--TOP NAVIGATION BAR -->
<header>

<ul class="list-group list-group-flush">
  <li class="list-group-item">
    <nav  class="navbar navbar-light bg-light">
      <a id = "navbar" class="navbar-brand" href="#">
        <span class="Column1">
          <img  src="../images/icon.png" alt="logo" width="100" height="50">
        </span>
        <span class="Column2">
          <input id="logo" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        </span>
        <span class="Column3">
          <img  src="../images/home.svg" alt="logo" width="40" height="40">
        </span>
        <span class="Column4">
          <img  src="../images/mynetwork.png" alt="logo" width="40" height="40">
        </span>
        <span class="Column5">
          <img  src="../images/jobs.png" alt="logo" width="40" height="40">
        </span>
        <span class="Column6">
          <img  src="../images/message.png" alt="logo" width="40" height="40">
        </span>
        <span class="Column7">
          <img  src="../images/notification.png" alt="logo" width="40" height="40">
        </span>

          <span class="Column8">
            <img  src="../images/work.png" alt="logo" width="40" height="40">
          </span>
          <span class="Column9">
            <p>Get Hired Faster, Try Premium Free</p>
          </span>
          <span class="Column10">
            <button href="#"  id = "logout">Log out</button>
          </span>
      </a>
    </nav>
  </li>
</ul>
</header>
<br>
<br>
<br>
<!--MINI PROFILE -->
<div class="card1" style="width: 28rem;" id="miniProfile">
  <div id="contents" class="card-header">
    <img  id="prof" src="../images/profile.jpg"  alt="profilepic" width="80" height="80"><br>
    <h3> Welcome, Pavan! </h3> <!-- ADD USER NAME HERE -->
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      Connections    41<br>
      Who's Viewed Your profile  4
    </li>
    <li class="list-group-item">
      Access exclusive tools & insights<br>
      Get Hired Faster, Try Premium Free
    </li>
    <li class="list-group-item">
    <img  src="../images/premium.jpg" alt="premiumpic" width="20" height="20">
      My items
    </li>
  </ul>
</div>

<!--NEWS FEED SECTION -->
<div class="card2" style="width: 45rem; height: 100rem;" id="newsfeed">
  <ul class="list-group list-group-flush">
      <li class="list-group-item">

      <?php   
      foreach($_SESSION['Output'] as $value){
        global $pos;
        global $like;
        $like = $value["Likes"];
        $pos = $value["ID"];  
     


        echo " <img  src=".$value["Logo"]."  alt='companyIcon' width='80' height='80'>";
        echo "<h5>".$value["Name"]." ".$value["Followers"]." followers</h5> <br><br>";
        echo "<img  id='tesla2' src=".$value["NewsPic"]."  alt='companyIcon' width='400' height='250'> <br><br> <p>".$value["Feed"]."</p>";
        echo "<div class='container'>";
        echo "<i  onclick='toggling()' class='fa fa-thumbs-up' width='400' height='250'></i>	&emsp;&emsp;&emsp;".$value["Likes"];
        echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button type='button' class='btn btn-primary' data-toggle='collapse' data-target='#demo'>Comment</button>";
        echo " <div id='demo' class='collapse'><form  method ='post' action='../backend/InsertComment.php'>";
        echo "<br><label for='coms'>Comment:</label><br><input type='text' id='coms' name='coms'><br>";
        echo " <input id='comId' type='hidden' name='comId' value=".$value["ID"].">";
        echo "<br><input type='submit' value='Post'></form>";
       


        foreach($_SESSION['Output1'] as $value1){
          echo"<ul>";
          $comVal = $value1["ID"];
          if($value1 == null){
            echo"</ul>";
            return;
          }
          else{
            
            if($value["ID"] == $value1["ID"]){
              echo  "<br><li>".$value1["comments"]."</li>"; //Add user name infront of comments
            }
          }
          echo"</ul>";
        }

        echo"</div></div><br><br>";
      }
    
      ?>

      <script>
        var count = 0;
        function toggling(){
          count++;
          alert(count);
        }
      </script>
    </li>
  </ul>
</div>
<br>

<!--RIGHT TOP NEWS -->
<div class="card3" style="width: 28rem;" id="MiniNews">
  <div id="contents" class="card-header">
    <h3> LinkedIn News </h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
    <ul>
      <li>
        <a href="#">
          War rages on in Ukraine!<br>
        </a>
      </li>
      <li>
        <a href="#">
          Canada's newest mineral deposit found<br>
        </a>
      </li>
      <li>
        <a href="#">
          New variant of covid discovered<br>
        </a>
      </li>
    </ul>
    </li>
  </ul>
</div>

<div class="card4" style = "width: 32rem;" id="Ad">
<img id="ad" src="../images/CIBCAd1.jpg" alt="ad" width="400" height="400">
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>



