<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    $heading = $dao->createHeading();
?>

<html>
    <head>
        <title>Goals</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div id = content>
	<?php echo $heading; ?>
        <div id="mainBox">
            <p> This will be where we find appointments </p>
        </div>
        <div id="sidebar">
            <form action="handler.php" method="POST" enctype="multipart/form-data">
                <div> Username: <input type="text" id="username" name="username"></div>
                <div> Email: <input type="text" id="email" name="email"></div>
                <div> Password: <input type="password" id="password" name="password"></div>
                <div> Confirm Password: <input type="password" id="confirmPass" name="confirmPassword"></div>
                <div><input type="submit" value="Create User"></div>
            </form>
        </div>
    </div>
	<div id="footer">
            <p id="footer-text"> Malik Herring | 2018</p>
        </div>
    </body>
</html>
