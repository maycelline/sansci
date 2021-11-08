<?php
    session_start();
    if (!$_SESSION) {
        echo "window.alert('Your session is done, log in first!')";
        header("Location: index.php");
    } else {
        echo "<script>";
        echo "window.alert('Thanks for using this service!')";
        echo "</script>";
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
?>