<div class="w3-container">
<div class="w3-center w3-xlarge w3-text-shadow">ANGAJAȚII DEPARTAMENTULUI</div>
<div class="w3-row-padding">
<?php
  $dir = 'image/angajati/';  // fixam calea spre mapa cu imaginile prezentatorilor
  $files = scandir($dir); 
  if ($files !== false) { // daca nu sunt erori la scanare
    for ($i = 0; $i < count($files); $i++) { // analizam toate denumirile de fisiere gasite
		if (($files[$i] != ".") && ($files[$i] != "..")) { 
			$path = $dir.$files[$i]; 
			echo "<div class='w3-col s2'><a href='componente/detalii_angajat.php?img=$files[$i]'><img src='$path' alt='Imagine' id='div1' class='anim bord' /></a></div>"; 
		}
	}
  }
?>
</div>
</div>