<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "user";
	$connect = mysqli_connect($servername, $username, $password, $db_name);
	if (!$connect) die("Not connection: " . mysqli_connect_error()." ".mysqli_connect_errno());
?>
