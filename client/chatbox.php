<!DOCTYPE html>
<html ng-app class="vh-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" contents="chatbox main screen" />
    <title>Chat box</title>
    <link rel="stylesheet" href="../css/chatbox.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Font -->
    <link rel="stylesheet" href="/COSC310G1/chatMessages/css/theme.css" />
</head>

<body ng-controller="GetRequestController" class="mx-auto d-flex flex-column vh-100">
    <div class="d-flex h-10 w-100 mx-auto">
        <?php include '../navBar/navBar.php' ?>
    </div>
    <div class="mx-auto d-flex flex-row border border-warning h-90 container-width"> 
        <!-- Message summary column -->
        <div id="msg-summary-tab" class="col-27-5 helv-bold d-flex flex-column">
            <!-- Messages header -->
            <div class="w-100 border-bottom fs-5-5 ps-3 pt-2 pb-2">
                Messages
            </div>
            <!-- Search message bar -->
            <div class="m-2">
                <input id="search-msg-bar" class="helv-reg w-100" type="text" placeholder="Search Messages">
            </div>
            <!-- individual message summaries -->
            <div class = "overflow-auto">
                <div ng-repeat="message in messages" class="d-flex flex-row">
                    <div id="msg-summary-profpic">
                        <img id="msg-summary-profile-pic" src="../images/profilepic.jpg" alt="profile picture" />
                    </div>
                    <div id="msg-summary-info" class="d-flex flex-column flex-grow-1 border-bottom">
                        <div class="helv-reg fs-5-5">
                            <span class="ps-0 pe-0">{{message.sender}}</span>
                        </div>
                        <div class="helv-reg fs-6">
                            Donald: Hello
                        </div>
                    </div>
                    <div>
                        <p class="fs-6">10:56 PM</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Chat history column -->
        <div class="border col-margin d-flex flex-column col-5">
            <!-- Message header -->
            <div class="border mx-auto d-flex flex-row w-100" id="menu">
                <div class="border d-flex flex-column col-11">
                    <div id="msg-sender-profile-name" class="helv-bold pt-1">
                        <p class="mb-0 fs-7">Name here</p>
                    </div>
                    <!-- If user is active then bio section shows active -->
                    <!-- <div id = "msg-user-active">
                                <p>Active</p>
                            </div> -->
                    <div class="helv-reg text-muted text-nowrap">
                        <p class="fs-8 mb-0 text-truncate">Mechanical engineering student with a minor in computer science this is a test</p>
                    </div>
                </div>
                <div class="border d-flex flex-fill justify-content-center align-items-center">
                    <a id="edit" href="#">edit</a>
                </div>
            </div>
            <!-- Chat history -->
            <div id="chatbox" ng-init='getAllMessages()' class="d-flex flex-column overflow-auto border border-danger">
                <!-- Profile header -->
                <div id="message-sender-profile" class="border d-flex flex-column">
                    <img id="header-profile-pic" src="../images/profilepic.jpg" alt="profile picture" />
                    <p id="header-name" class="helv-bold">Name here<span id="connection" class="text-muted helv-reg fs-7"> • 1st</span></p>
                    <p id="header-bio" class="fs-7 mb-0">Student at UCLA</p>
                </div>
                <!-- Chat content -->
                <div ng-repeat="message in messages" class="d-flex flex-column">
                    <div id="message-sent-date">
                        <span id="msg-date" class="fs-9 helv-bold text-muted">{{message.date_sent}}</span>
                    </div>
                    <!-- <div id="message-sender"> -->
                    <div class="d-flex flex-row">
                        <div>
                            <img id="msg-profile-pic" src="../images/profilepic.jpg" alt="profile picture" />
                        </div>
                        <!-- message content -->
                        <div class = "d-flex flex-column">
                            <div class="pt-1">
                                <p class="helv-bold fs-7 mb-0 ms-2">{{message.sender}}<span class="text-muted fs-8 helv-reg"> • {{message.time_sent}}</span></p>
                                <p class="helv-reg fs-7 ms-2">{{message.message}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Textbox to send message -->
            <div class="w-100">
                    <textarea id="msg-textarea" ng-model="msg" class="p-2 mb-2 form-control" name="usermsg" type="text" id="usermsg" placeholder="Write a message..." rows="3"></textarea>
                    <button id="send" ng-click='sendMsg()' type="button" class="btn btn-primary float-end rounded-5 me-2">Send</button>
            </div>
        </div>
        <!-- Right tab column -->
        <div class="border flex-fill">
            Right Tab
        </div>
    </div>

    <script src="../angular.js"></script>
    <!-- Script to send a message -->
    <script>
        var testArr = [{
                name: 'Mary',
                message: 'how are you Jenny?',
                time: '10:00'
            },
            {
                name: 'Jenny',
                message: 'I am good. How about you?',
                time: '10:01'
            },
            {
                name: 'Mary',
                message: 'Not bad.',
                time: '10:02'
            }
        ];

        function GetRequestController($scope, $http) {

            // var testFlag = false;
            $scope.tests = testArr;

            var messageArr = [];

            $scope.messages = messageArr;

            $scope.getAllMessages = function() {
                $http.get('../backend/processRequest.php', {
                        params: {
                            act: "displayMessages"
                        }
                    })
                    .success(function(data, status, headers, config) {
                        // alert(data);

                        for (var i = 0; i < data.length; i++) {
                            var sender = data[i].sender_id;
                            var receiver = data[i].receiver_id;
                            var message = data[i].content;
                            // var dateTime = data[i].date_sent + " " + data[i].time_sent;
                            var date_sent = data[i].date_sent;
                            var time_sent = data[i].time_sent;

                            $scope.messages.push({
                                sender: sender,
                                receiver: receiver,
                                message: message,
                                date_sent: date_sent,
                                time_sent: time_sent
                            });
                        }
                    })
                    .error(function(data, status, headers, config) {
                        alert(status)
                        alert(headers)
                        alert(config)
                    });
            }

            $scope.sendMsg = function() {
                $scope.sender = '<?php echo  "sender"; ?>'
                $scope.receiver = '<?php echo  "receiver"; ?>'
                var today = new Date();
                var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                var time = today.getHours() + ':' + today.getMinutes() + ':' + today.getSeconds();
                // var dateTime = date + " " + time;

                //create a http connection to send message to processRequest.php
                $http.get('../backend/processRequest.php', { ///EchoServlet/echoserve will be my php file
                        //contains the "message"
                        params: {
                            //parameters to be passed to php
                            act: "insertMessage",
                            msg_content: $scope.msg,
                            sender: $scope.sender,
                            receiver: $scope.receiver,
                            date: date,
                            time: time
                            // dateTime: dateTime
                        }
                    })
                    .success(function(data, status, headers, config) {
                        var sender = $scope.sender;
                        var receiver = $scope.receiver;
                        var message = $scope.msg;
                        $scope.messages.push({
                            sender: sender,
                            receiver: receiver,
                            message: message,
                            date: date,
                            time: time
                        });
                    })
                    .error(function(data, status, headers, config) {
                        alert(status)
                        alert(headers)
                        alert(config)
                    });
            };

        }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        // jQuery Document
        $(document).ready(function() {});
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>