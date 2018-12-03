<?php
    session_start();
    include ("header.php");
?>
<div id = "mainBox">
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
        <div id="buttons">
            <div class="button" id="loginButton"> Login </div>
            <div class="button" id="createButton"> Sign-Up </div>
        </div>
        <div id="Login">
            <form action="loginHandler.php" method="POST" enctype="multipart/form-data">
                <div><input value="<?php echo isset($presets['username']) ? $presets['username'] : ''; ?>" placeholder="Username" type="text" id="username" name="username"></div>
                <div><input placeholder="Password" type="password" id="password" name="password"></div>
                <div><input type="submit" value="Login"></div>
            </form>
        </div>
        <div id="CreateAccount">
            <form action="createHandler.php" method="POST" enctype="multipart/form-data">
                <div><input placeholder="Username" value="<?php echo isset($presets['username']) ? $presets['username'] : ''; ?>" type="text" id="username" name="username"></div>
                <div><input placeholder="Email" value="<?php echo isset($presets['email']) ? $presets['email'] : ''; ?>" type="email" id="email" name="email"></div>
                <div><input placeholder="Password" type="password" id="password" name="password"></div>
                <div><input placeholder="Confirm Password" type="password" id="confirmPass" name="confirmPassword"></div>
                <div><input type="submit" value="Create User"></div>
            </form>    
        </div>
    <div>
<?php
    include ("footer.php");
?>