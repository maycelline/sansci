<?php
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    include('connect.php');

    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);
    $found = false;

    while($row = mysqli_fetch_array($result)){
        if($row[3] == $email && $row[4] == $password){
            $found = true;
            session_start();
            $_SESSION['userId'] = $row[0];
            $_SESSION['firstName'] = $row[1];
            $_SESSION['lastName'] = $row[2];
            $_SESSION['email'] = $row[3];
            $_SESSION['password'] = $row[4];
            $_SESSION['phoneNumber'] = $row[5];
            $_SESSION['type'] = $row[6];
        }
    }

    if($found && $_SESSION['type'] == 'ADMIN'){
        echo "<script type='text/javascript'>";
        echo "if(confirm('Welcome, admin!')){
            location.href = 'index.php';
        } else {
            location.href = 'logout.php';
        }";
        echo "</script>";
    } else if($found){
        echo "<script type='text/javascript'>";
        echo "if(confirm('Welcome, member!')){
            location.href = 'index.php';
        } else {
            location.href = 'logout.php';
        }";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "if(confirm('Failed to login!')){
            location.href = 'index.php';
        }";
        echo "</script>";
    }
?>