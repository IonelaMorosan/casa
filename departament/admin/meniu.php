<?php
session_start();
require 'config.php';
	if(!$_SESSION['user']) { 
		header('Location: http://'.$_SERVER['SERVER_NAME'].$cale);
	}
require_once 'connection.php';
$action = "".$_REQUEST["_formName"];
switch ($action) {
	case "AdaugareCont"://verificarea adaugarii unui nou cont de administrare
	$login = $password = "";
	$err_login = $err_pass = "";
	if (!empty($_GET["login"])) {
		$login = $_GET["login"];
	} else {$err_login="Completeaza campul!";}
	if (!empty($_GET["password"])) {
		$password = md5($_GET['password']);
	} else {$err_pass="Completeaza campul!";}
	if(!($err_login.$err_pass=="")){
		$info = "S-a produs o eroare la completare!";
	}else{
		if(!mysqli_query($conn, "INSERT INTO user (login, password) VALUES ('$login', '$password')")) {
			echo "Eroare inserare date cont!";
		} else {
			mysqli_close($conn);
			header('Location: http://'.$_SERVER['SERVER_NAME'].$cale.'meniu.php?info=Contul a fost creat!');
		}	
	}
	break;
	
	case "upDateSectorDone": // Salvarea noilor date modificate
		$id_sector = "".$_POST["id_sector"]; 
		$denumire_sector = "".$_POST["denumire_sector"]; 
		$descriere_sector = "".$_POST["descriere_sector"];
		$curent_dir = "../image/";
		$curent_file = $curent_dir . basename($_FILES["fisier_incarcat"]["name"]);	
		$err_exist = 1;
		$err_file = "";
		$info = "";
		$alege_poza = 0;
		if ($curent_file != $curent_dir) 
		{
			$tip_fisier = pathinfo($curent_file,PATHINFO_EXTENSION);
			$alege_poza = 1;
		} else {
			$alege_poza = 0;
		}
		//prelucrez erorile
		if($err_exist == 0){
		//$action = "upDateSector";
		}else {
		if ($alege_poza == 1){
			move_uploaded_file($_FILES['fisier_incarcat']['tmp_name'], $curent_file);
			$url_poza_sector = substr($curent_file, 3);
			$sqlQwer = mysqli_query($conn, "Update sector set denumire_sector='$denumire_sector', descriere_sector='$descriere_sector', url_poza_sector ='$url_poza_sector' where id_sector = $id_sector");
		}
		if ($alege_poza == 0){
			$sqlQwer = mysqli_query($conn, "Update sector set denumire_sector='$denumire_sector', descriere_sector='$descriere_sector' where id_sector = $id_sector");
		}
		if(! $sqlQwer ) { die("Au aparut probleme la modificarea bazei de date: " . mysqli_connect_error());
		} else {
			mysqli_close($conn);
			header('Location: http://'.$_SERVER['SERVER_NAME'].$cale.'meniu.php?info=Datele sectorului au fost modificate!');
		}
	}
	break;
	
	case "upDateAngajatDone": // Salvarea noilor date modificate despre angajat
		$id_angajat = "".$_POST["id_angajat"]; 
		$nume_angajat = "".$_POST["nume_angajat"]; 
		$prenume_angajat = "".$_POST["prenume_angajat"];
		$functia = "".$_POST["functia"];
		$nr_telefon = "".$_POST["nr_telefon"];
		$email = "".$_POST["email"];
		$curent_dir = "../image/angajati/";
		$curent_file = $curent_dir . basename($_FILES["fisier_incarcat"]["name"]);	
		//$err_exist = 1;
		$err_file = "";
		$info = "";
		$alege_poza = 0;
		if ($curent_file != $curent_dir) 
		{
			$tip_fisier = pathinfo($curent_file,PATHINFO_EXTENSION);
			$alege_poza = 1;
		} else {
			$alege_poza = 0;
		}
		//prelucrez erorile
		//if($err_exist == 0){
		//}else {
		if ($alege_poza == 1){
			move_uploaded_file($_FILES['fisier_incarcat']['tmp_name'], $curent_file);
			$url_poza_angajat = substr($curent_file, 3);
			$sqlQwer = mysqli_query($conn, "Update angajat set nume_angajat='$nume_angajat', prenume_angajat='$prenume_angajat', functia='$functia', nr_telefon='$nr_telefon', email='$email', url_poza_angajat ='$url_poza_angajat' where id_angajat = $id_angajat");
		}
		if ($alege_poza == 0){
			$sqlQwer = mysqli_query($conn, "Update angajat set nume_angajat='$nume_angajat', prenume_angajat='$prenume_angajat', functia='$functia', nr_telefon='$nr_telefon', email='$email' where id_angajat = $id_angajat");
		}
		if(! $sqlQwer ) { die("Au aparut probleme la modificarea bazei de date: " . mysqli_connect_error());
		} else {
			mysqli_close($conn);
			header('Location: http://'.$_SERVER['SERVER_NAME'].$cale.'meniu.php?info=Datele despre realizator au fost modificate!');
		}
	//}
	break;
	
	case "AdaugareSector": //verificarea adaugarii unui nou sector
	$denumire_sector = $descriere_sector = $url_sector = "";
	$err_denumire_sector = $err_descriere = "";
	if (!empty($_POST["denumire_sector"])) {
		$denumire_sector = $_POST["denumire_sector"];
	} else {$err_denumire="Completeaza campul!";}
	if (!empty($_POST["descriere_sector"])) {
		$descriere_sector = $_POST['descriere_sector'];
	} else {$err_descriere="Completeaza campul!";}
		
	//verificam fisierul introdus
	//specificam mapa in care vom salva fisierele 
	
	$curent_dir = "../image/";
	//functia basename returneaza ultima componenta din calea specificata
	$curent_file = $curent_dir . basename($_FILES["fisier_incarcat"]["name"]);	

	$err_exist = 1;
	$err_file = "";
	$info = "";
	//verific daca a fost specificat fisierul de utilizator
	//daca a fost specificat inseamna ca numele mapei va fi diferit de numeMapa.numeFisier
	if ($curent_file != $curent_dir) 
	{
		//verifica existenta fisierului cu calea specificata
		if (file_exists($curent_file)) {
			$err_file .= "<span class='err'>Fisierul exista deja!</span><br />";
			$err_exist = 0;
		}
		//superglobala $_FILES  este folosita pentru a prelua fisierele incarcate pe client prin controlul corespunzator
		//verific ca fisierul sa nu fie prea mare
		if ($_FILES["fisier_incarcat"]["size"] > 50000000) {
			$err_file .= "<span class='err'>Fisierul incarcat este prea voluminos!</span><br />";
			$err_exist = 0;
		}
		//returneaza detalii referitoare la calea specificata spre un anumit fisier
		$tip_fisier = pathinfo($curent_file,PATHINFO_EXTENSION);
		if($tip_fisier != "jpg" && $tip_fisier != "jpeg" && $tip_fisier != "png" && $tip_fisier != "gif") {
			$err_file .= "<span class='err'>Trebuie sa incarcati o imagine!!!</span><br />";
			$err_exist = 0;
		}
	} else {
		$err_file .= "<span class='err'>Ati uitat sa incarcati fisierul!</span><br />";
		$err_exist = 0;
	}
		//prelucrez erorile
	if(($err_exist == 0)or($err_denumire.$err_descriere !== "")){
		$info .= '<span class="err">Inregistrare nereusita - a aparut o eroare</span><br />';
	}else {
		move_uploaded_file($_FILES['fisier_incarcat']['tmp_name'], $curent_file);
		$url_sector = substr($curent_file, 3);
		if(!mysqli_query($conn, "INSERT INTO sector (denumire_sector, descriere_sector, url_poza_sector) VALUES ('$denumire_sector', '$descriere_sector', '$url_sector')")) {
			echo "Eroare inserare date sector!";
		} else {
			mysqli_close($conn);
			header('Location: http://'.$_SERVER['SERVER_NAME'].$cale.'meniu.php?info=Sectorul a fost creat!');
		}	
	}
	break;
	
	case "AdaugareDateAngajat": //verificarea adaugarii datelor despre un nou colaborator
	$nume_angajat = $prenume_angajat = $functia = $nr_telefon = $email = "";
	$err_nume_angajat = $err_prenume_angajat = $err_functia = $err_nr_telefon = $err_email = "";
	if (!empty($_POST["nume_angajat"])) {
		$nume_angajat = $_POST["nume_angajat"];
	} else {$err_nume_angajat="Completeaza campul!";}
	if (!empty($_POST["prenume_angajat"])) {
		$prenume_angajat = $_POST["prenume_angajat"];
	} else {$err_prenume_angajat = "Completeaza campul!";}
	if (!empty($_POST["functia"])) {
		$functia = $_POST["functia"];
	} else {$err_functia="Completeaza campul!";}
	if (!empty($_POST["nr_telefon"])) {
		$nr_telefon = $_POST["nr_telefon"];
	} else {$err_nr_telefon="Completeaza campul!";}
	if (!empty($_POST["email"])) {
		$email = $_POST["email"];
	} else {$err_email="Completeaza campul!";}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$err_email = "Adresa de e-mail nevalida!";
	}
	//verificam fisierul introdus
	$curent_dir = "../image/angajati/";
	$curent_file = $curent_dir . basename($_FILES["fisier_incarcat"]["name"]);	
	$err_exist = 1;
	$err_file = "";
	$info = "";
	if ($curent_file != $curent_dir) 
	{
		if (file_exists($curent_file)) {
			$err_file .= "<span class='err'>Fisierul exista deja!</span><br />";
			$err_exist = 0;
		}
		if ($_FILES["fisier_incarcat"]["size"] > 50000000) {
			$err_file .= "<span class='err'>Fisierul incarcat este prea voluminos!</span><br />";
			$err_exist = 0;
		}
		$tip_fisier = pathinfo($curent_file,PATHINFO_EXTENSION);
		if($tip_fisier != "jpg" && $tip_fisier != "jpeg" && $tip_fisier != "png" && $tip_fisier != "gif") {
			$err_file .= "<span class='err'>Trebuie sa incarcati o imagine!!!</span><br />";
			$err_exist = 0;
		}
	} else {
		$err_file .= "<span class='err'>Ati uitat sa incarcati fisierul!</span><br />";
		$err_exist = 0;
	}
	if(($err_exist == 0)or($err_nume_angajat.$err_prenume_angajat.$err_functia.$err_nr_telefon.$err_email !== "")){
		$info .= '<span class="err">Inregistrare nereusita - a aparut o eroare!</span><br />';
	}else {
		move_uploaded_file($_FILES['fisier_incarcat']['tmp_name'], $curent_file);
		$url_poza_angajat = substr($curent_file, 3);
		if(!mysqli_query($conn, "INSERT INTO angajat (nume_angajat, prenume_angajat, functia, nr_telefon, email, url_poza_angajat, id_sector) VALUES ('$nume_angajat', '$prenume_angajat', '$functia', '$nr_telefon', '$email', '$url_poza_angajat', '$_POST[id_sector]')")) {
			echo "Eroare inserare date angajat!";
		} else {
			mysqli_close($conn);
			header('Location: http://'.$_SERVER['SERVER_NAME'].$cale.'meniu.php?info=Datele despre realizator au fost adaugate!');
		}	
	}
	break;
	case "TransmiteInfo": //verificarea transmiterii informatiilor
	if (isset($_GET['email']) and isset($_GET['comments'])) {
		require('connection.php');
		$to = '';
		$sqlQwer=mysqli_query($conn, "SELECT * FROM abonare");
		while($rows=mysqli_fetch_array($sqlQwer)){
			$to .= $rows['email_abonat'] . ','; 
		}
		mysqli_close($conn);
		$subject = 'Informatii noi de la emisiunea "Buna dimineata"';
		$message = 'Departamentul XXX va informeaza...' . "\r\n\r\n";
		$message .= $_GET['comments'];
		$headers = 'Content-Type: text/plain; charset=utf-8';

		$success = mail($to, $subject, $message, $headers);
		header('Location: http://'.$_SERVER['SERVER_NAME'].$cale.'meniu.php?info=Datele au fost transmise!');
	} else {
		$info = "S-a produs o eroare la completare!";
	}
	break;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="author" content="exemplu" />
	<title>Departament comenzi, panou administrare</title>
	<link rel="shortcut icon" href="../image/flower.png"> 
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/stiluri.css">
</head>
<body>
<?
	if ($_GET['info'] != "") {
		echo '<div class="w3-panel w3-blue w3-round"><span onclick="ascunde(this);" class="w3-closebtn">&times;</span><h4>Informatie!</h4><p>Operatiunea a avut loc cu succes!</p></div>';
	}
?>
<div class="w3-container w3-sand corp w3-padding-16">
	<header class="w3-container w3-sand">
		<h1  id="sus" class="w3-container w3-card-16 w3-padding-8 w3-green w3-xxxlarge w3-text-white w3-opacity">Selecteaza o optiune de mai jos...</h1>
		<div class="w3-container w3-xlarge w3-padding-8 w3-right w3-text-green w3-card-16 w3-yellow w3-hover-green">
		<a href="delogare.php">Iesire</a>
		</div>
	</header>
<!--Adauga un cont nou-->
	<div class="w3-container w3-border">
		<a href="#veziDaNu1Content" id="veziDaNu1" 
			onclick="veziDaNuClick('veziDaNu1', 'Adauga un nou cont', 'Inchide formularul pentru adaugare cont');" class="w3-xlarge w3-text-green w3-hover-text-orange">Adauga un nou cont</a>
		<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="get" id="veziDaNu1Content" <?php if ($action!="AdaugareCont") echo 'style="display: none;"'; ?>>
			<input type="hidden" value="AdaugareCont" name="_formName">
			<label>Loghin<input type="text" pattern="[a-z0-9]{4,30}" title="Introdu cel putin 4 litere sau cifre si cel mult 30!" maxlength="30" class="linie" name="login" /></label><span class="err"><? echo $err_login; ?></span><br />
			<label>Parola&nbsp;<input type="password" pattern="[a-z0-9]{4,15}" title="Introdu cel cutin 4 litere sau cifre si cel mult 15!" maxlength="15" class="linie" name="password" /></label><span class="err"><? echo $err_pass; ?></span><br />
			<input type="submit" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-cyan w3-padding-16 w3-text-white w3-hover-border-green" value="Salveaza" />
			<? echo '<p class="err">'.$info.'</p>'; ?>
		</form>
	</div>	
<!--Adauga sector-->
	<div class="w3-container w3-border">
		<a href="#veziDaNu2Content" id="veziDaNu2" 
			onclick="veziDaNuClick('veziDaNu2', 'Adauga un nou sector', 'Inchide formularul pentru adaugare sector');" class="w3-xlarge w3-text-green w3-hover-text-orange">Adauga un nou sector</a>
		<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data" id="veziDaNu2Content" <?php if ($action!="AdaugareSector") echo 'style="display: none;"'; ?>>
			<input type="hidden" value="AdaugareSector" name="_formName">
			<label>Denumire sector&nbsp;<input type="text" pattern="[ A-Za-z]{4,30}" title="Introdu de la 4 la 30 litere!" placeholder="Introdu de la 4 la 30 litere" maxlength="30" class="linie" size="30" name="denumire_sector" value="<? echo $denumire_sector; ?>" /></label><span class="err"><? echo $err_denumire; ?></span><br />
			<label>Descriere sector&nbsp;<textarea cols="100" rows="3" pattern="[ \. \,\:A-Za-z0-9]{4,5000}" title="Introdu cel putin 4 litere, cifre, spatiu si semne de punctuatie!" placeholder="Introdu cel putin 4 litere, cifre, spatiu si semne de punctuatie!" class="linie" name="descriere_sector" /><? echo $descriere_sector; ?></textarea></label><span class="err"><? echo $err_descriere; ?></span><br />
			<label>Introdu fisierul cu imaginea sectorului&nbsp;<input type="file" name="fisier_incarcat" title="Fisierul trebuie sa fie de tip imagine, cu extensia jpg sau png sau gif!" class="linie" /></label><span class="error"><?php echo $err_file;?></span><br />
			<p style="font-size: 10px;">Fisierul trebuie sa fie de tip imagine, cu extensia jpg sau png sau gif!</p>
			<input type="submit" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-green w3-padding-16 w3-text-white w3-hover-border-green" value="Salveaza" />
			<? echo '<p class="err">'.$info.'</p>'; ?>
		</form>
	</div>
<!--modifica date sectoare-->
	<? if ($action!= "upDateSector"){ ?>
	<div class="w3-container w3-border">
	<a href="#veziDaNu3Content" id="veziDaNu3" 
		onclick="veziDaNuClick('veziDaNu3', 'Modifica date sector existenta', 'Inchide formularul pentru modificare');" class="w3-xlarge w3-text-green w3-hover-text-orange">Modifica date sector existent</a>
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="get" id="veziDaNu3Content" <?php if ($action!="upDateSector") echo 'style="display: none;"'; ?>>
	<fieldset>
	<legend>Modifica date sector existent</legend>
	<input type="hidden" value="upDateSector" name="_formName" />
	<select name="id_sector" class="w3-container w3-border w3-text-white w3-card-8 w3-green">
		<?php
			require('connection.php');
			$sqlQwer=mysqli_query($conn, "SELECT * FROM sector");
			while($rows=mysqli_fetch_array($sqlQwer)){
		?>
			<option value="<? echo $rows['id_sector']; ?>" ><? echo $rows['denumire_sector']; ?></option>
		<? } 
			mysqli_close($conn);
		?>
	</select>
	<input type="submit" value="Modifica date" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-text-white w3-green w3-padding-16" />
	</fieldset>
	</form>	
	</div>
	<? }
	if ($action== "upDateSector"){
		require('connection.php');
		$id_sector = "".$_GET["id_sector"]; 
		$sqlQwer = mysqli_query($conn, "SELECT * FROM sector where id_sector = $id_sector");
		$rows=mysqli_fetch_array($sqlQwer);
	?>
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
	<fieldset>
	<legend>Modifica date sector</legend>
		<input type="hidden" name="_formName" value="upDateSectorDone">
		<input type="hidden" name="id_sector" value="<? echo $id_sector; ?>">
		<label>Denumire sector:<input name="denumire_sector" type="text" class="linie" value="<? echo $rows['denumire_sector']; ?>" /></label><br />
		<label>Descriere sector:<textarea name="descriere_sector" class="linie" cols="75" rows="3"><? echo $rows['descriere_sector']; ?></textarea></label><br />
		<label>Imaginea veche:<img src="<? echo '../' . $rows['url_poza_sector']; ?>" width="100" height="50" /></label><br />
		<label>Daca doriti schimbarea imaginii sectorului - introduceti una noua&nbsp;<input type="file" name="fisier_incarcat" title="Fisierul trebuie sa fie de tip imagine, cu extensia jpg sau png sau gif!" class="linie" /></label><span class="err"><?php echo $err_file;?></span><br />
		<p style="font-size: 10px;">Fisierul trebuie sa fie de tip imagine, cu extensia jpg sau png sau gif!</p>
		<input type="submit" value="Modifica date" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-text-white w3-green w3-padding-16" />
	</fieldset>
	</form>
	<?
	mysqli_close($conn);
	}
	?>
<!--Adauga date angajat-->
	<div class="w3-container w3-border">
		<a href="#veziDaNu4Content" id="veziDaNu4" onclick="veziDaNuClick('veziDaNu4', 'Adauga date angajat', 'Inchide formularul pentru adaugare date angajat');" class="w3-xlarge w3-text-green w3-hover-text-orange">Adauga date referitoare la un nou angajat</a>
		<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data" id="veziDaNu4Content" <?php if ($action!="AdaugareDateAngajat") echo 'style="display: none;"'; ?>>
			<input type="hidden" value="AdaugareDateAngajat" name="_formName">
			<label>Nume angajat&nbsp;<input type="text" pattern="[ \-A-Za-z]{4,30}" title="Introdu de la 4 la 30 litere!" placeholder="Introdu de la 4 la 30 litere" maxlength="30" class="linie" size="30" name="nume_angajat" value="<? echo $nume_angajat; ?>" /></label><span class="err"><? echo $err_nume_angajat; ?></span><br />
			<label>Prenume angajat&nbsp;<input type="text" pattern="[ \-A-Za-z]{4,30}" title="Introdu de la 4 la 30 litere!" placeholder="Introdu de la 4 la 30 litere" maxlength="30" class="linie" size="30" name="prenume_angajat" value="<? echo $prenume_angajat; ?>" /></label><span class="err"><? echo $err_prenume_angajat; ?></span><br />
			<label>Functie angajat&nbsp;<input type="text" pattern="[\- A-Za-z]{4,30}" title="Introdu de la 4 la 30 litere!" placeholder="Introdu de la 4 la 30 litere" maxlength="30" class="linie" size="30" name="functia" value="<? echo $functia; ?>" /></label><span class="err"><? echo $err_functia; ?></span><br />
			<label>Numar de telefon a angajatului&nbsp;<input type="text" pattern="[0-9]{6,15}" title="Introdu de la 6 la 15 cifre!" placeholder="Introdu de la 6 pana la 15 cifre" maxlength="15" class="linie" size="15" name="nr_telefon" value="<? echo $nr_telefon; ?>" /></label><span class="err"><? echo $err_nr_telefon; ?></span><br />
			<label>Email angajat&nbsp;<input type="email" title="Introdu o adresa de email valida!" placeholder="Introdu o adresa de email valida" maxlength="30" class="linie" size="30" name="email" value="<? echo $email; ?>" /></label><span class="err"><? echo $err_email; ?></span><br />
			<label>Introdu, selectand poza angajatului&nbsp;<input type="file" name="fisier_incarcat" title="Fisierul trebuie sa fie de tip imagine, cu extensia jpg sau png sau gif!" class="linie" /></label><span class="err"><?php echo $err_file;?></span><br />
			<p style="font-size: 10px;">Fisierul trebuie sa fie de tip imagine, cu extensia jpg sau png sau gif!</p>
			<label>Selectati sectorul in care activeaza angajatul 
			<select name="id_sector" class="w3-container w3-border w3-card-8 w3-green">
				<?php
					require('connection.php');
					$sqlQwer=mysqli_query($conn, "SELECT * FROM sector");
					while($rows=mysqli_fetch_array($sqlQwer)){
				?>
					<option value="<? echo $rows['id_sector']; ?>" ><? echo $rows['denumire_sector']; ?></option>
				<? }
				mysqli_close($conn);
				?>
			</select>
			</label></br>
			<input type="submit" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-green w3-padding-16 w3-text-white w3-hover-border-green" value="Salveaza" />
			<? echo '<p class="err">'.$info.'</p>'; ?>
		</form>
	</div>
	
	<!--Modifica date angajati-->
	<? if ($action!= "upDateAngajat"){ ?>
	<div class="w3-container w3-border">
	<a href="#veziDaNu5Content" id="veziDaNu5" 
		onclick="veziDaNuClick('veziDaNu5', 'Modifica date existente referitoare la angajati', 'Inchide formularul pentru modificare');" class="w3-xlarge w3-text-green w3-hover-text-orange">Modifica date existente referitoare la angajati</a>
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="get" id="veziDaNu5Content" <?php if ($action!="upDateAngajat") echo 'style="display: none;"'; ?>>
	<fieldset>
	<legend>Modifica date angajati</legend>
	<input type="hidden" value="upDateAngajat" name="_formName" />
	<select name="id_angajat" class="w3-container w3-border w3-text-white w3-card-8 w3-green">
		<?php
			require('connection.php');
			$sqlQwer=mysqli_query($conn, "SELECT * FROM angajat");
			while($rows=mysqli_fetch_array($sqlQwer)){
		?>
			<option value="<? echo $rows['id_angajat']; ?>" ><? echo $rows['nume_angajat'].' '.$rows['prenume_angajat']; ?></option>
		<? } 
			mysqli_close($conn);
		?>
	</select>
	<input type="submit" value="Modifica date" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-text-white w3-green w3-padding-16" />
	</fieldset>
	</form>	
	</div>
	<? }
	if ($action== "upDateAngajat"){
		require('connection.php');
		$id_angajat = "".$_GET["id_angajat"]; 
		$sqlQwer = mysqli_query($conn, "SELECT * FROM angajat where id_angajat = $id_angajat");
		$rows=mysqli_fetch_array($sqlQwer);
	?>
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
	<fieldset>
	<legend>Modifica date angajat</legend>
		<input type="hidden" name="_formName" value="upDateAngajatDone">
		<input type="hidden" name="id_angajat" value="<? echo $id_angajat; ?>">
		<label>Nume angajat&nbsp;<input type="text" pattern="[ \-A-Za-z]{4,30}" title="Introdu de la 4 la 30 litere!" maxlength="30" class="linie" size="30" name="nume_angajat" value="<? echo $rows['nume_angajat']; ?>" /></label><br />
		<label>Prenume angajat&nbsp;<input type="text" pattern="[ \-A-Za-z]{4,30}" title="Introdu de la 4 la 30 litere!" maxlength="30" class="linie" size="30" name="prenume_angajat" value="<? echo $rows['prenume_angajat']; ?>" /></label><br />
		<label>Functie angajat&nbsp;<input type="text" pattern="[\- A-Za-z]{4,30}" title="Introdu de la 4 la 30 litere!" maxlength="30" class="linie" size="30" name="functia" value="<? echo $rows['functia']; ?>" /></label><br />
		<label>Numar de telefon a angajatului&nbsp;<input type="text" pattern="[0-9]{6,15}" title="Introdu de la 6 la 15 cifre!" maxlength="15" class="linie" size="15" name="nr_telefon" value="<? echo $rows['nr_telefon']; ?>" /></label><br />
		<label>Email angajat&nbsp;<input type="email" title="Introdu o adresa de email valida!" maxlength="30" class="linie" size="30" name="email" value="<? echo $rows['email']; ?>" /></label><br />
		<label>Poza veche a angajatului:<img src="<? echo '../' . $rows['url_poza_angajat']; ?>" width="50" height="80" /></label><br />
		<label>Daca doriti sa schimbati poza angajatului - selectati alta&nbsp;<input type="file" name="fisier_incarcat" title="Fisierul trebuie sa fie de tip imagine, cu extensia jpg sau png sau gif!" class="linie" /></label><br />
		<p style="font-size: 10px;">Fisierul trebuie sa fie de tip imagine, cu denumirea <i>NumePrenume</i> si cu extensia jpg sau png sau gif!</p>
		<label>Modificati sector la care activeaza angajatul 
			<select name="id_sector" class="w3-container w3-border w3-card-8 w3-green">
				<?php
					require('connection.php');
					$sqlQwer=mysqli_query($conn, "SELECT * FROM sector");
					while($rows=mysqli_fetch_array($sqlQwer)){
				?>
					<option value="<? echo $rows['id_sector']; ?>" ><? echo $rows['denumire_sector']; ?></option>
				<? }
				?>
			</select>
		</label></br>
		<input type="submit" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-green w3-padding-16 w3-text-white w3-hover-border-green" value="Modifica date" />
		<? echo '<p class="err">'.$info.'</p>'; ?>
		</form>
	<?
	mysqli_close($conn);
	}
	?>
	
	<!--Transmite informatii celor abonati-->
	<div class="w3-container w3-border">
		<a href="#veziDaNu6Content" id="veziDaNu6" onclick="veziDaNuClick('veziDaNu6', 'Transmite informatii abonatilor', 'Inchide formularul pentru transmiterea informatiilor');" class="w3-xlarge w3-text-green w3-hover-text-orange">Transmite informatii persoanelor abonate</a>
		<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="get" id="veziDaNu6Content" <?php if ($action!="TransmiteInfo") echo 'style="display: none;"'; ?>>
			<input type="hidden" value="TransmiteInfo" name="_formName">
			<label>E-mail-ul dvoastra/departament:
			<input type="email" name="email" size="40" class="linie" /></label><br />
			<br />
			<label>Scrie textul mesajului in spatiul de mai jos:<br />
			<textarea name="comments" rows="4" cols="70" class="linie" placeholder="Textul informatiei"></textarea></label><br />
			<input type="submit" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-green w3-padding-16 w3-text-white w3-hover-border-green" value="Transmite informatia" />
		<? echo '<p class="err">'.$info.'</p>'; ?>
		</form>
	</div>
	
	<!--Gestioneaza informatiile primite-->
	<div class="w3-container w3-border">
		<a href="gestionare_mesaje.php" class="w3-xlarge w3-text-green w3-hover-text-orange">Gestioneaza mesajele vizitatorilor</a>
	</div>
</div>

<script>
function veziDaNuClick(idButton, textNone, textBlock){
	var idContent = idButton + "Content";
	if(document.getElementById(idContent).style.display=="block")
	{ 
	document.getElementById(idContent).style.display = 'none';
	document.getElementById(idButton).innerHTML = textNone;
	}else
	{
	document.getElementById(idContent).style.display = 'block';
	document.getElementById(idButton).innerHTML = textBlock;
	}
}
function ascunde(btn) 
	{btn.parentElement.style.display='none';}
</script>
</body>
</html>