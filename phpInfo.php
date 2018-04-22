<?php
    session_start();
    require_once 'Dao.php';
    $dao=new Dao();
    include("header.php");
    if ($dao->checkAccess($_SESSION['username')) {    
        phpinfo();
    } else {
        echo "<script type='text/javascript'>alert(\"You aren't allowed to be here\");</script>";
        header("Location: index.php");
        exit;
    }
?>