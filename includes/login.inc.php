<?php
    // Check if form was used to access this page.
    if(isset($_POST['log-submit'])) {
        ob_start(); // Fix Header Issues

        // Database connection
        require 'dbh.inc.php';

        // Variables
        $user = $_POST['user'];
        $pass = $_POST['password'];

        // Input validation.
        if (empty($user) || empty($pass)) {
            header('Location: ../index.php?l=empty-fields');
            exit();
        }

        // Prepared statement to check if user or email already exists.
        $stmt = $conn->prepare('SELECT * FROM sba_users WHERE sba_username=? OR sba_email=?');
        $stmt -> bind_param("ss", $user, $user);
        $stmt -> execute();
        $result = $stmt -> get_result();
        $row = $result -> fetch_assoc();

        // If account match is found, check password.
        if ($row) {
            // If password matches account, login and start session.
            if (password_verify($pass, $row['sba_password'])) {
                session_start();
                $_SESSION['id'] = $row['sba_id'];
                $_SESSION['username'] = $row['sba_username'];

                $stmt -> close();
                $conn -> close();
                
                // Return to home page on success.
                header('Location: ../index.php?l=success');
                exit();
            }
            else {
                // Return to home page if wrong password.
                header('Location: ../index.php?l=wrong-password');
                exit();
            }
        }
        else {
            // Return to home page if account doesn't exist.
            header('Location: ../index.php?l=no-account');
            exit();
        }
    }
    else {
        // Return to home page if form was not used.
        header('Location: ../index.php?l=no-submit');
        exit();
    }
?>
