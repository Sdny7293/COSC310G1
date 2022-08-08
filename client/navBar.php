<ul>
    <!-- Logo -->
    <div class="topnav h-100">
        <!-- Logo -->
        <!-- <img src="./../img/Logo.png" alt="logo" /> -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My Network</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Messaging</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notifications</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Me
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Jobs</a></li>
                                <li><a class="dropdown-item" href="#">Messaging</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Notifications</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- <li><a <?php if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'Home') {
                        echo "class='active'";
                    } ?>href="./../js/Home.php">Home</a></li>
            <li><a <?php if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'Forum') {
                        echo "class='active'";
                    } ?>href="./../js/Forum.php">My Network</a></li>
            <li><a <?php if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'Solutions') {
                        echo "class='active'";
                    } ?>href="./../js/Solutions.php">Jobs</a></li>
            <li><a <?php if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'Exams') {
                        echo "class='active'";
                    } ?>href="./../js/Exams.php">Messaging</a></li>
            <li><a <?php if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'Professor') {
                        echo "class='active'";
                    } ?>href="./../js/Professor.php">Notifications</a></li>
            <li><a <?php if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'Professor') {
                        echo "class='active'";
                    } ?>href="./../js/Professor.php">Me</a></li>
            <li><a <?php if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'Professor') {
                        echo "class='active'";
                    } ?>href="./../js/Professor.php">Work</a></li>
            <li><a href="#">Try premium for free</a></li> -->
        <!-- <div class="rightnav"> -->
        <!-- Account -->
        <?php
        // if ($_SESSION['signed_in'] == true) {
        //     echo
        //     '<div class="dropdown">
        //         <button class="dropbtn">Hello ' . $_SESSION['username'] . '!&nbsp<i class="fa fa-caret-down"></i></button>
        //         <div class = "dropdown-content">
        //             <a id = "userProfile" href="./../js/userProfile.php">My profile</a>
        //             <a id = "logout" href="./../../server/logout.php">Logout</a>
        //         </div>
        //     </div>';
        // } else {
        //     echo '<li><a id="signin" href="./../js/login.php">Sign in</a></li>
        //             <li><a id="register" href="./../js/Registration.php">Register</a></li>';
        // }
        ?>
        <!-- </div> -->
    </div>
</ul>