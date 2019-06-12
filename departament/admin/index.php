<?php
	session_start();
	require 'config.php';
	require_once 'connection.php';
	
	$login = $parola = "";
    if ($_POST['ok']) {
		if (!empty($_POST["login"])) {
			$login = $_POST["login"];
		}
		if (!empty($_POST["password"])) {
			$parola = md5($_POST['password']);
	}
	
	$query = "SELECT * FROM user WHERE login='$login' AND password='$parola'";
	$res = mysqli_query($conn, $query); 
	if($row=mysqli_fetch_array($res)) {
		$_SESSION['user'] = $row['id_user'];
		header('Location: http://'.$_SERVER['SERVER_NAME'].$cale.'meniu.php');
	} else {
		header('Location: http://'.$_SERVER['SERVER_NAME'].$cale);
	}
	mysqli_close($conn);
	}
	$login = $parola = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="author" content="Eu" />
	<title>Buna dimineata, administrare</title>
	<link rel="shortcut icon" href="../image/flower.png">  
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/stiluri.css">
</head>
<body>
<div class="w3-container w3-center">
	<header class="w3-container w3-green">
		<h1  id="sus" class="w3-xxlarge w3-text-white w3-opacity">Autentifica-te pentru acces!</h1>
	</header>

	<div class="date_form w3-container w3-border w3-round-xlarge w3-card-8 w3-hover-border-green">
		<form action="<?php $_SERVER['SCRIPT_NAME']?>" method="post">
			<label>Loghin<input type="text" pattern="[a-z0-9]{4,30}" title="Introdu cel cutin 4 litere sau cifre si cel mult 30!" maxlength="30" class="linie" name="login" /></label><br />
			<label>Parola&nbsp;<input type="password" pattern="[a-z0-9]{4,15}" title="Introdu cel cutin 4 litere sau cifre si cel mult 15!" maxlength="15" class="linie" name="password" /></label><br />
			<input type="submit" name='ok' class="w3-container w3-border w3-round-xlarge w3-card-16 w3-green w3-padding-16 w3-hover-border-green" value="Intra" />
		</form>
	</div>
</div>

</body>
</html>