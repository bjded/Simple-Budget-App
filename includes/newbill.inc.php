<?php
    // Only work if form is used. Return to index page if not.
    if(isset($_POST['nb-submit'])) {
        // Database connection
        require 'dbh.inc.php';
        session_start(); // Needed

        // Variables
        $id = $_SESSION['id'];
        $due_date = $_POST['due-date'];
        $bill = $_POST['bill'];
        $amount = $_POST['amount'];
        $paid = 0;

        // Validation
        if (empty($due_date) || empty($bill) || empty($amount)) {
            header('Location: ../index.php?nb=empty-fields');
            exit();
        }

        // Prepared statement to insert user into table
        $stmt = $conn->prepare('INSERT INTO sba_bills (sba_user_id, sba_due_date, sba_bill_name, sba_bill_amount, sba_bill_paid) VALUES (?, ?, ?, ?, ?)');
        //$stmt -> bind_param("sssss", $id, $due_date, $bill, number_format($amount, 2), $paid);
        $stmt -> bind_param("sssss", $id, $due_date, $bill, $amount, $paid);
        $stmt -> execute();

        // Close prepared statement and db connection for register upon completion
        $stmt -> close();
        $conn -> close();

        // Refresh current page
        //header('Location: '.$_SERVER['REQUEST_URI']);
        header('Location: ../index.php?nb=success');
        exit();
    }
    else {
        header('Location: ../index.php?nb=no-submit');
        exit();
    }
?>
