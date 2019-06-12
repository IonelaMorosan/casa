<?php 
session_start(); 
require('../log.php');	
$cale = 'http://localhost/saw/lab5/';
require '../connect.php';
if (!$_SESSION['id_user'])
{ 
    header('Location: '.$cale);
}             
if(!(($_SESSION['roluri_produs_acces']==2)or($_SESSION['roluri_produs_acces']==3)))
{

header('Location: '.$cale.'admin.php');
}
?>
<?php
	// "eliminam" simbolurile inutile
	function validare($data) {
		$data = trim($data);//eliminarea spațiilor albe
		$data = stripslashes($data);//elimina backslash-urile
		$data = htmlspecialchars($data);//convertește în entități HTML semnele < și >
		return $data;
	}

	$logErr = $passErr = $login = $pass  = $submitErr = $account = "";
	$err_exist = 0;
	$cale = 'http://localhost/saw/lab5/';
	
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
		require('../connect.php');	
			$login=$_POST["login"];
			$password=$_POST["pass"];
			//$h_pass=sha1($password);
			//$h_pass=md5($password);
			//$h_pass=hash('md5',$password);
			$h_pass=hash('sha256',$password);

			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			try
			{
				$query = "INSERT INTO `user` (`id_user`, `username`, `password`, `status`, `id_rol`) VALUES (NULL, '$login', '$h_pass', '1', '3')";
							$result = mysqli_query($connect, $query);
			}
			catch (Exception $e)
			{
			    $data_ora =	error_log($e->getMessage()."\t".date("d/m/y H:i:s")."\t".$_SERVER['PHP_SELF']."\r\n", 3, "d:protocol_erori.txt");
				header('Location: http://'.$_SERVER['SERVER_NAME'].'/saw/lab5/'.'start.html');
			}
			$submitErr="Your account was succesuful added";
        }
		    else{
		         $submitErr="Registration failed";
		    }
			
	}	
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
    margin-top: 10px;
    border-radius: 10px;
    border: 2px solid grey;
    text-align: center;
}
.accordion a{
    text-decoration: none;
    color: black;
}

.active, .accordion:hover {
    background-color: #ccc; 
}

.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}

</style>
</head>
<body>

		<div class="panou">
    <h2>Activitate placuta, <?php echo $_SESSION['denumire_rol']; ?>ule!</h2>
</div>
<button class="accordion"><a href="../admin.php">Inapoi</a></button>
<div class="panel"></div>
  <!---<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
--><div class="form">
		<p>SIGN UP</p>
		<form name="loginForm" id="loginForm" method="POST" onsubmit="return Verificare();"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table class="Table">
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
					<td><input type="submit" value="Create an account" id="acces" name="Acces" /></td>
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