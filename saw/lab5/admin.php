<?php 
session_start(); 
require('log.php');    
$cale = 'http://localhost/saw/lab5/';
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
<p><a href="permisiuni/vizualizare_produs.php">Vizualizeaza date produse</a><br /></p>
</div>

<?php
break;

case 3: ?>
<button class="accordion">Produse</button>
<div class="panel">
<p><a href="permisiuni/vizualizare_produs.php">Vizualizare produse</a><br /></p>
<p><a href="permisiuni/editare_produs.php">Editare produs</a><br /></p>
<p><a href="permisiuni/adauga_produs.php">Adauga produs</a><br /></p>
<p><a href="permisiuni/sterge_produs.php">Sterge produs</a><br /></p>
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
<p><a href="permisiuni/vizualizeaza_permisiune.php">Vizualizeaza date permisiuni</a></p>
</div>


<?php break;

case 3: ?>
<button class="accordion">Rol</button>
<div class="panel">
<p><a href="permisiuni/vizualizeaza_permisiune.php">Vizualizeaza rol</a></p>
<p><a href="permisiuni/editeaza_permisiune.php">Editeaza rol</a></p>
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
<p><a href="permisiuni/vizualizare_cont.php">Vizualizeaza date conturi</a><br /></p>
</div>

<?php break;

case 3: ?>
<button class="accordion">Conturi</button>
<div class="panel">
<p><a href="permisiuni/adauga_cont.php">Creeaza cont</a><br /></p>
<p><a href="permisiuni/vizualizare_cont.php">Vizualizeaza conturi</a><br /></p>
<p><a href="permisiuni/edit_cont.php">Editeaza conturi</a><br /></p>
<p><a href="permisiuni/sterge_cont.php">Sterge cont</a><br /></p>
</div>

<button class="accordion">Fisiere</button>
<div class="panel">
<p><a href="permisiuni/log_view.php">Vizualizeaza fisierul log</a><br /></p>
<p><a href="permisiuni/error_view.php">Vizualizeaza fisierul erori</a><br /></p>
</div>

<?php break;
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

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