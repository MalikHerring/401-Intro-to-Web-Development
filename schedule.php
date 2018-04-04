<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    $heading = $dao->createHeading();
    $username;
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
?>

<html>
    <head>
        <title>LifeGoals</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
    <div id = content>
	<?php echo $heading; ?>
        <div id="mainBox">
            <p> Will display Day, Week, Month, Year schedule </p>
        </div>
        <div id="sidebar">
        <?php
            if (isset($_SESSION['messages'])){
                $validity = $_SESSION['validity'];
                foreach($_SESSION['messages'] as $message){
                    echo "<div class='message $validity'>$message</div>";
                }
            }
        
            $presets= array();
        
            if (isset($_SESSION['presets'])){
                $presets= array_shift($_SESSION['presets']);
            }
            
            unset($_SESSION['presets']);
            unset($_SESSION['messages']);
            unset($_SESSION['messages']);
        ?> 
            <div id="Login">
                <form action="loginHandler.php" method="POST" enctype="multipart/form-data">
                    <div> Username: <input value="<?php echo isset($presets['username']) ? $presets['username'] : ''; ?>" type="text" id="username" name="username"></div>
                    <div> Password: <input type="password" id="password" name="password"></div>
                    <div><input type="submit" value="Login"></div>
                </form>
            </div>
            <div id="CreateAccount">
                <form action="createHandler.php" method="POST" enctype="multipart/form-data">
                    <div> Username: <input value="<?php echo isset($presets['username']) ? $presets['username'] : ''; ?>" type="text" id="username" name="username"></div>
                    <div> Email: <input value="<?php echo isset($presets['email']) ? $presets['email'] : ''; ?>" type="text" id="email" name="email"></div>
                    <div> Password: <input type="password" id="password" name="password"></div>
                    <div> Confirm Password: <input type="password" id="confirmPass" name="confirmPassword"></div>
                    <div><input type="submit" value="Create User"></div>
                </form>
            </div>            
        </div>
    </div>
	<div id="footer">
            <p id="footer-text"> Malik Herring | 2018</p>
        </div>
    </body>
</html>
