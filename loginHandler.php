<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $_SESSION['presets'] = array($_POST);
    
    $valid = false;
    $messages = array();
    $users = $dao->getUsers();
    
    foreach ($users as $user){
        if (strcmp($user['username'], $username) == 0) {
            if (strcmp($user['password'], $password) == 0) {
                $messages[] = "Welcome back, " . $username;
                $valid = true;
                break;
            } 
        }
    }
    
    if ($valid) {
        $_SESSION['validity'] = "valid";
        $_SESSION['messages'] = $messages;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    }
    
    
    $_SESSION['validity'] = "invalid";
    $_SESSION['messages'] = array("Username or Password Incorrect");
    header("Location: index.php");
    exit;
?>
    

    