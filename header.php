<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    $username;
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
?>

<html>
    <head>
        <title>Track - Life Assistant</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
        <script src="jquery-3.3.1.slim.js"></script>
        <script src="sidebar.js"></script>
    </head>
    <body>
    <div id = content>
        <div id="menubar">
            <ul id="horizontal-menu" id="menuText">
                <li><a id="logo" href="index.php" alt="Logo"> TRACK </a></li>
                <li<?php if ($thisPage == "index") { echo " id =\"currentPage\"";}?>><a href="index.php" alt="Home">Home</a></li>
                <li<?php if ($thisPage == "schedule") { echo " id =\"currentPage\"";}?>><a href="schedule.php" alt="Schedule">Schedule</a></li>
                <li<?php if ($thisPage == "account") { echo " id =\"currentPage\"";}?>><a href="account.php" alt="Account">Account</a></li>
                <?php if(isset($username)){ ?>
                <li class="signup" id="logout"><a href="logoutHandler.php" alt="logout">Logout</a></li>
                <li class="login" id="username"><a href="account.php" alt="<?php echo $username; ?>"><?php echo $username;?></a></li>
                <?php } else { ?>
                <li class="signup" id="signup"><a href="login.php" alt="Sign-up">Sign-up</a></li>
                <li class="login" id="login"><a href="login.php" alt="Login">Login</a></li>
                <?php } ?>
            </ul>
        </div>