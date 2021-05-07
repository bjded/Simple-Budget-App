<?php
    // Only work if form is used. Return to index page if not.
    if(isset($_POST['reg-submit'])) {
        ob_start(); // Fix Header Issues

        // Database connection
        require 'dbh.inc.php';

        // Variables
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        // Required for ReCAPTCHA 2.0
        $secretKey = "";
        $responseKey = $_POST['g-recaptcha-response'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
        $response = file_get_contents($url);
        $response = json_decode($response);

        if ($response -> success) {

            // Validation
            if (empty($user) || empty($email) || empty($pass)) {
                header('Location: ../index.php?r=empty-fields');
                exit();
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: ../index.php?r=fake-email');
                exit();
            }

            // Prepared statement to check if user or email already exists.
            $stmt = $conn->prepare('SELECT * FROM sba_users WHERE sba_username=? OR sba_email=?');
            $stmt -> bind_param("ss", $user, $email);
            $stmt -> execute();
            $result = $stmt -> get_result();
            if ($result -> fetch_assoc()) {
                header('Location: ../index.php?r=user-exists');
                exit();
            }
            else {
                // Prepared statement to insert user into table
                $stmt = $conn->prepare('INSERT INTO sba_users (sba_username, sba_email, sba_password) VALUES (?, ?, ?)');
                $stmt -> bind_param("sss", $user, $email, $hash);
                $stmt -> execute();

                // Close prepared statement and db connection for register upon completion
                $stmt -> close();
                $conn -> close();

                // Return to home page on success
                header('Location: ../index.php?r=success');
                exit();
            }
        }
        else {
            header("Location: ../index.php?r=hvn");
            exit();
        }
    }
    else {
        header('Location: ../index.php?r=no-submit');
        exit();
    }
?>
