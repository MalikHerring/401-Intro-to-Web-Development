<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $_SESSION['presets'] = array($_POST);
    
    $valid = false;
    $messages = array();
    
    if ($dao->doesUserExist(null, $username)){
        $user = $dao->getUser($username, $password);
        if (strcmp($user['password'], $password) == 0) {
            $messages[] = "Welcome back, " . htmlspecialchars($username);
            $valid = true;
        }
    }    
            if (
                $messages[] = "Welcome back, " . $username;
                $valid = true;
 
    if ($valid) {
        $_SESSION['validity'] = "valid";
        $_SESSION['messages'] = $messages;
        $_SESSION['username'] = $username;
        unset($_SESSION['presets']);
        header("Location: index.php");
        exit;
    }
    
    
    $_SESSION['validity'] = "invalid";
    $_SESSION['messages'] = array("Username or Password Incorrect");
    header("Location: index.php");
    exit;
?>
    

    