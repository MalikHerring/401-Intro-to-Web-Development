<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    $heading = $dao->createHeading();
    $users = $dao->getUsers("*");  
    $username = $_SESSION['username'];
?>

<html>
    <head>
        <title>LifeGoals</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div id = content>
	<?php echo $heading; ?>
        <div id="mainBox">
            <p> Will display Day, Week, Month, Year schedule </p>
        </div>
        <div id="sidebar">
            <?php if(isset($username)){ 
            echo 
                "<div>" .
                    "<h1>Welcome back, " . $username . "</h1>" .
                "</div>";
            } else { 
            echo    
                "<form action=\"createHandler.php\" method=\"POST\" enctype=\"multipart/form-data\">
                    <div> Username: <br/><input type=\"text\" id=\"username\" name=\"username\"></div>
                    <div> Email: <br/><input type=\"text\" id=\"email\" name=\"email\"></div>
                    <div> Password: <br/><input type=\"password\" id=\"password\" name=\"password\"></div>
                    <div> Confirm Password:<br/><input type=\"password\" id=\"confirmPass\" name=\"confirmPassword\"></div>
                    <div><input type=\"submit\" value=\"Create User\"></div>
                </form>";
            ?>
        </div>
    </div>
	<div id="footer">
            <p id="footer-text"> Malik Herring | 2018</p>
        </div>
    </body>
</html>
