<?php 
	require_once 'componente/adaugare_mesaj.php';
	require_once 'componente/header.php'; 
?>
<!--prezentatorii emisiunii-->
<hr id="prezentatori" />
<? include 'componente/show.php'; ?> 

<!--DESCRIERE generala a emisiunii-->
<div class="w3-container w3-green w3-text-white w3-large">
<p>Departamentul <b>"Comenzi"</b> oferă clientilor posibilitatea de a inregistra comenzi ale produselor si de a afla informatii referitoare la comanda si starea acesteia. Astfel, a fost creata aceasta resursa pentru ca potentialii clienti sa afle mai multe informatii despre angajatii departamentului.</p>
<p>În prim planul activitatii departamentului este satisfactia clientului. Toată echipa departamentului activează cu multă responsabilitate și este gata oricând să răspundă, chiar și personal, la întrebările care pot interveni în perioada prelucrării comenzii. <br />Suplimentar, este posibilă postarea unui comentariu public referitor la produse și echipa departamentului. Aceste mesaje ale clientilor sunt binevenite, pentru a îmbunătăți activitatea în cadrul departamentului.</p>
</div>

<!--abonare noutati-->
<hr id="abonament" />
<? include 'componente/abonare.php'; ?> 	

<!-- Rubrici - Grid-->
<hr id="rubrici" />
<? include 'componente/afisare_sectoare.php'; ?>
  
<hr id="about" />
<!-- Despre noi - feedback-->
<?php 
	require 'componente/guest.php'; 
?>
<hr id="harta"/>
<!-- Harta locatie -->
<?php 
	require 'componente/harta.html'; 
?>
<hr />

<!-- Footer -->
<?php require_once 'componente/footer.php'; 
