<?php
require '../connect.php';
//$id=$_GET["id"];
$query="SELECT id_user , username, status, id_rol FROM user WHERE id_user='".$_GET['id']."'";
                $sqlQwer = mysqli_query($connect, $query);
                if ($sqlQwer) {
                    while($rows=mysqli_fetch_array($sqlQwer)){
?>
<form  method="POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
<p>ID :<?php echo  $rows['id_user']; ?></p>
<p>Username :<?php echo  $rows['username'];?></p>
<p>Status :<?php echo  $rows['status'];?></p>
                    
<select name = "roll">
								<option value = ""></option>
								    <?php
									$sqlQwer=mysqli_query($connect, "SELECT * FROM rol;");
									while($rows=mysqli_fetch_array($sqlQwer)) { 
										?>
										<option value=" <?php echo $rows['id_rol']; ?> " >
											<?php echo $rows['denumire_rol']." "; ?>
										</option>
										<?php 
									} 
								?>
							</select>
                            <?php 
                            

                        }}?>
                            <input type="submit"  value="Update" name="action1"/>
                            </form>
<?php
if (isset($_REQUEST['action1'])) {
    $rol = $_POST['id_rol'];
    $id=$_POST['id_user'];
    mysqli_query($connect,"UPDATE user SET id_rol = '$rol' WHERE user.id_user='$id'" );
    echo '<a href="editeaza_permisiune.php">Inapoi</a>';
    $id = 0;
    $rol = 0;
    }
    

?> 