<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html>
<title>Departamentul Comenzi, Angajati</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="../image/flower.png"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/stiluri.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<body>
<div class="w3-container viu"></div>
<div class="w3-container w3-orange w3-text-white w3-padding-large w3-xlarge"><a href="../index.php" title="Pagina de start" class="w3-hover-text-white">Inapoi la pagina de start</a></div>
<!--div class="w3-container w3-orange w3-text-white w3-large"-->
<div class="w3-card-4 w3-padding-large" style="width:70%; margin: 0 auto;">
<header class="w3-container w3-light-grey">
<?php 
	if(isset($_GET['img']))
	{
		$img=$_GET['img'];
		$sql = "SELECT * FROM angajat where url_poza_angajat like '%/".$img."'";
		$val = mysqli_query($conn, $sql);
		if(!($val)) { die('Greseala: ' . mysqli_error($conn));}
		if ($row = mysqli_fetch_array($val))
		{
?>
	<h2><?php echo $row['prenume_angajat'].' '.$row['nume_angajat']; ?></h2>
	</header>

	<div class="w3-container">
	<h3><?php echo $row['functia']; ?></h3>
	<hr />
	<img src ="../<?php echo $row['url_poza_angajat']; ?>" alt="Avatar" width="30%" class="w3-left w3-hover-shadow w3-padding-large">
	<h3 class="w3-padding-large"><?php echo 'Telefon: '.$row['nr_telefon'];?></h3>
	<h3 class="w3-padding-large"><?php echo 'Email: '.$row['email'];?></h3>
	</div>
<?php
		}else{
			echo "Nu sunt informatii despre acest angajat! Scuze... :(";
		}
		mysqli_close($conn);
	}
?>
</div>
<div class="w3-container viu"></div>
</body>
</html>