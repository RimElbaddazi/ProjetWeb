<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<?php 


$orderSql = "SELECT * FROM matériel group by model  ";
$orderQuery = $connect->query($orderSql);

?>

<div class="row">
	<div class="col-md-12">

		
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Géstion Matériel </div>
			</div>
			 <!-- /Search Button -->
				<form action="" methode="GET"> 
				 <div class="search">
					<input type="text" class="searchTerm" name="search" value="<?php ?>" placeholder="Entrez un FaeTag  ... ">
					
					<button  type="submit" class="searchButton">
						<i class="fa fa-search"></i>
					</button>
				 </div>
				</form>
				
				<style>
					@import url(https://fonts.googleapis.com/css?family=Open+Sans);

					

					.search {
					width: 100%;
					position: relative;
					display: flex;
					}

					.searchTerm {
					width: 150%;
					border: 3px solid #00B4CC;
					border-right: none;
					padding: 5px;
					height: 40px;
					border-radius: 5px 0 0 5px;
					outline: none;
					color: #9DBFAF;
					}

					.searchTerm:focus{
					color: #00B4CC;
					}

					.searchButton {
					width: 50px;
					height: 40px;
					border: 1px solid #00B4CC;
					background: #00B4CC;
					text-align: center;
					color: #fff;
					border-radius: 0 5px 5px 0;
					cursor: pointer;
					font-size: 20px;
					}

					/*Resize the wrap to see the search bar change!*/
					.wrap{
					width: 55%;
					position: absolute;
					top: 10%;
					left: 20%;
					transform: translate(-30%, -20%);
					}
				</style>
		  <!--end search bar -->
		      <!-- BUTTON -->
			  <br>	
			  <a href="AjoutMateriel.php" class="hbtn hb-fill-on-rev">Ajouter un Matériel</a>
			  <a href="QtMateriel.php" class="hbtn hb-fill-on-rev">Afficher Quantité/Model</a>
			   <style>
						.hbtn {
							position: relative;
							box-sizing: border-box;
							display: inline-block;
							overflow: hidden;
							padding: 8px 20px;
							margin: 0px 3px 6px;
							text-align: center;
							border: 2px solid rgb(255,255, 255);
							text-decoration: none;
							color: rgb(0,0,0);
							white-space: nowrap;
							z-index: 0;
							top: 10%;
					        left: 65%;
						} 
						

						.hbtn i {
							padding-right: 8px;
						} 
						

						.hb-fill-on-rev::before {
							position: absolute;
							content: "";
							background: rgb(0, 180, 216);
							transition-duration: 0.3s;
							z-index: -1;
							inset: 0px auto auto 0px;
							width: 100%;
							height: 100%;
							opacity: 1;
						} 
						

						.hb-fill-on-rev:hover::before {
							width: 100%;
							height: 100%;
							opacity: 0;
						} 
						

						.hb-fill-on-rev:hover {
							background: transparent;
							color: rgb(255, 255, 255);
							transition: color 0.3s ease 0s, background 0s ease 0s;
						} 
						

			   </style>
            <?php if(empty($_GET['search'])){?>
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
					
					
					
					while ($orderResult = $orderQuery->fetch_assoc()) {
					foreach((array)$orderResult['model'] as $v){
						$var="SELECT * FROM matériel WHERE model='$v' AND (emplacement='Stock' or emplacement='stock')";
						$varQuery=mysqli_query($connect,$var);
						$value =$varQuery->num_rows;
						}
					
					?>
						<tr>
                            
						    <td><?php  echo '<img src="'. $orderResult['image'] .'" width="98" height="68"/></a>'?></td>
							<td><?php echo $orderResult['FaeTag']?></td>
							<td><?php echo $orderResult['type']?></td>
							<td><?php echo $orderResult['brand']?></td>
							<td><?php echo $orderResult['model']?></td>
							<td><?php echo $orderResult['emplacement']?></td>
							<td><?php echo $orderResult['serial']?></td>
							<td><?php 
							if($orderResult['Etat']==0)
							echo "Neuf";
							else
							echo "Réparé";?></td>
							<td><?php echo $value?></td>
						</tr>
						
					<?php } ?>
				</tbody>
				</table>
			
				<!-- /table -->

			</div> <!-- /panel-body -->
            <?php }else{
                        $y=$_GET['search'];
                        $searchSql = "SELECT FaeTag,type,brand,model,emplacement,serial,image,Etat FROM matériel where FaeTag='$y'";
                        $sQuery = $connect->query($searchSql);
                                if(empty($orderResult2 = $sQuery->fetch_assoc())){?>
                                        <html>
                                        <head>
                                        <meta name="viewport" content="width=device-width, initial-scale=1">
                                        <style>
                                        .alert {
                                        padding: 16px;
                                        background-color: #e01e37;
                                        color: white;
                                        margin-left: 80px;
                                        width: 1000px;
                                        }
                                        .closebtn:hover {
                                        color: black;
                                        }
                                        </style>
                                        </head>
                                        <body>


                                        <div class="alert"><center><strong>Erreur !  </strong>Aucun Matériel avec cet FaeTag !! </center></div>

                                        </body>
                                        </html>
                            <?php
                               }else{?>
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
                            
                            
                            $sQuery->data_seek(0);
                            while ($orderResult2 = $sQuery->fetch_assoc()) {
                            foreach((array)$orderResult2['model'] as $v){
                                $var="SELECT * FROM matériel WHERE model='$v'";
                                $varQuery=mysqli_query($connect,$var);
                                $value =$varQuery->num_rows;
                                }
                            
                            ?>
                                <tr>
                                    
                                    <td><?php  echo '<img src="'. $orderResult2['image'] .'" width="98" height="68"/></a>'?></td>
                                    <td><?php echo $orderResult2['FaeTag']?></td>
                                    <td><?php echo $orderResult2['type']?></td>
                                    <td><?php echo $orderResult2['brand']?></td>
                                    <td><?php echo $orderResult2['model']?></td>
                                    <td><?php echo $orderResult2['emplacement']?></td>
                                    <td><?php echo $orderResult2['serial']?></td>
                                    <td><?php echo $orderResult2['Etat']?></td>
                                    <td><?php echo $value?></td>
                                </tr>
                                
                            <?php } ?>
                        </tbody>
                        </table>
            <?php }} ?>
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter un Matériel</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	      	<div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label">Image : </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
	        </div> <!-- /form-group-->	     	           	       

	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Fae Tag : </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Type : </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Brand : </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Rate" name="rate" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	     	        

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Modèle : </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandName" name="brandName">
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1 AND brand_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	       


<script src="custom/js/product.js"></script>



<?php require_once 'includes/footer.php'; 

$connect->close();
?>
<!--Created By : Rim ELBADDAZI / EMSI RABAT -->