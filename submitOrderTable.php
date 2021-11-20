<?php
    session_start();

    if (empty($_SESSION['userId'])) {
        echo "<script type='text/javascript'>";
        echo "confirm('Please login to continue!');";
        echo "window.location.href = 'index.php#contact';";
        echo "</script>";
    }

    $roomName = $_POST["roomName"];
    $capacitySelected = $_POST["capacitySelected"];
    $paymentMethod = $_POST["paymentMethod"];
    $file = $_FILES["file"];
    $bookedDate = $_POST["bookedDate"];
    $bookedTime = $_POST["bookedTime"];
    $userId = $_SESSION["userId"];

    include('connect.php');

    date_default_timezone_set('Asia/Jakarta');
    $timestamp = date('Y-m-d H:i:s', time());
    $bookedDate = $bookedDate." ".$bookedTime;

    $sql = "SELECT * FROM tables WHERE tableType = '$roomName' AND tableCapacity = '$capacitySelected' AND status = 0";
    $result = mysqli_query($con, $sql);

    $tableId = "";
    while($row = mysqli_fetch_array($result)){
        $tableId = $row[0];
        break;
    }

    move_uploaded_file($file["tmp_name"], "assets/images/files/".$file["name"]);
    $paymentFile = $file["name"];

    if($tableId!=""){
        if($roomName == 'Co-Working'){
            $sql2 = "INSERT INTO transactions(transactionDate, reservedDate, reservationType, paymentMethod, paymentFile, userId, status) VALUES ('$timestamp', '$bookedDate', 2, '$paymentMethod', '$paymentFile', '$userId', 0)";
        } else {
            $sql2 = "INSERT INTO transactions(transactionDate, reservedDate, reservationType, paymentMethod, paymentFile, userId, status) VALUES ('$timestamp', '$bookedDate', 3, '$paymentMethod', '$paymentFile', '$userId', 0)";
        }
        $result = mysqli_query($con, $sql2);
        $sql3 = "UPDATE tables SET `status` = 1 WHERE tableId = '$tableId'";
        $result = mysqli_query($con, $sql3);
    } else {
        echo "<script type='text/javascript'>";
        echo "confirm('All tables according to your request are fully booked! Please try another table capacity.');";
        echo "window.location.href = 'orderTable.php';";
        echo "</script>";
    }

    echo "<script type='text/javascript'>";
    echo "confirm('Transaction successfully made!');";
    echo "window.location.href = 'index.php';";
    echo "</script>";
?>