<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<?php 


$orderSql = "SELECT M.image,A.FaeTag,M.serial,U.username,A.DateSortieMateriel FROM affectation_matériel A JOIN users U ON A.username=U.username 
JOIN matériel M ON A.FaeTag=M.FaeTag
where Month(A.DateSortieMateriel)=2
order by DateSortieMateriel DESC;";
$orderQuery = $connect->query($orderSql);
$countOrder="";

$connect->close();

?>
<!DOCTYPE html>
<html>
 <head>
    <h3><center>Matériels Utilisé en Février :</center></h3>
 </head>
<body>
		
			<div >
				<table class="table table-hover table-striped table-bordered" id="productTable">
			  	<thead>
				  <tr>
						<th style="width:20%;">Image </th>			  			
			  			<th style="width:20%;">Fae Tag </th>
                        <th style="width:20%;">SN </th>
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
						width: 1500px;
                        margin-right: 0px;
                        margin-left: 0px;
					}
					
				</style>
				<!--<div id="calendar"></div>-->
			</div>	
		
		
</body>              
</html>
<?php require_once 'includes/footer.php'; ?>
<!--Created By : Rim ELBADDAZI / EMSI RABAT -->