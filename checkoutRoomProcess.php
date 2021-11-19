<?php
    session_start();
    if (!$_SESSION) {

    } else {
        include('connect.php');
        $index = $_GET['index'];
        $sql = "UPDATE transactions SET status = '1' WHERE transactionId = '".$index."'";
        if (mysqli_query($con,$sql)) {
            $sql = "UPDATE rooms SET status = '0' WHERE transactions transactionsId = roomTransactions.transactionId AND rooms.roomId = roomTransactions.roomId AND transactions.transactionId = '".$index."'";
            if(mysqli_query($con,$sql)) {
                echo "<script type='text/javascript'>alert('Checkout process is done');
                window.location='showCheckOutReserved.php'</script>"
            }
        }
    }

?>