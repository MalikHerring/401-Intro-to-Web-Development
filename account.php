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
<?php 
    include("loginPanel.php");
    include("footer.php");   
?>
