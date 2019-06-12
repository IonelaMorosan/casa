<?php
	session_start();
	require 'config.php';
	require 'connection.php';
	$extragere="SELECT * FROM oaspete";
	$result = mysqli_query($conn, $extragere);
	while($rows=mysqli_fetch_array($result)){
		$delete = $_GET['check'.$rows['id']];
		if($delete == "on") {
			$sterge = "DELETE FROM oaspete WHERE  id = ".$rows['id']; 
			if (!mysqli_query($conn, $sterge)) 
			{
				echo "S-a produs o eroare la stergere: " . mysqli_error($conn);
			}
		}
	}
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="author" content="Butnaru" />
	<title>Departament comenzi, gestionare mesaje</title>
	<link rel="shortcut icon" href="../image/flower.png"> 
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/stiluri.css">
	<style>
		header a {
			margin: 10px;
			border-color: cyan;
			box-shadow: 1px  2px 1px gray;
			padding: 8px;
		}
		header a:hover {
			color: #000;
		}
	</style>
</head>
<body>
<div class="w3-container w3-sand corp w3-padding-16">
	<header class="w3-container w3-sand">
		<h3  id="sus" class="w3-container w3-card-16 w3-padding-8 w3-green w3-xlarge w3-text-white w3-opacity">Mesajele vizitatorilor...<br>Bifeaza mesajele pe care doresti sa le lichidezi</h3>
		<div class="w3-container w3-xlarge w3-padding-8 w3-right w3-text-white w3-card-16 w3-orange">
			<a href="delogare.php">Iesire</a>
			<a href="meniu.php">Inapoi la meniul cu optiuni</a>
		</div>
	</header>
	<hr />
	<!--Afisare mesaje vizitatori-->
	<div class="w3-container w3-border">
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="get">
		<p class="w3-text-green"><b>Poti selecta o perioada mai mica, introducand data inceputului perioadei si data sfarsitului perioadei</b></p>
		<input type="text" name="data_inceput" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}" placeholder="zz/ll/aaaa" title="Introdu data in formatul zz/ll/aaaa!" maxlength="10" size="10" class="linie" />
		<input type="text" name="data_sfarsit" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}" placeholder="zz/ll/aaaa" title="Introdu data in formatul zz/ll/aaaa!" maxlength="10" size="10" class="linie" />
		<input type="submit" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-green w3-padding-16 w3-text-white w3-hover-border-green" value="Afiseaza" />
		<?php echo '<p class="err">'.$info.'</p>'; ?>
	</form>
	</div>
	<div>
	<?php
	// extragere date din BD
	
	require 'connection.php';
	$extragere="SELECT * FROM oaspete ORDER BY data desc";
	if(!empty($_GET['data_inceput']) and !empty($_GET['data_sfarsit']))
		$extragere = $extragere." where data BETWEEN STR_TO_DATE('".$_GET['data_inceput']."', '%d/%m/%Y') AND STR_TO_DATE('".$_GET['data_sfarsit']." 235959', '%d/%m/%Y %H%i%s')";
	$result = mysqli_query($conn, $extragere);
	while($rows=mysqli_fetch_array($result)){
	?>
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="get">
	<table class="w3-table w3-striped">
	<tr><td colspan="3" style="border-top: 3px solid cyan;"></td></tr>
    <tr>
        <td>Numele:</td>
        <td><? echo $rows['nume']; ?></td>
		<td rowspan="5" style="text-align: center; vertical-align: middle; width: 15%;">
		<input type="checkbox" name="<? echo 'check'.$rows['id']; ?>" class="w3-check" /></td>
	</tr>
	<tr>
        <td>Prenumele:</td>
        <td><? echo $rows['prenume']; ?></td>
	</tr>
	<tr>
        <td>Emailul:</td>
        <td><? echo $rows['e_mail']; ?></td>
	</tr>
	<tr>
        <td>Comentariu:</td>
        <td class="cell"><? echo $rows['comentariu']; ?></td>
	</tr>
	<tr>
		<td>Data/Ora</td>
        <td><? echo $rows['data']; ?></td>   
	</tr>
	</table>
	<?php
	}
	mysqli_close($conn);
	?>
	<input type="submit" class="w3-container w3-border w3-round-xlarge w3-card-8 w3-green w3-padding-16 w3-text-white w3-hover-border-green" value="Sterge inregistrarile bifate" />
	<? echo '<p class="err">'.$info.'</p>'; ?>
	</form>
	</div>
</div>
<script>
function ascunde(btn) 
	{btn.parentElement.style.display='none';}
</script>
</body>
</html>