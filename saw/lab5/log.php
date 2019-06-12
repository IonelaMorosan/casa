<?php function write_logs($action){
$fileName = "d:/USM/htdocs/logguri/date_loguri.txt";
// Cimpuri: data ora, $_SERVER['PHP_SELF'], SESSION_ID(), $_SESSION['id_user'] $_SESSION['id_rol'] Action
$fieldsSeparator = "\t";
$logLine =date("d/m/y H:i:s").$fieldsSeparator.SESSION_ID().$fieldsSeparator.(("".$_SESSION['id_user'] !="")?$_SESSION['id_user']:"[-]").$fieldsSeparator.(("".$_SESSION['id_rol'] !="")?$_SESSION['id_rol']:"[-]").$fieldsSeparator.$action.$fieldsSeparator.$_SERVER['PHP_SELF'];
if (!file_exists($fileName))
{
$fileO=fopen($fileName,"w") or die("Eroare!");
$antet = "Data ora".$fieldsSeparator."ID sesiune".$fieldsSeparator."ID user".$fieldsSeparator."ID rol".$fieldsSeparator."Actiune".$fieldsSeparator."Fisier accesat";
fwrite($fileO, $antet."\r\n");
fclose($fileO);
}
$fileO=fopen($fileName,"a") or die("Eroare!");
fwrite($fileO, $logLine."\r\n");
fclose($fileO);
}
?>