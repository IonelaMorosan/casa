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

	$denumireErr = $descriereErr = $pretErr= $pozaErr =$accesErr =  $denumire = $descriere = $pret = $poza  = $submitErr = $account = "";
    $err_exist = 0;
    $id = $_GET['id_produs']; 
	$cale = 'http://localhost/saw/lab5/';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_REQUEST['Acces'])) {
			if (empty($_POST["denumire"])) { //verifică dacă username-ul a fost introdus
				$denumireErr = "Introdu denumirea";
				$err_exist ++;
			}
			else{
				$denumire = validare($_POST["denumire"]);
				if (!preg_match("/^[A-ZА-Я][a-zа-я]{5,30}$/",$denumire)) { // verifică dacă șirul introdus este diferit de expresia regulată
					$denumireErr = "Denumirea contine 5-30 litere, prima trebuie sa fie majuscula"; 
					$err_exist ++;
				}
				else {
					$denumireErr ="";
				}
			}
			if (empty($_POST["descriere"])) { //verifică daca password-ul a fost introdus
				$descriereErr = "Introdu descrierea";
				$err_exist ++;
			} 
			else {
				$descriere = validare($_POST["descriere"]);
				if (!preg_match("/^[A-ZА-Я][a-zа-я ]{5,300}$/",$descriere)) { // verifică dacă șirul introdus este diferit de expresia regulată
					$descriereErr = "Descrierea contine 5-300 caractere, prima litera majuscula"; 
					$err_exist ++;
				}
				else {
					$descriereErr ="";
				}
			}
			if (empty($_POST["pret"])) { //verifică daca password-ul a fost introdus
				$pretErr = "Introdu descrierea";
				$err_exist ++;
			} 
			else {
				$pret = validare($_POST["pret"]);
				if (!preg_match("/^[0-9]+.?[0-9]{2,5}?$/",$pret)) { // verifică dacă șirul introdus este diferit de expresia regulată
					$pretErr = "Pretul contine maximum 4 cifre"; 
					$err_exist ++;
				}
				else {
					$pretErr ="";
				}
			}
			if (empty($_POST["poza"])) { //verifică daca password-ul a fost introdus
				$pozaErr = "Introdu calea spre poza";
				$err_exist ++;
			} 
			else {
				$poza = validare($_POST["poza"]);
				if (!preg_match("/^[a-z0-9 \/.:]{5,50}$/",$poza)) { // verifică dacă șirul introdus este diferit de expresia regulată
					$pretErr = "Calea contine maximum 50 simboluri"; 
					$err_exist ++;
				}
				else {
					$pretErr ="";
				}
			}
		} 
		if($err_exist == 0){
        require('../connect.php');
        //$id_p=$_POST["id_produs"];
			$denumire=$_POST["denumire"];
			$descriere=$_POST["descriere"];
			$pret=$_POST["pret"];
			$poza=$_POST["poza"];
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			try
			{$id = $_GET['id']; 
				$query = "UPDATE `produse` SET `denumire`='$denumire',`descriere`='$descriere',`pret`='$pret',`poza`='$poza' WHERE id_produs='$id';";
							$result = mysqli_query($connect, $query);
			}
			catch (Exception $e)
			{
			    $data_ora =	error_log($e->getMessage()."\t".date("d/m/y H:i:s")."\t".$_SERVER['PHP_SELF']."\r\n", 3, "d:/USM/htdocs/logguri/protocol_erori.txt");
				header('Location: http://'.$_SERVER['SERVER_NAME'].'/saw/lab5/'.'start.html');
			}
			$submitErr="Product was succesuful added";
        }
		    else{
		         $submitErr="Process failed";
		    }
			
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../style_1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<?php
     
    require('../connect.php');	
    $id = $_GET['id_produs'];
    $query = "SELECT id_produs, denumire, descriere, pret, poza FROM produse WHERE  id_produs = '$id'";
    $sqlQwer = mysqli_query($connect, $query);
    if ($sqlQwer) {
        while($rows=mysqli_fetch_array($sqlQwer)){
            ?>


		<div class="panou">
    <h2>Activitate placuta, <?php echo $_SESSION['denumire_rol']; ?>ule!</h2>
</div>
<button class="accordion"><a href="../admin.php">Inapoi</a></button>
<div class="panel"></div>
  <!---<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
--><div class="form">
		<p>Edit product</p>
		<form name="add_product" id="add_product" method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table class="Table">
				<tr>
					<td><input type="text"   title="The text must contain maximum 30 letters, the first one must be a capital letter" plaseholder="<?php $rows['denumire'];?>" name="denumire" id="denumire" value="<?php echo $rows['denumire'];?>" /></td>
				</tr>
				<tr>
					<td><span id="err_denumire" class="error"><?php echo $denumireErr;?></span></td>
				</tr>
				<tr>
					<td><input type="text"  title="The describtion must contain max 300 letters, the first one must be a capital letter"  name="descriere" id="descriere" value="<?php echo $rows['descriere'];?>" /></td>
				</tr>
				<tr>
					<td><span id="err_descriere" class="error"><?php echo $descriereErr;?></span></td>
				</tr>
                <tr>
					<td><input type="text"   title="The price must contain max 4 positive numbers"  name="pret" id="pret" value="<?php echo $rows['pret'];?>" /></td>
				</tr>
				<tr>
					<td><span id="err_pret" class="error"><?php echo $pretErr;?></span></td>
				</tr>
				<tr>
					<td><input type="text"  title="The path must contain max 50 letters, numbers, slash and point"  name="poza" id="poza" value="<?php echo $rows['poza'];?>" /></td>
				</tr>
				<tr>
					<td><span id="err_poza" class="error"><?php echo $pozaErr;?></span></td>
				</tr>
				<tr>
					<td><input type="submit" value="Update" id="acces" name="Acces" /></td>
				</tr>
				<tr>
					<td><span id="accesErr" class="error"><?php echo $submitErr;?></span></td>
				</tr>

			</table>
			
		</form>
	</div>
        <?php }}?>

</body>
</html>