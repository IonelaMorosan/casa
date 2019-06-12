<?php 
$cale = 'http://localhost/saw/lab4/';
session_start(); 
require 'connect.php';
if (!$_SESSION['id_user'])
{ 
    header('Location: '.$cale);
}         
?>

<div class="panou">
    <h2>PANOU DE ADMINISTRARE</h2>
</div>


<?php
   switch ($_SESSION['roluri_produs_acces']) {

case 1: ?>
<button class="accordion">Sectiunea inaccesibila</button>
<?php
break;

case 2: ?>
<button class="accordion">Produse</button>
<div class="panel">
<p><a href="functionalitati/vizualizare_prod.php">Vizualizeaza date produse</a><br /></p>
</div>

<?php
break;

case 3: ?>
<button class="accordion">Produse</button>
<div class="panel">
<p><a href="functionalitati/vizualizare_prod.php">Vizualizeaza date produse</a><br /></p>
<p><a href="functionalitati/editeaza_prod.php">Editeaza date produse</a><br /></p>
<p><a href="#">Adauga detalii un nou produs</a><br /></p>
<p><a href="#">Sterge date produs</a><br /></p>
</div>

 <?php break; }

switch ($_SESSION['roluri_users_acces']) {

case 1: ?>
<button class="accordion">Sectiunea inaccesibila</button>
<?php
break;

case 2: ?>
<button class="accordion">Permisiuni</button>
<div class="panel">
<p><a href="functionalitati/vizualizare_permisiuni.php">Vizualizeaza date permisiuni</a></p>
</div>


<?php break;

case 3: ?>
<button class="accordion">Permisiuni</button>
<div class="panel">
<p><a href="#">Vizualizeaza date permisiuni</a></p>
<p><a href="#">Editeaza date permisiune</a></p>
<p><a href="#">Adauga detalii o noua permisiune</a></p>
<p><a href="#">Sterge date permisiune</a></p>
</div>

<?php break; }

switch ($_SESSION['roluri_roles_acces']) {

case 1: ?>
<button class="accordion">Sectiunea inaccesibila</button>
<?php
break;

case 2: ?>
<button class="accordion">Conturi</button>
<div class="panel">
<p><a href="permisiuni/vizualizare.php">Vizualizeaza date conturi</a><br /></p>
</div>

<?php break;

case 3: ?>
<button class="accordion">Conturi</button>
<div class="panel">
<p><a href="permisiuni/vizualizare.php">Vizualizeaza date conturi</a><br /></p>
<p><a href="functionalitati/editeaza_prod.php">Editeaza date conturi</a><br /></p>
<p><a href="#">Adauga un nou cont</a><br /></p>
<p><a href="#">Sterge cont</a><br /></p>
</div>

<?php break;
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
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
<!---
<div class="panou">
    <h2>PANOU DE ADMINISTRARE</h2>
</div>

<button class="accordion">Vizualizeaza date produse</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Vizualizeaza date permisiuni</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Vizualizeaza date conturi</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
-->
<button class="accordion"><a href="delogare.php">Log Out</a></button>
<div class="panel">
  <!---<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
--></div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>
</body>
</html>