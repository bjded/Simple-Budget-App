<?php
    // End current session.
    session_start();
    session_unset();
    session_destroy();

    // Return to index.
    header('Location: ../index.php');
    exit();
?>
