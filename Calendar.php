<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Calendarcss.css">
<style>

</style>
</head>
<body>
<form  method="GET">
  <input class="C" type="date" id="DateC" name="DateC">
  <input class="B" name="bnj" type="submit" value="chercher" >
</form>
<?php 

if(isset($_GET["bnj"])){
$S=$_GET["DateC"];

$orderSql = "SELECT M.image,A.FaeTag,M.serial,U.username,A.DateSortieMateriel FROM affectation_matériel A JOIN users U ON A.username=U.username
JOIN matériel M ON A.FaeTag=M.FaeTag
where date(A.DateSortieMateriel)='$S'
order by DateSortieMateriel DESC;";
$orderQuery = $connect->query($orderSql);
?>
<h3 style="margin-right:210px"><center>Matériels Utilisé Le : <?php echo $S; ?></center></h3>
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
<?php
}else{ ?>
<h3 style="margin-right:210px"><center> Matériels Utilisé Par Mois :</center></h3>

<table style="width:100% ">
  <tr >
    <th><button onclick="location.href='janvier.php'">Janvier<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=1";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
    <th><button onclick="location.href='fevrier.php'">Février<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=2";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
    <th><button onclick="location.href='mars.php'">Mars<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=3";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
    <th><button onclick="location.href='avril.php'">Avril<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=4";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</tr>
  <tr>
    <th><button onclick="location.href='mai.php'">Mai<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=5";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
    <th><button onclick="location.href='juin.php'">Juin<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=6";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
    <th><button onclick="location.href='juillet.php'">Juillet<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=7";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
    <th><button onclick="location.href='aout.php'">Août<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=8";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</tr>
  <tr>
    <th><button onclick="location.href='septembre.php'">Septembre<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=9";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
    <th><button onclick="location.href='octobre.php'">Octobre<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=10";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
    <th><button onclick="location.href='novembre.php'">Novembre<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=11";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
    <th><button onclick="location.href='decembre.php'">Décembre<br><h3><?php 
    $orderSql="SELECT  * from affectation_matériel WHERE Month(DateSortieMateriel)=12";
    $orderQuery = $connect->query($orderSql);
    $cpt=0;
    while($orderResult = $orderQuery->fetch_assoc()){$cpt=$cpt+1;};
    echo $cpt ;
    ?></h3></button></th>
  </tr>
</table>


<?php } ?>
</body>
</html>
<?php require_once 'includes/footer.php'; ?>
<!--Created By : Rim ELBADDAZI / EMSI RABAT -->
