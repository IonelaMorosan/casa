<?php
    $cale = 'http://localhost/saw/lab4/';
	session_start();
    session_destroy();
    header('Location: '.$cale);
?>