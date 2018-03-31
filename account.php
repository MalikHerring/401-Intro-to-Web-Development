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
        <title>Timeline Scheduler</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div id = content>
	<?php echo $heading; ?>
        <div id="mainBox">
            <table>
            <?php
                if (!empty($dao->checkAccess($username))){
                    echo "<tr><th>Username</th><th>Email</th><th>Exp.</th><th>Current Goals</th><th>Completed Goals</th><th>Account ID</th></tr>";
                    foreach($users as $user) {
                        print   "<tr><td>" . htmlspecialchars($user['username']) . "</td>" .
                                "<td>" . htmlspecialchars($user['email']) . "</td>" .
                                "<td>" . $user['exp'] . "</td>" .
                                "<td>" . $user['currentGoals'] . "</td>" .
                                "<td>" . $user['completeGoals'] . "</td>" .
                                "<td>" . $user['accountID'] . "</td></tr>" .;
                    }
                } else {
                    $user = $dao->getUsers($username);
                    print "<h1> Welcome " . htmlspecialchars($user['username']) . "</h1>"
                    ADSFGASDGASGDSGAGSD GET THIS DONE
                    
            ?>
            </table>
        </div>
        <div id="sidebar">       
            <?php if(isset($username){ ?>
            <div>
                <h1>Welcome back, <?php $username ?> </h1>
            <?php } else { ?>
            <form action="createHandler.php" method="POST" enctype="multipart/form-data">
                <div> Username: <br/><input type="text" id="username" name="username"></div>
                <div> Email: <br/><input type="text" id="email" name="email"></div>
                <div> Password: <br/><input type="password" id="password" name="password"></div>
                <div> Confirm Password:<br/><input type="password" id="confirmPass" name="confirmPassword"></div>
                <div><input type="submit" value="Create User"></div>
            </form>"
            <?php } ?>
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
        </div>
    </div>
	<div id="footer">
            <p id="footer-text"> Malik Herring | 2018</p>
        </div>
    </body>
</html>
