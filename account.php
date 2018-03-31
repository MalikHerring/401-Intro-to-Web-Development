<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    $heading = $dao->createHeading();
    $users = $dao->getUsers("*");
?>

<html>
    <head>
        <title>Timeline Scheduler</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div id = content>
	<?php echo $heading; ?>
        <div id="mainBox">
            <table>
            <?php
                echo "<tr><th>Username</th><th>Email</th><th>Password</th><th>Access</th><th>Account ID</th><tr>";
                foreach($users as $user) {
                    print   "<tr><td>" . htmlspecialchars($user['username']) . "</td>" .
                            "<td>" . htmlspecialchars($user['email']) . "</td>" .
                            "<td>" . htmlspecialchars($user['password']) . "</td>" .
                            "<td>" . $user['access'] . "</td>" .
                            "<td>" . $user['accountID'] . "</td></tr>";
                }
            ?>
            </table>
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
            <form action="handler.php" method="POST" enctype="multipart/form-data">
                <div> Username: <input value="<?php echo isset($presets['username']) ? ''; ?>" type="text" id="username" name="username"></div>
                <div> Email: <input value="<?php echo isset($presets['email']) ? ''; ?>" type="text" id="email" name="email"></div>
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
