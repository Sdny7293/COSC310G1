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
    <!-- <header>
        <?php //include '../navBar/navBar.php' ?>
    </header> -->

    <div class="m-auto container-width border border-secondary">
        <div class="d-flex m-auto border border-primary vh-100">
            <div id = "msg-summary-tab" class="col-4 col-27-5 mb-0 helv-bold border-bottom">
                <div class = "row border-bottom m-auto fs-5-5 ps-3 pt-2 pb-2">
                    Messaging
                </div>
                <div class = "row m-2">
                    <input id = "search-msg-bar" class = "helv-reg" type = "text" placeholder = "Search Messages">
                </div>
                <!-- individual senders -->
                <div class = "row m-auto">
                    <div id = "msg-summary-profpic" class = "col-3 ps-0 me-2 align-self-center">
                        <img class = "m-auto" id="msg-summary-profile-pic" src="../chatMessages/images/profilepic.jpg" alt="profile picture" />
                    </div>
                    <div id = "msg-summary-info" class = "col pt-2 ps-0 pe-1 border-bottom">
                        <div class = "row helv-reg m-auto fs-5-5">
                            <span class = "ps-0 pe-0">Donald Smith<span class = "ps-2 pe-1 me-0 float-end fs-6">10:56 PM</span></span>
                        </div>
                        <div class = "row m-auto helv-reg fs-6">
                            Donald: Hello
                        </div>
                    </div>
                </div>
                <div class = "row m-auto">
                    <div id = "msg-summary-profpic" class = "col-3 ps-0 me-2 align-self-center">
                        <img class = "m-auto" id="msg-summary-profile-pic" src="../chatMessages/images/profilepic.jpg" alt="profile picture" />
                    </div>
                    <div id = "msg-summary-info" class = "col pt-2 ps-0 pe-1 border-bottom">
                        <div class = "row helv-reg m-auto fs-5-5">
                            <span class = "ps-0 pe-0">Bob Lee<span class = "ps-2 pe-1 me-0 float-end fs-6">July 12</span></span>
                        </div>
                        <div class = "row m-auto helv-reg fs-6 overflow-hidden height">
                            You: Bob you are so cool!
                        </div>
                    </div>
                </div>
            </div>
            <div class="col border col-margin position-relative">
                <!-- Message header -->
                <div class="row border m-auto" id="menu">
                    <div class="col text-start border">
                        <div id="msg-sender-profile-name" class="row helv-bold pt-1">
                            <p class="mb-0 fs-7">Donald Smith</p>
                        </div>
                        <!-- If user is active then bio section shows active -->
                        <!-- <div id = "msg-user-active">
                            <p>Active</p>
                        </div> -->
                        <div class="row helv-reg text-muted">
                            <p class="fs-8 overflow-hidden mb-0 height">Mechanical engineering student with a minor in computer science</p>
                        </div>
                    </div>
                    <div class="col-2 border align-items-center d-flex justify-content-end">
                        <a id="edit" href="#">edit</a>
                    </div>
                </div>
                <!-- Chat history -->
                <div id="chatbox">
                    <!-- Proifile header -->
                    <div id="message-sender-profile">
                        <img id="header-profile-pic" src="../chatMessages/images/profilepic.jpg" alt="profile picture" />
                        <p id="header-name" class="helv-bold">Donald Smith<span id="connection" class="text-muted helv-reg fs-7"> • 1st</span></p>
                        <p id="header-bio" class="fs-7 mb-0">Student at UCLA</p>
                    </div>
                    <!-- Chat content -->
                    <div id="chat-messages">
                        <div id="message-sent-date">
                            <span id="msg-date" class="fs-9 helv-bold text-muted">TODAY</span>
                        </div>
                        <div id="message-sender" class="row">
                            <div class="col-1 me-3 ps-3 pe-0">
                                <img id="msg-profile-pic" src="../chatMessages/images/profilepic.jpg" alt="profile picture" />
                            </div>
                            <div class="col pt-1">
                                <p class="helv-bold fs-7 mb-0 ms-2">Donald Smith<span class="text-muted fs-8 helv-reg"> • 10:02 AM</span></p>
                                <!-- message content -->
                                <p class="helv-reg fs-7 ms-2">Message content</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Textbox to send message -->
                <div class = "position-absolute bottom-0 start-50 translate-middle-x w-100">
                        <textarea id = "msg-textarea" class="p-2 mb-2 form-control" name="usermsg" type="text" id="usermsg" placeholder="Write a message..." rows="3"></textarea>
                        <button id="send" type="button" class="btn btn-primary float-end rounded-5 me-2">Send</button>
                </div>
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