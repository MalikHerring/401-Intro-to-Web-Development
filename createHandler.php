<?php
    try{
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
    }
    if($dao->doesUserExist($email, $username)){
        $messages[] = "User Already Exists with that Username or Email.";
        $valid = false;
    }
    if (strlen($username) > 16){
        $messages[] = "Username cannot be more than 16 characters long";
        $valid = false;
    }
    
    if(empty($email)){
        $messages[] = "Please provide an email";
        $valid = false;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $messages[] = "Invalid Email Format";
        $valid = false;
    }
    
    if(empty($password)){
        $messages[] = "Please provide a password";
        $valid = false;
    }
    if (strlen($password) < 6){
        $messages[] = "Please provide a password longer than 6 characters";
        $valid = false;
    }
    if (!$dao->verifyPassword($password)){
        $messages[] = "Password must contain a capital, lowercase, and number characters";
        $valid = false;
    }
    if (strcmp($password, $confirmPassword) != 0){
        $messages[] = "Passwords do not match";
        $valid = false;
    }

    
    if(!$valid){
        try {
        $_SESSION['validity'] = "invalid";
        $_SESSION['messages'] = $messages;
        } catch (Exception $e) {
            echo "Something went wrong: " . e->getMessage();
        }
        header("Location: index.php");
        exit;
    }
    
    $_SESSION['validity'] = "valid";
    $_SESSION['messages'] = array("Thank you for creating an account");
    $_SESSION['username'] = $username;
    
    $dao->saveUser($username, $email, $password);
    } catch (Exception $e) {
        echo "Something went wrong: " . e->getMessage();
    }
    
    header("Location: index.php");
    exit;

?>
    

    
