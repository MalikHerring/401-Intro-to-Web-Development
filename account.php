<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    include("header.php");
?>

        <div id="mainBox">
            <table>
            <?php
                $username = $_SESSION['username'];
                if ($dao->checkAccess($username) == 1){
                    echo "<tr><th>Username</th><th>Email</th><th>Exp.</th><th>Current Goals</th><th>Completed Goals</th><th>Account ID</th></tr>";
                    $users = $dao->getUsers();
                    foreach($users as $user) {
                        print   "<tr><td>" . htmlspecialchars($user['username']) . "</td>" .
                                "<td>" . htmlspecialchars($user['email']) . "</td>" .
                                "<td>" . $user['exp'] . "</td>" .
                                "<td>" . $user['currentGoals'] . "</td>" .
                                "<td>" . $user['completeGoals'] . "</td>" .
                                "<td>" . $user['accountID'] . "</td></tr>";
                    }
                } else {
                    $user = $dao->getUser($username);
                    print   "<h1> Welcome, " . htmlspecialchars($user['username']) . "</h1>" .
                            "<div> <h3> Your current experience is " . $user['exp'] . "</h3> </div>" .
                            "<div> <h3> The number of your current goals are: " . $user['currentGoals'] . "</h3> </div>" .
                            "<div> <h3> The number of your completed goals are: " . $user['completeGoals'] . "</h3> </div>" .
                            "<div> <h4> Your Account ID Number is: " . $user['accountID'] . "</h3> </div>";
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
