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
		<h3>Fisierului erori</h3>
        <table align="center">
        <tr>
            <th>Mesajul erorii</th>
            <th>Data/ora</th>
            <th>Fisier accesat</th>
        </tr>
    		<?php 
    		write_logs("view");
            $num=3;
			$file = fopen("d:/USM/htdocs/logguri/protocol_erori.txt", "r") or die("Fisier inaccesibil!");
             while (($data = fgetcsv($file, 0, "\t")) !== false) {

        echo "<tr>";

        for ($c = 0; $c < $num; $c++) 
        {
            echo "<td>" . $data[$c] . "</td>";
        }

        echo "</tr>";
}
echo "</table>";
    
    fclose($file);
		?>
		</div>
</body>
</html>