<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
?>

<div id="sidebar">
    <div id="loginContent">
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
    <div class="button" id="loginButton"> Login </div>
    <div id="Login">
        <form action="loginHandler.php" method="POST" enctype="multipart/form-data">
            <div><input value="<?php echo isset($presets['username']) ? $presets['username'] : ''; ?>" placeholder="Username" type="text" id="username" name="username"></div>
            <div><input placeholder="Password" type="password" id="password" name="password"></div>
            <div><input type="submit" value="Login"></div>
        </form>
    </div>
    <div class="button" id="createButton"> Create Account </div>
    <div id="CreateAccount">
        <form action="createHandler.php" method="POST" enctype="multipart/form-data">
            <div><input placeholder="Username" value="<?php echo isset($presets['username']) ? $presets['username'] : ''; ?>" type="text" id="username" name="username"></div>
            <div><input placeholder="Email" value="<?php echo isset($presets['email']) ? $presets['email'] : ''; ?>" type="email" id="email" name="email"></div>
            <div><input placeholder="Password" type="password" id="password" name="password"></div>
            <div><input placeholder="Confirm Password" type="password" id="confirmPass" name="confirmPassword"></div>
            <div><input type="submit" value="Create User"></div>
        </form>    
    </div>
    <div class="button" id="Cancel"> Cancel </div>
    </div>
    <?php if (!isset($_SESSION['username'])){ ?>
    <div id="logout" class="button" <?php echo "style=\"display: none;\"";} ?> > 
        <form action="logoutHandler.php" enctype="multipart/form-data">
        <div><input></div>
        </form>
    </div>
</div>