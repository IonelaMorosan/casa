<?php 
$cale = 'http://localhost/saw/lab4/';
session_start();            
require '../connect.php';
if (!$_SESSION['id_user'])
{ 
    header('Location: '.$cale);
}  
if(!(($_SESSION['roluri_produs_acces']==2)or($_SESSION['roluri_produs_acces']==3)))
{

header('Location: '.$cale.'admin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
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
.vizualizare{
	box-shadow: 0 0 30px #bdbdbd;
	background: #ececef;
	border-radius: 10px;
	padding: 20px 20px 20px 20px;
	border: 1px solid grey;
	text-align: center;
}
.vizualizare table,table td,th{
	border: 1px solid grey;
}
.vizualizare table{
	width: 500px;
	border-collapse: collapse}

</style>
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
			require ('../connect.php');
			$query = "SELECT id_user, username, status  FROM user";
			$sqlQwer = mysqli_query($connect, $query);
			if ($sqlQwer) {
				echo "<div ><table align='center'>";
				echo '<tr><th>N/O</th><th>Cont</th><th>Statut</th></tr>';
				while($rows=mysqli_fetch_array($sqlQwer)){
					echo '<tr>';
					echo '<td>'.$rows['id_user'].'</td>';
						echo '<td>'.$rows['username'].'</td>';
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