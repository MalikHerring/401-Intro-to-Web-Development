<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    $username;
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
    include("header.php");
    $thisPage = "index";
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
            <form action="eventHandler.php" method="POST" enctype="multipart/form-data" id="event"> 
                    <div> Title: <input type ="text" id="eventTitle" name="eventTitle"></div>
                    <div> Date: <input type="date" name="completionDate" min="<?php $date ?>"></div>
                    <div> Description: <textarea name="description" form="event"></textarea></div> 
                    <div><input type="submit" value="Create Event"></div>
            </form>
                            
        <?php } ?>
            
    </div>
    
<?php 
    include("loginPanel.php");
    include("footer.php");   
?>
