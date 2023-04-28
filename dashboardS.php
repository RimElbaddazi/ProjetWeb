<!--Created By : Rim ELBADDAZI / EMSI RABAT -->
<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/headerS.php'; ?>
<link rel="stylesheet" href="stylesdash2.css">
<div class="row">
	<div class="col-md-12">

		
		
			
			 <!-- /Search Button -->
				<form action="" method="GET"> 
				 <div class="search">
					<input  type="text" class="s" name="search" value="<?php ?>" placeholder="Entrez un FaeTag  ... ">
					
					<button  type="submit" class="searchButton">
						<i class="fa fa-search"></i>
					</button>
				 </div>
				</form>
				
				
		  <!--end search bar -->
		      <!-- BUTTON -->
			  <br>	
			  
			<?php if(empty($_GET['search'])){?>
                <form method="POST">
                <div class="form">
                <div class="IMG"><?php  echo '<img src="defaultImage.png" width="98" height="68"/></a>'?></div>
                <div>
                    <label class="B">FaeTag</label>
                    <input class="A" type="text" placeholder="Entrer FaeTag" name="FaeTag" id="FaeTag" required>
                </div> 
                <div>
                    <label class="B">Serial</label>
                    <input class="A" type="text" placeholder="Entrer N Serial" name="Serial"  required>
                </div> 
                <div>  
                    <label class="B">Source</label>
                    <input class="A" type="text" placeholder="Emplacement du matériel " name="source">
                </div>
                <div>  
                    <label class="B">Destination</label>
                    <input class="A" type="text" placeholder="Destination .. " name="Emplacement"  ?>
                </div><br>
                <div>
                <input type="submit" value="Valider" class="C">
                </div>
                </div>
            </form>
                 <!-- END IF -->
            <?php
            }else{
                    $orderSql = "SELECT FaeTag,type,brand,model,emplacement,serial,image,Etat FROM matériel where FaeTag='".$_GET['search']."' or serial='".$_GET['search']."'";
                    $orderQuery = $connect->query($orderSql);
                    $orderResult = $orderQuery->fetch_assoc(); 
                ?>
                <form method = "POST">
                <div class="form">
                <?php if(!$orderResult){ 
                        $orderResult['image']="";
                        $orderResult['FaeTag']="Erreur";
                        $orderResult['serial']="Erreur";
                        $orderResult['emplacement']="Erreur";?>
                        <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <strong>    Erreur     !</strong> Aucun Matériel avec un tel FaeTag ou code Serial  .
                        </div>
                <?php  }?>
                <div class="IMG"><?php  echo '<img src="'. $orderResult['image'] .'" width="98" height="68"/></a>'?></div>
                <div>
                    <label class="B">FaeTag</label>
                    <input class="A" type="text" placeholder="Entrer FaeTag" name="FaeTag" id="FaeTag" disabled="true" value=<?php echo $orderResult['FaeTag']; ?> >
                </div>
                <div>
                    <label class="B">Serial</label>
                    <input class="A" type="text" placeholder="Entrer N Serail" name="Serial" disabled="true"  value=<?php echo $orderResult['serial']; ?> >
                </div>  
                <div>  
                    <label class="B">Source</label>
                    <input class="A" type="text" placeholder="Emplacement du matériel " name="source" value=<?php echo $orderResult['emplacement']; ?>>
                </div>
                <div>  
                    <label class="B">Destination</label>
                    <input class="A" type="text" placeholder="Destination .. " name="Emplacement" value="" ?>
                </div><br>
                <div>
                <button type="submit" name="submit" value="Valider" class="C">Valider</button>
                </div>
                </div>
                </form>
			<?php
            if ( isset( $_POST['submit'] ) ){
                $FaeTag = $orderResult['FaeTag'];
                $Serial=$orderResult['serial'];   
                $Emplacement=$_POST['Emplacement'];
                $user=$_SESSION['username'];
                $date=date("Y-m-d H:i:s");
                $SQL="UPDATE matériel SET emplacement='$Emplacement' where FaeTag='$FaeTag' or serial='$Serial'";
                $result = mysqli_query($connect,$SQL);
                $sql="INSERT INTO affectation_matériel (username,DateSortieMateriel,FaeTag) VALUES ('$user','$date','$FaeTag')";
                $result2=mysqli_query($connect,$sql);
                ?>
                        <div class="alertB">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <strong>    Bien Effectué     !</strong> Matériel bien affécté  .
                        </div>
                <?php
            } 
            }?>
            
			
	</div>
</div> <!-- /row -->



	       


<script src="custom/js/product.js"></script>





<?php require_once 'includes/footer.php'; 

$connect->close();
?>
