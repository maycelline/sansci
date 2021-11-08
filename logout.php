<?php
    session_start();
    echo "<script type='text/javascript'>";
    echo "confirm('Thanks for using this service!');";
    echo "window.location.href = 'index.php';";
    echo "</script>";
    session_unset();
    session_destroy();
?>