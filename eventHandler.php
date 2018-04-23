<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    
    $title=$_POST["title"];
    $completionDate=$_POST["completionDate"];
    $description=$_POST["description"];
    $username=$_SESSION["username"];
    
    $_SESSION['presets'] = array($_POST);
    
    $valid = true;
    $messages= array();
    
    if(empty($title)){
        $messages[] = "Please provide a title for the event.";
        $valid = false;
    }
    
    if(empty($completionDate)){
        $messages[] = "Please Provide a completion Date.";
        $valid = false;
    }
    
    if(empty($description)){
        $description = " ";
    }
    
    if (!$valid){
        $_SESSION['validity'] = "invalid";
        $_SESSION['messages'] = $messages;
        header("Location: index.php");
        exit;
    }
    
    $dao->saveSchedule($title, $completionDate, $description, $username);
    header("Location: index.php");
    exit;
?>