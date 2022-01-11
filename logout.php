<?php
session_start();
    
        $_SESSION["enroll"] = "";
        $_SESSION["isLoggedin"] = false;
        echo "<script>alert(\"Oh snap! you logged out successfully!!\");var win = window.open(\"index.php\",\"_self\")</script>" ;
    
    ?>