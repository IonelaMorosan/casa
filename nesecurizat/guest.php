<?php 
	$numeErr = $prenumeErr = $emailErr =$comentErr = $dataErr = "";
	$nume = $prenume = $email = $coment = $data= "";

	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["nume"])) {
			$numeErr = "Completeaza acest camp!";
		} else {
			$nume = $_POST["nume"];
		}
		if (empty($_POST["prenume"])) {
			$prenumeErr = "Completeaza acest camp!";
		} else {
			$prenume = $_POST["prenume"];
			}	
		if (empty($_POST["e_mail"])) {
			$emailErr = "Completeaza acest camp!";
		} else {
			$email = $_POST["e_mail"];
		}
		if (empty($_POST["coment"])) {
			$comentErr = "Completeaza acest camp!";
		} else {
			$coment = $_POST["coment"];	
		}	
	}

	//adaugare mesaj
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($numeErr.$prenumeErr.$emailErr.$comentErr == ""){
			require_once('connection.php');
			//variabila conectare $conn
			$data = date("y-m-d h:i:s");
			$adaugare = "INSERT INTO oaspete (nume, prenume, e_mail, comentariu, data_ora) VALUES('$nume','$prenume', '$email', '$coment','$data')";
			mysqli_query($conn, $adaugare);
			mysqli_close($conn);
			header('Location: http://'.$_SERVER['SERVER_NAME'].'\nesecurizat\guest.php');
			$cookie_name="user";
			$cookie_value="NP";
			setcookie($cookie_name, $cookie_value, time()+(86400*30),"/");
			$nume = $prenume = $email = $coment = $data = "";
		}	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="author" content="Natalia Plesca" />
	<meta name="description" content="Comanda acum gogosi. Livrare imediata" />
	<meta name="keywords" content="Gogosi, livrare, imediat, " /> 
	<title>Gogosi la comanda, pareri</title>
	<link rel="shortcut icon" href="img/ico.png"> 
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/stiluri.css">
</head>
<body>
	<div class="w3-container w3-sand corp">
	<header class="w3-container w3-sand" style="clear: both;">
		<h1  id="sus" class="w3-xxxlarge afisare w3-text-pink w3-opacity">Părerea ta contează!</h1>
	</header>
	<section class="w3-container w3-text-dark-grey w3-sand">
	<div class="date_form_guest w3-container w3-border w3-round-xlarge w3-card-8 w3-hover-border-purple">
		<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<label for="nume">Numele dvoastra:</label>
            <input type="text" name="nume" class="linie" value="<?php echo $nume;?>" /><span class="err">* <?php echo $numeErr;?></span><br />
			<label for="prenume">Prenumele dvoastra:</label></td>
            <input type="text" name="prenume" class="linie" value="<?php echo $prenume;?>" /><span class="err">* <?php echo $prenumeErr;?></span><br />
            <label for="email">E-mail-ul dvoastra:</label>
            <input name="e_mail" type="email" class="linie" value="<?php echo $email;?>" /><span class="err">* <?php echo $emailErr;?></span><br />
            <label for="coment">Lasati in spatiul liber, de mai jos, parerea dvoastra</label><br />
            <textarea name="coment" id="coment" cols="40" rows="4" placeholder = "Scrieti aici..."><?php echo $coment;?></textarea><span class="err">* <?php echo $comentErr;?></span>
			
			<input type="submit" value="Transmite mesajul" name="submit" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-pink w3-hover-border-purple" />
		</form>
		<p><span class="err">* - campuri care trebuie completate</span></p>
	</div>
</section>
<section class="w3-container w3-text-dark-grey w3-sand">
<div class="date_form_guest w3-container w3-border w3-round-xlarge w3-card-8 w3-hover-border-purple">
	<h3 class="w3-xlarge afisare w3-text-pink w3-opacity">Ce spun altii despre noi si produsele noastre...</h3>
	<?php
	// extragere date din BD
	require 'connection.php';
	$extragere="SELECT * FROM oaspete";
	$result = mysqli_query($conn, $extragere);
	while($rows=mysqli_fetch_array($result)){
	?>
	<table class="w3-table w3-striped">
	<tr><td colspan="3" style="border-top: 2px dotted pink; border-bottom: 2px dotted pink; "></td></tr>
    <tr>
        <td>Prenumele:</td>
        <td><?php echo $rows['prenume']; ?></td>
	</tr>
	<tr>
        <td>Comentariu:</td>
        <td class="cell"><?php echo $rows['comentariu']; ?></td>
	</tr>
	<tr>
		<td>Data/Ora</td>
        <td><?php echo $rows['data_ora']; ?></td>   
	</tr>
	</table>
<?php
}
mysqli_close($conn);
?>
</div>
</section>
<footer class="w3-container w3-text-pink w3-opacity">
		<h3 class="w3-large afisare">GOGOASA, Departamentul livrare</h3>
</footer>
</div>
</body>
</html>