<?php
    include("header.php");
    if ($dao->checkAccess($username)) {    
        phpinfo();
    } else {
        echo "<h1> You do not have admin priviledges! </h1>"; 
    }
    include("footer.php");
?>