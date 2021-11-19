<?php
    session_start();
    if (!$_SESSION) {

    } else {
        include('connect.php');
        $index = $_GET['index'];
        $sql = "UPDATE transactions SET status = '1' WHERE transactionId = '".$index."'";
        if (mysqli_query($con,$sql)) {
            $sql = "UPDATE rooms a JOIN roomtransactions b ON a.roomId = b.roomId JOIN transactions c ON b.transactionId = c.transactionId SET a.status ='0' WHERE c.transactionId = '$index'";
            if(mysqli_query($con, $sql)) {
                echo "<script type='text/javascript'>alert('Checkout process is done');
                window.location='showCheckOutReserved.php'</script>";
            }
        }
    }

?>