<?php 
session_start(); 
require('../log.php');	
$cale = 'http://localhost/saw/lab5/';
require '../connect.php';
if (!$_SESSION['id_user'])
{ 
    header('Location: '.$cale);
}             
if(!(($_SESSION['roluri_produs_acces']==2)or($_SESSION['roluri_produs_acces']==3)))
{
write_logs("view");
header('Location: '.$cale.'admin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../style_2.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

		<div class="panou">
    <h2>Activitate placuta, <?php echo $_SESSION['denumire_rol']; ?>ule!</h2>
</div>
<button class="accordion"><a href="../admin.php">Inapoi</a></button>
<div class="panel">
  <!---<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
--></div>
		
		<div class="vizualizare">
		<h3>Tabelul conturi</h3>
		<?php 
		write_logs("view");
			require ('../connect.php');
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			try
			{
				$query = "SELECT id_user, username, password, status  FROM user";
			$sqlQwer = mysqli_query($connect, $query);
			}
			catch (Exception $e)
			{
			    $data_ora =	error_log($e->getMessage()."\t".date("d/m/y H:i:s")."\t".$_SERVER['PHP_SELF']."\r\n", 3, "d:protocol_erori.txt");
				header('Location: http://'.$_SERVER['SERVER_NAME'].'/saw/lab5/'.'start.html');
			}
			if ($sqlQwer) {
				echo "<div ><table align='center'>";
				echo '<tr><th>N/O</th><th>Username</th><th>Password</th><th>Statut</th></tr>';
				while($rows=mysqli_fetch_array($sqlQwer)){
					echo '<tr>';
					echo '<td>'.$rows['id_user'].'</td>';
						echo '<td>'.$rows['username'].'</td>';
						echo '<td>'.$rows['password'].'</td>';
						if ($rows['status']==1)
						{echo "<td>activ</td>";}
					else {echo "<td>inactiv</td>";}
					echo '</tr>';
				}
				mysqli_close($connect);
				echo '</table></div>';
			}
		?>
		</div>
</body>
</html>