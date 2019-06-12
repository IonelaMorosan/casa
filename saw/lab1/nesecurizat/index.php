<?php  
    require('connect.php');
    $cale = 'http://localhost/saw/lab1/nesecurizat/';
    if (isset($_POST['login']) and isset($_POST['pass'])){
        $username = $_POST['login'];
        $password = $_POST['pass'];
        $query = "SELECT * FROM user WHERE login='$username' and password='$password'";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        //$count = mysqli_num_rows($result);
        if (mysqli_num_rows($result)){ 
        //tu cand verificai ca $count==1, el era mereu false, cand introduceam 1' or '1' = '1, deoarece aceasta anexa va returna nu doar o coincidenta dar multe :) 
		//si deaceea eu am schimbat conditia ca sa fie potrivita. Tu aveai o validare in plus pentru securitate :)
		//acum la injectare - eu trec in panoul de administrare ;)
            header('Location: '.$cale.'admin.php');
        }
        else{
            header('Location: '.$cale);
        }
    }
?>
<!DOCTYPE html >
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
        <div class="form">
        <p>SIGN IN</p>
        <form name="loginForm" id="loginForm"  method="POST" action="index.php">
            <table>
                <tr>
                    <td><input type="text"  placeholder="Username" name="login" id="login"  /></td>
                </tr>
                <tr>
                    <td><input type="password" placeholder="Password" name="pass" id="pass" /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="LOG IN" id="acces" name="Acces" /></td>
                </tr>
            </table>        
        </form>
    </div> 
</body>
</html>