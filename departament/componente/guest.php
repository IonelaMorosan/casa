<div class="w3-container w3-sand">
	<header class="w3-container w3-sand" style="clear: both;">
		<h1  id="sus" class="w3-xxxlarge afisare w3-text-green w3-text-shadow">Părerea ta contează!</h1>
	</header>
	
	<!--formularul pentru feedback-->
	<div class="date_form_guest w3-container w3-border w3-round-xlarge w3-card-8 w3-hover-border-green">
		<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="w3-container w3-padding-16">
			<label for="nume" class="w3-label w3-text-green w3-wide">Numele dvoastra:</label>
            <input type="text" name="nume" class="w3-input w3-border linie" value="<?php echo $nume;?>" /><span class="err"><?php echo $numeErr;?></span>
			<label for="prenume" class="w3-label w3-text-green w3-wide">Prenumele dvoastra:</label></td>
            <input type="text" name="prenume" class="w3-input w3-border linie" value="<?php echo $prenume;?>" /><span class="err"><?php echo $prenumeErr;?></span><br />
            <label for="email" class="w3-label w3-text-green w3-wide">E-mail-ul dvoastra:</label>
            <input name="e_mail" type="email" class="w3-input w3-border linie" value="<?php echo $email;?>" /><span class="err"><?php echo $emailErr;?></span><br />
            <label for="coment" class="w3-label w3-text-green w3-wide">Lasati in spatiul liber parerea dvoastra:</label><br />
            <textarea name="coment" id="coment" cols="50" rows="3" placeholder = "Scrieti aici parerea..." class="w3-border"><?php echo $coment;?></textarea><span class="err"><?php echo $comentErr;?></span>
			<input type="submit" value="Transmite mesajul" name="submit" class="w3-container w3-border w3-padding-16 w3-round-xlarge w3-card-8 w3-green w3-text-white w3-hover-orange" />
		</form>
		<p><span class="err">* toate câmpurile trebuie completate</span></p>
		<p> </p>
</div>
<hr />
<!--afisarea parerilor altora-->
<div class="w3-container w3-border w3-round-xlarge w3-card-8">
	<h3 class="w3-xlarge afisare w3-text-green w3-text-shadow">Ce spun altii despre noi ...</h3>
	<?php
	// extragere date din BD
	require 'connection.php';
	$sql = "SELECT count(id) FROM oaspete";
    $val = mysqli_query($conn, $sql);
    if(!($val)) { die('Greseala: ' . mysqli_error($conn));}
    $row = mysqli_fetch_array($val, MYSQLI_NUM);
	$rec_limit = 3;
    $rec_count = $row[0];
	//$page_post = 0;
    if( isset($_GET{'page_post'} ) ) {
        $page_post = $_GET{'page_post'} + 1;
        $offset = $rec_limit * $page_post ;
         }else {
            $page_post = 0;
            $offset = 0;
         }
        $left_rec = $rec_count - ($page_post * $rec_limit);
        $sql = "SELECT * FROM oaspete ORDER BY data desc LIMIT $offset, $rec_limit";
        $val = mysqli_query($conn, $sql);
        if(! $val ) { die('Eroare: ' . mysqli_error($conn));
        }
	echo '<div class="w3-row-padding w3-padding-16 w3-center w3-animate-opacity">';
	while($row = mysqli_fetch_array($val, MYSQLI_ASSOC)) {
   ?>
    <div class="w3-col s4 w3-card-4 w3-round-large w3-section">
      <h3><? echo $row['prenume']; ?></h3>
      <p><? echo $row['comentariu']; ?></p>
	  <p><? echo $row['data']; ?></p>
    </div>
	<? } ?>
	</div>
 <? //pagination
	echo '<div class="w3-center w3-padding-32"><ul class="w3-pagination">';
	
	//$prev = $page_post-2;
	if( $page_post > 0 )
		echo '<li><a href="'.$_SERVER["PHP_SELF"].'?page_post='.($page_post-2).'" class="w3-hover-orange w3-padding-16 w3-round-xlarge w3-card-8 w3-text-white w3-green">Comentariile anterioare</a></li>';
	if($left_rec > $rec_limit)
		echo '<li><a href="'.$_SERVER["PHP_SELF"].'?page_post='.$page_post.'" class="w3-hover-orange w3-padding-16 w3-round-xlarge w3-card-8 w3-text-white w3-green">  Comentariile urmatoare</a></li>';	
		echo "</ul></div>";
        mysqli_close($conn);
 ?>
</div>	