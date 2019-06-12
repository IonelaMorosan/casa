<?php
require '../connect.php';

$id = $_GET['id']; 
mysqli_query($connect,"DELETE FROM user WHERE id_user='".$id."'");
mysqli_close($connect);
header("Location: sterge_cont.php");
?> 