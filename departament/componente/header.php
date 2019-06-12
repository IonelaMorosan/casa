<!DOCTYPE html>
<html>
<title>Departamentul Comenzi</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="image/flower.png"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/stiluri.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-sidenav a {padding:20px}
.my {
	display:none;
}
</style>
<script>
	function ascunde(btn) 
	{btn.parentElement.style.display='none';}
</script>

<body>
<!-- Sidenav (hidden by default) -->
<nav class="w3-sidenav w3-card-2 w3-top w3-large w3-hover-green w3-hover-text-white w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidenav">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav">Minimizează meniul</a>
  <a href="#despre" onclick="w3_close()">Despre noi</a>
  <a href="#abonament" onclick="w3_close()">Aboneaza-te pentru a primi informatii noi</a>
  <a href="#rubrici" onclick="w3_close()">Sectoarele departamentului</a>
  <a href="#about" onclick="w3_close()">Lasă un comentariu despre produse sau deservire</a>
  <a href="#harta" onclick="w3_close()">Harta - locatia fizică a departamentului 'Comenzi'</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-xxlarge w3-padding-xlarge w3-green w3-text-white" style="max-width:1200px;margin:auto">
    <div class="w3-opennav w3-left w3-hover-text-cyan" onclick="w3_open()">☰</div>
    <div class="w3-center w3-xxxlarge w3-text-shadow" style="color: #fff; text-shadow: 1px 1px 6px #fff; text-transform: uppercase;">DEPARTAMENTUL COMENZI<br />FLOWERS</div>
  </div>
</div>
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content"  style="max-width:1200px;margin-top:175px">
<div class="w3-container viu"></div>
<?php
	if (($numeErr.$prenumeErr.$emailErr.$comentErr != "")||($email_err!= "")) {
		echo '<div class="w3-panel w3-red w3-round"><span onclick="ascunde(this);" class="w3-closebtn">&times;</span><h4>Atentie!</h4><p>S-au produs erori la completarea formularului!</p></div>';
	}
	if("".$_REQUEST['mess'] !="") {
		echo '<div class="w3-panel w3-blue-grey w3-round"><span onclick="ascunde(this);" class="w3-closebtn">&times;</span><h4>Va multumim!</h4><p>Datele introduse de dvoastra au fost salvate cu succes!</p></div>';
	}
?>