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
        <title>Life Goals</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
    <div id = content>
	<?php     
            $heading = $dao->createHeading();
            echo $heading; 
                    
            $presets= array();
        
            if (isset($_SESSION['presets'])){
                $presets= array_shift($_SESSION['presets']);
            }
            
            unset($_SESSION['presets']);
            unset($_SESSION['messages']);
            unset($_SESSION['messages']);
        ?>
        <div id="mainBox">
            <h2> Current Account List </h2>
            <table>
            <?php
                $users = $dao->getUsers();
                echo    "<tr><th>Username</th><th>Email</th>" . 
                        #<th>Password</th> .
                        "<th>Access</th><th>Account ID</th><tr>";
                foreach($users as $user) {
                    print   "<tr><td>" .    htmlspecialchars($user['username'])     . "</td>" .
                            "<td>" .        htmlspecialchars($user['email'])        . "</td>" .
                            #"<td>" .        htmlspecialchars($user['password'])     . "</td>" .
                            "<td>" .        $user['access']                         . "</td>" .
                            "<td>" .        $user['accountID']                  . "</td></tr>";
                }
            ?>
            </table>
            
            <?php
                $username = $_SESSION['username'];
                if (!isset($username)){
                    echo "<h2> Please Log in or create an Account on the righthand side</h2>";
                } else {
                    #$title = isset($presets['title']) ? $presets['title'] : '';
                    $date = date("Y-m-d");
                    echo    "<form action=\"eventHandler.php\" method=\"POST\" enctype=\"multipart/form-data\" id=\"event\">" .
                                "<div> Title: <input type =\"text\" id=\"eventTitle\" name=\"eventTitle\"></div>" .
                                "<div> Date: <input type=\"date\" name=\"completionDate\" min= " . $date . "></div>" .
                                "<div> Description: <textarea name=\"description\" form=\"event\"></textarea></div>" .
                                "<div><input type=\"submit\" value=\"Create Event\"></div>" .
                            "</form>";
                            
                }
            ?>
            
        </div>
        <div id="sidebar">
        <?php
            if (isset($_SESSION['messages'])){
                $validity = $_SESSION['validity'];
                foreach($_SESSION['messages'] as $message){
                    echo "<div class='message $validity'>$message</div>";
                }
            }
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
                    <div> Email: <input value="<?php echo isset($presets['email']) ? $presets['email'] : ''; ?>" type="email" id="email" name="email"></div>
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
