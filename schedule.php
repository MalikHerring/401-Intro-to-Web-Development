<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    $username;
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
    $thisPage = "schedule";
    include("header.php");
?>

    <div id="mainBox">
        <p> Will display Day, Week, Month, Year schedule </p>
    </div>
    
<?php
    include("loginPanel.php");
    include("footer.php");
?>
