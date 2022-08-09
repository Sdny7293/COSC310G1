<!DOCTYPE html>
<html ng-app class="vh-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" contents="chatbox main screen" />
    <title>Notifications</title>
    <link rel="stylesheet" href="../css/notifications.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Font -->
    <link rel="stylesheet" href="../css/theme.css" />
</head>

<body ng-controller="GetRequestController" ng-init="getAllNotifications()" class="mx-auto d-flex flex-column vh-100">
    <div class="d-flex h-5-5 w-100 bg-white mb-4">
        <?php include 'navBar.php' ?>
    </div>
    <div class="mx-auto d-flex flex-row h-90 w-50"> 
        <!-- notifications summary column -->
        <div id="notifications-summary-tab" class="border rounded helv-bold d-flex flex-column w-75">
            <!-- individual notification summaries -->
            <div class = "overflow-auto">
                <div ng-repeat="notification in notifications" class="d-flex flex-row border-bottom pt-2 ps-1 pb-2">
                    <div id="notifications-summary-profpic">
                        <img id="notifications-summary-profile-pic" src="../images/profilepic.jpg" alt="profile picture" />
                    </div>
                    <div id="notifications-summary-info" class="d-flex flex-column flex-grow-1">
                        <div class="helv-reg fs-5-5 pt-2">
                            <span class="ps-0 pe-0">{{message.sender}}</span>
                        </div>
                        <div class="helv-reg fs-6">
                        {{message.sender}}: {{message.message}}
                        </div>
                    </div>
                    <div>
                        <p class="fs-7 helv-reg pt-3 pe-2">{{message.date_sent}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right tab column -->
        <div class="flex-fill align-self-center text-center w-25 ms-4">
            <?php include "footer.php" ?>
        </div>
    </div>

    <script src="../angular.js"></script>
    <!-- Script to send a message -->
    <script>
        function GetRequestController($scope, $http) {
            var messageArr = [];
            $scope.messages = messageArr;

            $scope.getAllMessages = function() {
                $http.get('../backend/processRequest.php', {
                        params: {
                            act: "displayMessages"
                        }
                    })
                    .success(function(data, status, headers, config) {
                        for (var i = 0; i < data.length; i++) {
                            var sender = data[i].sender_id;
                            var receiver = data[i].receiver_id;
                            var message = data[i].content;
                            var date_sent = data[i].date_sent;
                            var time_sent = data[i].time_sent;

                            $scope.receiver = data[i].receiver_id;
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