<html>
    <head>
        <title>Life Assistant</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        <script src="jquery-3.3.1.slim.js"></script>
        <script src="sidebar.js"></script>
    </head>
    <body>
    <div id = content>
        <div id="header">
            <img alt= "Running Header" src= "/images/header.jpeg"> 
            <img alt= "logo" src= "/images/logo.jpeg" id="logo">
        </div>
        <div id="menubar">
            <ul id="horizontal-menu" id="menuText">
                <li<?php if ($thisPage == "index") { echo " id =\"currentPage\"";}?>><a href="index.php" alt="Home">Home</a></li>
                <li<?php if ($thisPage == "schedule") { echo " id =\"currentPage\"";}?>><a href="schedule.php" alt="Schedule">Schedule</a></li>
                <li<?php if ($thisPage == "account") { echo " id =\"currentPage\"";}?>><a href="account.php" alt="Account">Account</a></li>
            </ul>
        </div>