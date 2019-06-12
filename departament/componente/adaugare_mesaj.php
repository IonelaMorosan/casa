<?php 
	require 'componente/config.php';
	$numeErr = $prenumeErr = $emailErr =$comentErr = $dataErr = "";
	$nume = $prenume = $email = $coment = $data= "";

	function verificare($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
	return $data;
	}
	//verificare formular abonare
	$email_err = "";
	$e_mail = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["email"])) {
			$email_err = "Completeaza acest camp!";
		} else {
			$e_mail = verificare($_POST["email"]);
			if (!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {
				$email_err = "Adresa de e-mail nevalida!"; 
			}
		}
	//adaugare email in BD
		if ($email_err == ""){
			require('componente/connection.php');
			$data_ora = date("y-m-d h:i:s");
			$adaugare = "INSERT INTO abonare (email_abonat, data_ora) VALUES('$e_mail','$data_ora')";
			mysqli_query($conn, $adaugare);
			mysqli_close($conn);
			//$mess = 'Emailul a fost salvat cu succes...';
			header('Location: http://'.$_SERVER['SERVER_NAME'].$cale.'index.php?mess=ok');
		}
	}
	
	//verificare formular pareri
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
			require('componente/connection.php');
			//variabila conectare $conn
			$data = date("y-m-d h:i:s");
			$adaugare = "INSERT INTO oaspete (nume, prenume, e_mail, comentariu, data) VALUES('$nume','$prenume', '$email', '$coment','$data')";
			mysqli_query($conn, $adaugare);
			mysqli_close($conn);
			header('Location: http://'.$_SERVER['SERVER_NAME'].$cale.'index.php?mess=ok');
		}	
	}
?>