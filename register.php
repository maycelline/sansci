<?php
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $retype = md5($_POST["retype"]);
    $phoneNumber = $_POST["phonenumber"];

    include('connect.php');

    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);
    $found = false;

    if($password != $retype){
        echo "<script type='text/javascript'>";
        echo "if(confirm('Wrong password!')){
            location.href = 'index.php';
        } else {
            location.href = 'index.php';
        }";
        echo "</script>";
    }

    while($row = mysqli_fetch_array($result)){
        if($row[3] == $email){
            echo "<script type='text/javascript'>";
            echo "if(confirm('This email already has an account!')){
                location.href = 'index.php';
            } else {
                location.href = 'index.php';
            }";
            echo "</script>";
        }
    }

    if(!$found){
        $sql = "INSERT INTO users(firstName, lastName, email, password, phoneNumber, type) VALUES ('$firstName', '$lastName', '$email', '$password', '$phoneNumber', 'MEMBER')";
        if(mysqli_query($con, $sql)){
            $sql2 = "SELECT * FROM users";
            $result = mysqli_query($con, $sql2);
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
                echo "<script type='text/javascript'>";
                echo "if(confirm('Registration completed!')){
                }";
                echo "location.href = 'index.php'";
                echo "</script>";
            }
        } else {
            echo "<script type='text/javascript'>";
            echo "if(confirm('Registration failed!')){
            }";
            echo "location.href = 'index.php'";
            echo "</script>";
        }
    }
?>