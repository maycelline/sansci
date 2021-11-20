<?php
    session_start();

    if (empty($_SESSION['userId'])) {
        echo "<script type='text/javascript'>";
        echo "confirm('Please login to continue!');";
        echo "window.location.href = 'index.php#contact';";
        echo "</script>";
    }

    $roomName = $_POST["roomName"];
    $tableSelected = $_POST["tableSelected"];
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
    
    $sql = "SELECT * FROM rooms WHERE roomType = '$roomName' AND roomCapacity = '$capacitySelected' AND status = 0";
    $result = mysqli_query($con, $sql);

    $roomId = "";
    while($row = mysqli_fetch_array($result)){
        $roomId = $row[0];
        break;
    }

    move_uploaded_file($file["tmp_name"], "assets/images/files/".$file["name"]);
    $paymentFile = $file["name"];

    if($roomId!=""){
        $sql2 = "INSERT INTO transactions(transactionDate, reservedDate, reservationType, paymentMethod, paymentFile, userId, status) VALUES ('$timestamp', '$bookedDate', 1, '$paymentMethod', '$paymentFile', '$userId', 0)";
        $result = mysqli_query($con, $sql2);
        $sql3 = "UPDATE rooms SET `status` = 1 WHERE roomId = '$roomId'";
        $result = mysqli_query($con, $sql3);
    } else {
        echo "<script type='text/javascript'>";
        echo "confirm('All rooms according to your request are fully booked! Please try another room type.');";
        echo "window.location.href = 'orderRoom.php';";
        echo "</script>";
    }

    $transactionId;
    $sql4 = "SELECT * FROM transactions ORDER BY transactionId DESC LIMIT 1";
    $result = mysqli_query($con, $sql4);
    while($row = mysqli_fetch_array($result)){
        $transactionId = $row[0];
    }

    if($tableSelected == "Boardroom Table"){
        $sql5 = "INSERT INTO roomtransactions(transactionId, roomId, facilityId) VALUES ('$transactionId', '$roomId', 1)";
    } else if($tableSelected == "Theatre Table"){
        $sql5 = "INSERT INTO roomtransactions(transactionId, roomId, facilityId) VALUES ('$transactionId', '$roomId', 2)";
    } else if($tableSelected == "Round Table"){
        $sql5 = "INSERT INTO roomtransactions(transactionId, roomId, facilityId) VALUES ('$transactionId', '$roomId', 3)";
    } else if($tableSelected == "U-Shape Table"){
        $sql5 = "INSERT INTO roomtransactions(transactionId, roomId, facilityId) VALUES ('$transactionId', '$roomId', 4)";
    }

    if(isset($_POST["micSpeaker"])){
        $micSpeaker = $_POST["micSpeaker"];
        $sql6 = "INSERT INTO roomtransactions(transactionId, roomId, facilityId) VALUES ('$transactionId', '$roomId', 5)";
        $result = mysqli_query($con, $sql6);
    }
    if(isset($_POST["cableConn"])){
        $cableConn = $_POST["cableConn"];
        $sql6 = "INSERT INTO roomtransactions(transactionId, roomId, facilityId) VALUES ('$transactionId', '$roomId', 6)";
        $result = mysqli_query($con, $sql6);
    }
    if(isset($_POST["LCDProjector"])){
        $LCDProjector = $_POST["LCDProjector"];
        $sql6 = "INSERT INTO roomtransactions(transactionId, roomId, facilityId) VALUES ('$transactionId', '$roomId', 7)";
        $result = mysqli_query($con, $sql6);
    }
    if(isset($_POST["flipchartMarkers"])){
        $flipchartMarkers = $_POST["flipchartMarkers"];
        $sql6 = "INSERT INTO roomtransactions(transactionId, roomId, facilityId) VALUES ('$transactionId', '$roomId', 8)";
        $result = mysqli_query($con, $sql6);
    }
    if(isset($_POST["coffeeMaker"])){
        $coffeeMaker = $_POST["coffeeMaker"];
        $sql6 = "INSERT INTO roomtransactions(transactionId, roomId, facilityId) VALUES ('$transactionId', '$roomId', 9)";
        $result = mysqli_query($con, $sql6);
    }

    echo "<script type='text/javascript'>";
    echo "confirm('Transaction successfully made!');";
    echo "window.location.href = 'index.php';";
    echo "</script>";
?>