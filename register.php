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
        alert("Password yang anda input salah!");
        header("Location: index.php");
    }

    while($row = mysqli_fetch_array($result)){
        if($row[3] == $email){
            alert("Email ini sudah memiliki akun");
            header("Location: index.php");
            $found = true;
        }
    }

    if(!$found){
        $sql = "INSERT INTO users(firstName, lastName, email, password, phoneNumber, type) VALUES ('$firstName', '$lastName', '$email', '$password', '$phoneNumber', 'MEMBER')";
        if(mysqli_query($con, $sql)){
            session_start();
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['phoneNumber'] = $phoneNumber;
            $_SESSION['type'] = 'MEMBER';
            alert("Register berhasil!");
        } else {
            echo "Gagal";
            // alert("Register gagal!");
        }
    }
?>