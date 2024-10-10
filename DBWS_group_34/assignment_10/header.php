<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reload CUB info</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
</head>
<body>
<header>
    <?php
    $redirect = "./main_page.php";
    if(isset($_COOKIE['is_auth'])):
        $redirect = "./insert_page.php";
    endif;
    ?>
    <a href="<?php echo $redirect?>"><img src="img/logo.jpeg" alt="CUB" title="CUB"/></a>
    <div class="enter-or-register-box">
        <?php
        if(isset($_COOKIE['is_auth'])):
            ?>
            <a href="./logout.php">
                <button class = "admin_button">
                    Logout
                </button>
            </a>
        <?php
        else:
            ?>
            <a href="./admin_login.php">
                <button id = "admin" class = "admin_button">
                    Enter to admin account
                </button>
            </a>
        <?php
        endif;
        ?>
    </div>
    <nav>
        <ul>
            <li><a href="main_page.php">Home</a></li>
            <li><a href="#">Students</a></li>
            <li><a href="#">Lecturers</a></li>
            <li><a href="#">Marks</a></li>
            <li><a href="#">Groups</a></li>
            <li><a href="#">Rating</a></li>
        </ul>
    </nav>
</header>