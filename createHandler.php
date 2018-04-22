<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    
    $_SESSION['presets'] = array($_POST);
    
    $valid = true;
    $messages = array();
    
    if (empty($username)){
        $messages[] = "Please provide a username.";
        $valid = false;
    } elseif ($dao->doesUserExist(null,$username)){
        $messages[] = "Username already taken.";
        $valid = false;
    } elseif (strlen($username) > 16){
        $messages[] = "Username cannot be more than 16 characters long";
        $valid = false;
    }
    
    if(empty($email)){
        $messages[] = "Please provide an email";
        $valid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $messages[] = "Invalid Email Format";
        $valid = false;
    } elseif ($dao->doesUserExist($email, null)){
        $messages[] = "Email already in Use";
        $valid = false;
    }
    
    if(empty($password)){
        $messages[] = "Please provide a password";
        $valid = false;
    } elseif (strlen($password) < 6){
        $messages[] = "Please provide a password longer than 6 characters";
        $valid = false;
    } elseif (!$dao->verifyPassword($password)){
        $messages[] = "Password must contain a capital, lowercase, and number characters";
        $valid = false;
    }
    
    if (strcmp($password, $confirmPassword) != 0){
        $messages[] = "Passwords do not match";
        $valid = false;
    }
    
    if(!$valid){
        $_SESSION['validity'] = "invalid";
        $_SESSION['messages'] = $messages;
        header("Location: ../index.php");
        exit;
    }
    
    $_SESSION['validity'] = "valid";
    $_SESSION['messages'] = array("Thank you for creating an account");
    $_SESSION['username'] = $username;
    
    $dao->saveUser($username, $email, $password);
    
    header("Location: ../index.php");
    exit;
?>
