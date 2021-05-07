<?php
    require 'includes/dbh.inc.php';
    //session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Budget App | DedSoft</title>
    <link rel="shortcut icon" href="img/dedsoft-favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div id='new-bill-container'>
        <form action="includes/newbill.inc.php" method="post">
            <label for="">Due Date:</label>
            <input type="number" name="due-date" id="">
            <label for="">Bill:</label>
            <input type="text" name="bill" id="">
            <label for="">Amount:</label>
            <input type="text" name="amount" id="">
            <input type="submit" name="nb-submit" value="Add Bill">
            <p onclick='hideNewBill()'>Cancel</p>
        </form>
    </div>

    <div id='account-container'>
        <?php echo '<p>'.$_SESSION['username'].'</p>' ?>
        <?php echo '<a href="includes/logout.inc.php">Logout</a>'; ?>
    </div>

    <div id="info-container">
        <h3>Weekly Overview</h3>
        <?php echo '<p>Good morning, '.$_SESSION['username'].'.</p>' ?>
        <p>You have 0 bills due this week.</p>
        <p>The total amount you owe is $0.00.</p>
        <p>Sticking to the budget can save you $0.00!</p>
    </div>

    <div id='bill-container'>
        <table id='bc-table'>
            <tr>
                <th>Due</th>
                <th>Bill</th>
                <th>Amount</th>
            </tr>
            <?php include 'includes/getbill.inc.php'?>
        </table>
        <div id='button-container'>
            <button style='background-color: #315f50' onclick='showNewBill()'>Add Bill</button>
            <button style='background-color: rgb(235, 0, 0)' onclick='setDelete()'>Delete Bill</button>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
