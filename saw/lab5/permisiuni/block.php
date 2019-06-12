<?php
    require '../connect.php';
    $id = $_GET['id']; 

        mysqli_query($connect, "UPDATE `user` SET `status`= 0 WHERE `id_user`='".$id."'");
    

    mysqli_close($connect);
    header("Location: edit_cont.php");
?> 