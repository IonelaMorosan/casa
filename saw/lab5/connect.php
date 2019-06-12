<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "lab5_hash";
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try
{
	$connect = mysqli_connect($servername, $username, $password, $db_name);
}
catch (Exception $e)
{
    $data_ora =	error_log($e->getMessage()."\t".date("d/m/y H:i:s")."\t".$_SERVER['PHP_SELF']."\r\n", 3, "d:protocol_erori.txt");
	header('Location: http://'.$_SERVER['SERVER_NAME'].'/saw/lab5/'.'start.html');
}
?>



