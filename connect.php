<?php
	$con = mysqli_connect('localhost','root','','sansci');
	if (mysqli_connect_errno()) {
		echo "Failed to connect to mySQL: ".mysqli_connect_error();
	}
?>