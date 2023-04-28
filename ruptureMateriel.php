<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<?php 


$orderSql = "SELECT * FROM matériel group by model  ";
$orderQuery = $connect->query($orderSql);






?>
<div class="box">
	<p class="split">Matériels en répture de stock : </p>
	
</div>
<style>
	html, body {
	height: 100%;
}

body {
	overflow: hidden;
}

.box {
	max-width: 70vw;
	padding: 10px;
	margin: 0 auto;
	position: relative;
	top: 50%;
	font-size: 30px;
	line-height: 1;
	transform: translateY(-10%);
	perspective: 400px;
}

.source {
	color: skyblue;
	margin: 0 auto;
}
</style>
<div class="panel-body">

				<div class="remove-messages"></div>

							
				
				<table class="table table-hover table-striped table-bordered" id="manageProductTable">
					<thead>
						<tr>
							<th style="width:10%;">Photo</th>							
							<th>Matériel FaeTag</th>
							<th>Type</th>							
							<th>Brand</th>
							<th>Model</th>
							<th>Emplacement</th>
							<th>Serial</th>
							<th>Etat</th>
							<th>Quantité</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					
					$cpt=0;
					
					while ($orderResult = $orderQuery->fetch_assoc()) {
					foreach((array)$orderResult['model'] as $v){
						$var="SELECT * FROM matériel WHERE model='$v'";
						$varQuery=mysqli_query($connect,$var);
						$value =$varQuery->num_rows;
						}
					if($value<2){$cpt=$cpt+1;
					?>
						<tr>
						    <td><?php  echo '<img src="'. $orderResult['image'] .'" width="98" height="68"/></a>'?></td>
							<td><?php echo $orderResult['FaeTag']?></td>
							<td><?php echo $orderResult['type']?></td>
							<td><?php echo $orderResult['brand']?></td>
							<td><?php echo $orderResult['model']?></td>
							<td><?php echo $orderResult['emplacement']?></td>
							<td><?php echo $orderResult['serial']?></td>
							<td><?php if( $orderResult['Etat']==0)
							             echo "neuf";
									   else
									     echo"réparé";?></td>
							<td><?php echo $value?></td>
						</tr>
						
					<?php }}
					
					$_SESSION['rupture']=$cpt; 
					?>
				</tbody>
				</table>
			
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
	
<?php require_once 'includes/footer.php';
      $connect->close();
?>
<!--Created By : Rim ELBADDAZI / EMSI RABAT -->