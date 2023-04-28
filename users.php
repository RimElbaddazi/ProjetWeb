<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<?php 
$orderSql = "SELECT * FROM users where TypeUser=1";
$orderQuery = $connect->query($orderSql);
$connect->close();
?>
<link rel="stylesheet" href="styleUsers.css">
<div class="row" id="Row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Gérer Les Utilisateurs </div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" >
					<button  onclick="location.href='addUser.php'" class="butt"> Ajouter </button>
				</div> <!-- /div-action -->	
				<div class="div-action pull pull-right" >
					<button onclick="location.href='suppUser.php'" class="butt2"> <i ></i> Supprimer </button>
				</div> <!-- /div-action -->
				<div class="div-action pull pull-right" >
					<button onclick="location.href='ModifierUser.php'" class="butt3"> <i ></i> Modifier </button>
				</div> <!-- /div-action --><br><br><br>
				<table class="table table-hover table-striped table-bordered" id="manageUserTable" style="width:40%;margin-left:300px;" >
						<tr>
							<th style="width:10%;">Nom Utilisateur </th>
							
						</tr>
                        <?php
						 $cpt=0;
						 while ($orderResult = $orderQuery->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <div class="name"><?php echo $orderResult['username'];
								$cpt=$cpt+1;
								?>
								</div>
                            </td>
                            
                        </tr>
					    <?php } ?>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
            
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->







<script src="custom/js/user.js"></script>

<?php require_once 'includes/footer.php'; ?>
<!--Created By : Rim ELBADDAZI / EMSI RABAT -->