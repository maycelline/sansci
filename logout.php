<?php
    session_start();
    echo "<script>";
    echo "window.alert('Thanks for using this service!')";
    echo "</script>";
    session_unset();
    session_destroy();
    header("Location: index.php");
?>