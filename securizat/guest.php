<?php 
	$numeErr = $prenumeErr = $emailErr =$comentErr = $dataErr = "";
	$nume = $prenume = $email = $coment = $data= "";

	function verificare($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
	return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["nume"])) {
			$numeErr = "Completeaza acest camp!";
		} else {
			$nume = verificare($_POST["nume"]);
			if (!preg_match("/^[A-Z][a-z]{1,14}$/",$nume)) {
				$numeErr = "Introdu doar litere - prima mare si minim una mica!"; 
			}
		}
		if (empty($_POST["prenume"])) {
			$prenumeErr = "Completeaza acest camp!";
		} else {
			$prenume = verificare($_POST["prenume"]);
			if (!preg_match("/^[A-Z][a-z]{1,14}$/",$prenume)) {
				$prenumeErr = "Introdu doar litere - prima mare si minim una mica!"; 
			}
		}	
		if (empty($_POST["e_mail"])) {
			$emailErr = "Completeaza acest camp!";
		} else {
			$email = verificare($_POST["e_mail"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Adresa de e-mail nevalida!"; 
			}
		}
		if (empty($_POST["coment"])) {
			$comentErr = "Completeaza acest camp!";
		} else {
			$coment = verificare($_POST["coment"]);
			if (!preg_match("/^[-a-zA-Z0-9 \.\,\?\!\:]{1,1000}$/",$coment)) {
				$comentErr = "Campul contine doar litere, cifre, separatori!"; 
			}
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
			header('Location: http://'.$_SERVER['SERVER_NAME'].'\saw\lab3\securizat\guest.php');
			$nume = $prenume = $email = $coment = $data = "";
		}	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="author" content="Ionela Morosan" />
	<meta name="description" content="Alege acum mobila casei tale." />
	<meta name="keywords" content="Gogosi, livrare, imediat, " /> 
	<title>Mobila la comanda, pareri</title>
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
		<form name="form" method="post" onsubmit="return Verificare();"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<label for="nume">Numele dvoastra:</label>
            <input type="text" name="nume" class="linie" id="nume" 
            title="Introdu doar litere - prima mare si minim una mica!" value="<?php echo $nume;?>" />
            <span class="err" id="numeErr">* <?php echo $numeErr;?></span><br />
			<label for="prenume">Prenumele dvoastra:</label></td>
            <input type="text" name="prenume" class="linie" id="prenume"  
            title="Introdu doar litere - prima mare si minim una mica!"value="<?php echo $prenume;?>" />
            <span class="err" id="prenumeErr">* <?php echo $prenumeErr;?></span><br />
            <label for="email">E-mail-ul dvoastra:</label>
            <input name="e_mail" type="email" class="linie" id="email" 
            title="Introdu un email valid!"value="<?php echo $email;?>" />
            <span class="err" id="emailErr">* <?php echo $emailErr;?></span><br />
            <label for="coment">Lasati in spatiul liber, de mai jos, parerea dvoastra</label><br />
            <textarea name="coment" id="coment" cols="40" rows="4" 
            title="Campul contine doar litere, cifre, separatori!"placeholder = "Scrieti aici..."><?php echo $coment;?></textarea>
            <span class="err" id="comentErr">* <?php echo $comentErr;?></span>
			
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
	<script>
	function Verificare(){
		var necaz=0;
		document.getElementById("numeErr").innerHTML ="";
		document.getElementById("prenumeErr").innerHTML ="";
		document.getElementById("emailErr").innerHTML ="";
		document.getElementById("comentErr").innerHTML ="";
		nume = document.getElementById("nume").value;
		prenume = document.getElementById("prenume").value;
		email = document.getElementById("email").value;
		coment = document.getElementById("coment").value;
		numeSablon1 = /^[A-Z][a-z]{1,14}$/;
		numeSablon2 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		numeSablon3 = /^[-a-zA-Z0-9 \.\,\?\!\:]{1,1000}$/;
		if (!(nume.match(numeSablon1))) {		
			document.getElementById("numeErr").innerHTML = "Introdu doar litere - prima mare si minim una mica!";
			necaz++; 	
		}
		if (!(prenume.match(numeSablon1))) {		
			document.getElementById("prenumeErr").innerHTML = "Introdu doar litere - prima mare si minim una mica!";
			necaz++; 	
		}
			if(!(email.match(numeSablon2))){
			document.getElementById("emailErr").innerHTML = "Introdu adresa de email valida!";
			necaz++; 
		}
		if(!(coment.match(numeSablon3))){
			document.getElementById("comentErr").innerHTML = "Campul contine doar litere, cifre, separatori!";
			necaz++; 
		}
		return (necaz==0);
	}// 
	</script>
</body>
</html>