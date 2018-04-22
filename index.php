<?php
    $thisPage = "index";
    include("header.php");
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
                print   "<tr><td>" . htmlspecialchars($user['username']) . "</td>" .
                        "<td>" . htmlspecialchars($user['email']) . "</td>" .
                        #"<td>" . htmlspecialchars($user['password']) . "</td>" .
                        "<td>" . $user['access'] . "</td>" .
                        "<td>" . $user['accountID'] . "</td></tr>";
            }
        ?>
        </table>
        
        <?php
            $username = $_SESSION['username'];
            if (!isset($username)){
                echo "<h2> Please Log in or create an Account on the righthand side</h2>";
            } else {
                #$title = isset($presets['title']) ? $presets['title'] : '';
                $date = date("Y-m-d"); ?>
            <div id="createEvent">
            <h2>Create an Event!</h2>
            <form action="eventHandler.php" method="POST" enctype="multipart/form-data" id="event"> 
                    <div><label for="eventTitle"> 
                        <?php
                            echo"Title:        ";
                        ?>
                    </label><input class="input" type="text" id="eventTitle" name="eventTitle"></div>
                    
                    <div> <label for="completionDate"> 
                        <?php 
                            echo "Date:        ";
                        ?>
                    </label><input class="input" type="date" id = "completionDate" name="completionDate" min="<?php echo $date; ?>"></div>
                    
                    <div><label for="description"> 
                        <?php
                            echo "Description: ";
                        ?>
                    </label><textarea id="description" name="description" form="event"></textarea></div> 
                    <div><input type="submit" value="Create Event"></div>
            </form>
            </div>
                            
        <?php } ?>
            
    </div>
    
<?php 
    include("footer.php");   
?>
