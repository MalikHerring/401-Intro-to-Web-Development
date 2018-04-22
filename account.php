<?php
    $thisPage = "account";
    include("header.php");
?>

        <div id="mainBox">
            <table>
            <?php
                $username = $_SESSION['username'];
                if ($dao->checkAccess($username)){
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
                    if (!isset($username)) {
                        echo "<div><h1> Please log in on the right side </h1></div>";
                    } else {
                        $user = $dao->getUser($username);
                        print   "<h1> Welcome, " . htmlspecialchars($user['username']) . "</h1>" .
                            "<div> <h3> Your current experience is " . $user['exp'] . "</h3> </div>" .
                            "<div> <h3> The number of your current goals are: " . $user['currentGoals'] . "</h3> </div>" .
                            "<div> <h3> The number of your completed goals are: " . $user['completeGoals'] . "</h3> </div>" .
                            "<div> <h3> Your Account ID Number is: " . $user['accountID'] . "</h3> </div>";
                    }
                }
            ?>
            </table>
        </div>
<?php 
    include("footer.php");   
?>
