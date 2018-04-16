<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $_SESSION['presets'] = array($_POST);
    
    
    if($dao->login($username, $password)){
        $_SESSION['validity'] = "valid";
        $_SESSION['messages'] = array("Welcome Back, " . $username . "!");
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
    

    