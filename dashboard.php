<?php require_once 'includes/header.php'; ?>

<?php 


$orderSql = "SELECT M.image,A.FaeTag,M.serial,U.username,A.DateSortieMateriel FROM affectation_matériel A JOIN users U ON A.username=U.username
JOIN matériel M ON A.FaeTag=M.FaeTag
order by DateSortieMateriel DESC;";
$orderQuery = $connect->query($orderSql);
$countOrder="";

$SqlMateriel="SELECT * From matériel WHERE emplacement LIKE 'stock'";
$QueryVar=$connect->query($SqlMateriel);




?>
<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>
	<?php  if(isset($_SESSION['userId']) ) { ?>
		<div class="col-md-4" >
		<div class="panel panel-success">
			<div class="panel-heading">
			<?php 
			$cpt=0;
			while ($v = $QueryVar->fetch_assoc()){ 
				$cpt=$cpt+1;
			 } ?>
				<a href="product.php" style="text-decoration:none;color:black;">
					Matériel en stock
					<span class="badge pull pull-right"><?php echo $cpt; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->
	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="ruptureMateriel.php" style="text-decoration:none;color:black;">
				    Matériel en rupture
					<span class="badge pull pull-right"></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->
		<div class="col-md-4">
				<div class="panel panel-info" >
				<div class="panel-heading">
					<a href="Calendar.php" style="text-decoration:none;color:black;">
					traçabilité stock
						<span class="badge pull pull-right"></span>
					</a>
						
				</div> <!--/panel-hdeaing-->
			</div> <!--/panel-->
		</div> <!--/col-md-4-->
	<div class="col-md-4">
		<div class="card">
		<div class="cardHeader"style="background-color:#457b9d;" >
			<p><?php 
			if (date('l')=='Monday')  echo "Le Lundi ".date('d').', '.date('Y');
			else if (date('l')=='Tuesday')  echo "Le Mardi ".date('d').', '.date('Y');
			else if (date('l')=='Wednesday')  echo "Le Mercredi ".date('d').', '.date('Y');
			else if (date('l')=='Thursday')  echo "Le Jeudi ".date('d').', '.date('Y');
			else if (date('l')=='Friday')  echo "Le Vendredi ".date('d').', '.date('Y');
			else if (date('l')=='Saturday')  echo "Le Samedi ".date('d').', '.date('Y');
			else if (date('l')=='Sunday')  echo "Le Dimanche ".date('d').', '.date('Y');
			?></p>
		  </div>
		  
		    <h1><?php 
			$cpt=0;
			$date=date("Y-m-d");
			$Sqld="SELECT * From affectation_matériel WHERE DateSortieMateriel>='$date'";
			$r=$connect->query($Sqld);
			$num_rows = mysqli_num_rows($r);
			?></h1>
		  

		  
		</div> 
		<br/>

		<div class="card">
		<div class="cardContainer">
		    <p>Aujourd'hui</p>
		  </div>
		  <div class="cardHeader" style="background-color:#a8dadc;">
		    <h1><?php echo $num_rows." Matériel Utilisé ";?></h1>
		  </div>

		  
		</div> 

	</div>
	<div class="col-md-8">
		<div  class="panel panel-default">
			<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Dernières activités </div>
			<div class="panel-body">
				<table class="table table-hover table-striped table-bordered" id="productTable">
			  	<thead>
			  		<tr>
						<th style="width:20%;">Image </th>			  			
			  			<th style="width:20%;">Fae Tag </th>
						<th style="width:20%;">Serial </th>
			  			<th style="width:20%;">User name</th>
						<th style="width:20%;">Date </th>
						
			  		</tr>
			  	</thead>
			  	<tbody>
					<?php 
					while ($orderResult = $orderQuery->fetch_assoc()) {
						
					?>
						<tr>
						
						    <td><?php 
							
							echo '<img src="'. $orderResult['image'] .'" width="98" height="68"/></a>'?></td>
							<td><?php echo $orderResult['FaeTag']?></td>
							<td><?php echo $orderResult['serial']?></td>
							<td><?php echo $orderResult['username']?></td>
							<td><?php echo  $orderResult['DateSortieMateriel']?></td>
							
							
						</tr>
						
					<?php } ?>
				</tbody>
				</table>
				<style>
					.table{
						width: auto;
                        margin-right: 0px;
                        margin-left: 0px;
					}
					
				</style>
				<!--<div id="calendar"></div>-->
			</div>	
		</div>
		
	</div> 
	<?php  } ?>
	
</div> <!--/row-->



<?php require_once 'includes/footer.php'; ?>
<!--Created By : Rim ELBADDAZI / EMSI RABAT -->