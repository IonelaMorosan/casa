<?php
	require 'componente/connection.php';
	$sql = "SELECT count(id_sector) FROM sector";
    $val = mysqli_query($conn, $sql);
    if(!($val)) { die('Greseala: ' . mysqli_error($conn));}
    $row = mysqli_fetch_array($val, MYSQLI_NUM);
	$rec_limit = 3;
    $rec_count = $row[0];
	//$page_rubrica = 0;
    if( isset($_GET{'page_sector'} ) ) {
        $page_sector = $_GET['page_sector'] + 1;
        $offset = $rec_limit * $page_sector ;
         }else {
            $page_sector = 0;
            $offset = 0;
         }
        $left_rec = $rec_count - ($page_sector * $rec_limit);
        $sql = "SELECT * FROM sector LIMIT $offset, $rec_limit";
        $val = mysqli_query($conn, $sql);
        if(! $val ) { die('Eroare: ' . mysqli_error($conn));
        }
	echo '<div class="w3-row-padding  w3-padding-32 w3-center w3-animate-opacity">';
	while($row = mysqli_fetch_array($val, MYSQLI_ASSOC)) {
   ?>
    <div class="w3-col s4">
      <img src="<? echo $row['url_poza_sector']; ?>" alt="url_poza_sector" style="width:90%; height: auto;" class="w3-opacity-min" />
      <h4 class="w3-large"><? echo $row['denumire_sector']; ?></h4>
      <p><? echo $row['descriere_sector']; ?></p>
    </div>
<? } ?>
</div>
 <? //pagination
	echo '<div class="w3-center w3-padding-32"><ul class="w3-pagination">';
	if( $page_sector > 0 )
		echo '<li><a href="'.$_SERVER["PHP_SELF"].'?page_sector='.($page_sector-2).'" class="w3-hover-orange w3-padding-16 w3-round-xlarge w3-card-8 w3-green w3-text-white">Sectoarele anterioare</a></li>';
	if($left_rec > $rec_limit)
		echo '<li><a href="'.$_SERVER["PHP_SELF"].'?page_sector='.$page_sector.'" class="w3-hover-orange w3-padding-16 w3-round-xlarge w3-card-8 w3-green w3-text-white">  Sectoarele urmatoare</a></li>';	
		echo "</ul></div>";
        mysqli_close($conn);
 ?>