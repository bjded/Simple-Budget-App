<?php
    // Database connection
    require 'dbh.inc.php';
    //session_start();

    // Variables
    $id = $_SESSION['id'];

    $sql = "SELECT sba_due_date, sba_bill_name, sba_bill_amount FROM sba_bills WHERE sba_user_id=".$id;
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $idc = 1;
        while($row = $result -> fetch_assoc()) {
            echo '<tr id="bill-'.$idc.'" class="bill">';
            echo '<td class="unpaid">'.$row['sba_due_date'].'</td>';
            echo '<td class="unpaid">'.$row['sba_bill_name'].'</td>';
            echo '<td class="unpaid">'.'$'.$row['sba_bill_amount'].'</td>';
            echo '</tr>';
            $idc++;
        }
    }

?>
