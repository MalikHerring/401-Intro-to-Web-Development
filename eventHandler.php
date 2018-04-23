<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    header("Location: index.php");
    exit;
?>