<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" contents="chatbox main screen" />
    <title>Chat box</title>
    <link rel="stylesheet" href="css/chatbox.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Font -->
    <link rel="stylesheet" href="/COSC310G1/chatMessages/css/theme.css" />
</head>

<body>
    <header>
        <?php include '../navBar/navBar.php'?>
    </header>

    <div class= "m-auto container-width border border-secondary">
        <div class = "d-flex m-auto border border-primary">
            <div class="col-4 border col-27-5">
                Summary of messages
            </div>
            <div class="col border col-margin">
                <!-- Message header -->
                <div class="row border m-auto" id="menu">
                    <div class="col text-start border">
                        <div id = "msg-sender-profile-name" class="row helv-bold pt-1">
                            <p class = "mb-0 fs-7">Donald Smith</p>
                        </div>
                        <!-- If user is active then bio section shows active -->
                        <!-- <div id = "msg-user-active">
                            <p>Active</p>
                        </div> -->
                        <div class="row helv-reg text-muted">
                            <p class = "fs-8 overflow-hidden mb-0 height">Mechanical engineering student with a minor in computer science</p>
                        </div>
                    </div>
                    <div class="col-2 border align-items-center d-flex justify-content-end">
                        <a id="edit" href="#">edit</a>
                    </div>
                </div>
                <!-- Chat history -->
                <div id="chatbox">
                    <!-- Proifile header -->
                    <div id = "message-sender-profile">
                        <img id = "header-profile-pic" src = "../chatMessages/images/profilepic.jpg" alt = "profile picture"/>
                        <p id = "header-name" class = "helv-bold">Donald Smith<span id = "connection" class = "text-muted helv-reg fs-7"> • 1st</span></p>
                        <p id = "header-bio" class = "fs-7">Student at UCLA</p>
                    </div>
                    <!-- Chat content -->
                    <div id = "chat-messages">
                        <div id = "message-sent-date">
                            <span id = "msg-date" class = "fs-8 helv-bold">TODAY</span>
                        </div>
                        <div id = "message-sender" class = "row">
                            <div class = "col-2">Profile picture</div>
                            <div class = "col">
                                <p>Sender name and time sent</p>
                                <!-- message content -->
                                <p>Message content</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Textbox to send message -->
                <form name="message" action="">
                    <input name="usermsg" type="text" id="usermsg" placeholder = "Write a message..."/>
                    <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
                </form>
            </div>
            <div class="col-27-5 border">
                Right Tab
            </div>
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