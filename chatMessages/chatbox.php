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
</head>

<body>
    <div class= "m-auto container-width border border-secondary">
        <div class = "d-flex m-auto border border-primary">
            <div class="col-4 border col-27-5">
                Summary of messages
            </div>
            <div class="col border">
                <div class="row border m-auto" id="menu">
                    <div class="col text-start border">
                        <div class="row">
                            Name
                        </div>
                        <div class="row">
                            A short biography
                        </div>
                    </div>
                    <div class="col border align-items-center d-flex justify-content-end">
                        <a id="edit" href="#">edit</a>
                    </div>
                </div>

                <div id="chatbox"></div>

                <form name="message" action="">
                    <input name="usermsg" type="text" id="usermsg" />
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