<?php
require '../connect.php';

$id = $_GET['id']; 
mysqli_query($connect,"DELETE FROM produse WHERE id_produs='".$id."'");
mysqli_close($connect);
header("Location: sterge_produs.php");
?> 