<?php
    session_start();
    require_once 'Dao.php';
    $dao=new Dao();
    include("header.php");
    if ($dao->checkAccess($_SESSION['username')) {    
        phpinfo();
    } else {
        header("Location: index.php");
        exit;
    }
    include("footer.php");
?>