<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" contents="chatbox main screen" />
    <title>My Networks - Pending invitations</title>
    <link rel="stylesheet" href="css/chatbox.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Font -->
    <link rel="stylesheet" href="/COSC310G1/chatMessages/css/theme.css" />
</head>

<body>
    <?php include "../navBar/navBar.php"?>
    <div class="m-auto container w-50 rounded-2 border border-secondary">
        <div class = "row pt-2 px-1 border-bottom">
            <div class = "col">
                <p class = "mb-2">Invitations</p>
            </div>
            <!-- <div class = "col">
                <p class = "float-end mb-1">Manage</p>
            </div> -->
        </div>
        <div class = "row">
            <div class = "col-2 px-0">
                <img class = "w-100 border" src = "./images/profilepic.jpg" alt = "user profile picture"/>
            </div>
            <div class = "col-6 align-self-center">
                <p class = "m-0">Sam White</p>
                <p class = "m-0">Undergraduate at UBC</p>
            </div>
            <div class = "col-2 align-self-center">
                <p class = "my-0">Ignore</p>
            </div>
            <div id = "my-network-accept" class = "col-2 align-self-center">
                <p class = "my-0">Accept</p>
            </div>
            <!-- <div>
                <p>Sam's request has been removed</p>
            </div> -->
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        // jQuery Document
        $(document).ready(function() {});
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>