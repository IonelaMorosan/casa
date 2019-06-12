<?php
	// "eliminam" simbolurile inutile
	function validare($data) {
		$data = trim($data);//eliminarea spațiilor albe
		$data = stripslashes($data);//elimina backslash-urile
		$data = htmlspecialchars($data);//convertește în entități HTML semnele < și >
		return $data;
	}

	$logErr = $passErr = $login = $pass  = $submitErr = "";
	$err_exist = 0;
	$cale = 'http://localhost/saw/lab4/';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_REQUEST['Acces'])) {
			if (empty($_POST["login"])) { //verifică dacă username-ul a fost introdus
				$logErr = "Input the username";
				$err_exist ++;
			}
			else{
				$login = validare($_POST["login"]);
				if (!preg_match("/^[A-ZА-Я][a-zа-я0-9]{5,14}$/",$login)) { // verifică dacă șirul introdus este diferit de expresia regulată
					$logErr = "The password must contain 6-14 letters and numbers, the first one must be a capital letter"; 
					$err_exist ++;
				}
				else {
					$logErr ="";
				}
			}
			if (empty($_POST["pass"])) { //verifică daca password-ul a fost introdus
				$passErr = "Input the password";
				$err_exist ++;
			} 
			else {
				$pass = validare($_POST["pass"]);
				if (!preg_match("/^[A-ZА-Я][a-zа-я0-9]{5,14}$/",$pass)) { // verifică dacă șirul introdus este diferit de expresia regulată
					$passErr = "The password must contain 6-14 letters and numbers, the first one must be a capital letter"; 
					$err_exist ++;
				}
				else {
					$passErr ="";
				}
			}
		} 
		if($err_exist == 0){
		session_start();
		require('connect.php');	
			$login=$_POST["login"];
			$password=$_POST["pass"];
		    $query = "SELECT user.*, rol.produs_acces, rol.user_acces, rol.roles_acces, rol.denumire_rol 
		    FROM user left join rol on user.id_rol =rol.id_rol WHERE username='$login' AND password='$pass' AND status=1";
			$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
			if($row=mysqli_fetch_array($result)) {      
          	$_SESSION['id_user'] = $row['id_user'];
			$_SESSION['id_rol'] = $row['id_rol'];
			$_SESSION['roluri_produs_acces'] = $row['produs_acces'];
			$_SESSION['roluri_users_acces'] = $row['user_acces'];
			$_SESSION['roluri_roles_acces'] = $row['roles_acces'];
			$_SESSION['denumire_rol'] = $row['denumire_rol'];
            header('Location: '.$cale.'admin.php');
        }
		    else{
		         header('Location: '.$cale); 
		    }
		}	
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Autentificare</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<style>
	.error {
		color:red; 
		font-size: 11px;
	}
</style>
<body>
	<div class="form">
		<p>SIGN IN</p>
		<form name="loginForm" id="loginForm" method="POST" onsubmit="return Verificare();"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table class="Tabel">
				<tr>
					<td><input type="text"   title="The username must contain 6-14 letters and numbers, the first one must be a capital letter" placeholder="Username" name="login" id="login" value="<?php echo $login;?>" /></td>
				</tr>
				<tr>
					<td><span id="err_login" class="error"><?php echo $logErr;?></span></td>
				</tr>
				<tr>
					<td><input type="password"  title="The password must contain 6-14 letters and numbers, the first one must be a capital letter"placeholder="Password" name="pass" id="pass" value="<?php echo $pass;?>" /></td>
				</tr>
				<tr>
					<td><span id="err_pass" class="error"><?php echo $passErr;?></span></td>
				</tr>
				<tr>
					<td><input type="submit" value="LOG IN" id="acces" name="Acces" /></td>
				</tr>
				<tr>
					<td><span id="err_pass" class="error"><?php echo $submitErr;?></span></td>
				</tr>

			</table>
			
		</form>
	</div>
	<script>
	function Verificare(){
		var necaz=0;
		document.getElementById("err_login").innerHTML ="";
		document.getElementById("err_pass").innerHTML ="";
		username = document.getElementById("login").value;
		password = document.getElementById("pass").value;
		numeSablon = /^[A-ZА-Я][a-zа-я0-9]{5,14}$/;
		if (!(username.match(numeSablon))) {		
			document.getElementById("err_login").innerHTML = "The username must contain 6-14 letters and numbers, the first one must be a capital letter";
			necaz++; 	
		}
		if (!(password.match(numeSablon))) {		
			document.getElementById("err_pass").innerHTML = "The password must contain 6-14 letters and numbers, the first one must be a capital letter";
			necaz++; 	
		}
			if(username=="" ){
			document.getElementById("err_login").innerHTML = "Input the username";
			necaz++; 
		}
		if(password==""){
			document.getElementById("err_pass").innerHTML = "Input the password";
			necaz++; 
		}
		return (necaz==0);
	}// 
	</script>
</body>
</html>




