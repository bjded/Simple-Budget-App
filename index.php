<?php
    require 'includes/dbh.inc.php';
    session_start();
    if(isset($_SESSION['id'])) {
        require 'views/main.php';
    }
    else {
        require 'views/logreg.php';
    }
?>
