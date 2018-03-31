<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    $heading = $dao->createHeading();
    $users = $dao->getUsers("*");    
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
            <?php
                echo "<tr><th>Username</th><th>Email</th><th>Password</th><th>Access</th><th>Account ID</th><tr>";
                foreach($users as $user) {
                    print   "<tr><td>" . htmlspecialchars($user['username']) . "</td>" .
                            "<td>" . htmlspecialchars($user['email']) . "</td>" .
                            "<td>" . htmlspecialchars($user['password']) . "</td>" .
                            "<td>" . $user['access'] . "</td>" .
                            "<td>" . $user['accountID'] . "</td>";
                }
            ?>
        </div>
        <div id="sidebar">
            <form action="handler.php" method="POST" enctype="multipart/form-data">
                <div> Username: <br/><input type="text" id="username" name="username"></div>
                <div> Email: <br/><input type="text" id="email" name="email"></div>
                <div> Password: <br/><input type="password" id="password" name="password"></div>
                <div> Confirm Password:<br/><input type="password" id="confirmPass" name="confirmPassword"></div>
                <div><input type="submit" value="Create User"></div>
            </form>
        </div>
    </div>
	<div id="footer">
            <p id="footer-text"> Malik Herring | 2018</p>
        </div>
    </body>
</html>
