<?php
    session_start();
    require_once 'Dao.php';
    $dao = new Dao();
    $username;
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
    include("header.php");
    $thisPage = "schedule";
?>

    <div id="mainBox">
        <p> Will display Day, Week, Month, Year schedule </p>
    </div>
    
<?php
    include("loginPanel.php");
    include("footer.php");
?>
