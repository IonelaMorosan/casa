<?php
    $cale = 'http://localhost/saw/lab5/first.php';
	session_start();
	require('log.php');	
	write_logs("log out");
    session_destroy();
    header('Location: '.$cale);
?>