<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'?>


<!-- add user -->
<div  >
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i>Ajouter Utilisateur :</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-user-messages"></div>

	      		     	           	       

	        <div class="form-group">
	        	<label for="userName" class="col-sm-3 control-label">Nom Utilisateur: </label>
				
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="userName" placeholder="Le nom " name="userName" autocomplete="off">
				    </div>
				
	        </div> <!-- /form-group-->	 
            <div class="form-group">
	        	<label for="userid" class="col-sm-3 control-label">Id Utilisateur: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="userid" placeholder="ID Utilisateur " name="userID" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="upassword" class="col-sm-3 control-label">Password: </label>
	        	
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="upassword" placeholder="Password" name="upassword" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
            <div class="form-group">
	        	<label for="telephone" class="col-sm-3 control-label">Télephone : </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="telephone" placeholder="Numéro Télephone" name="telephone" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
            <div class="form-group">
	        	<label for="type" class="col-sm-3 control-label">Droits d'accés  : </label>
                    <select name="Type" class="selectS" >
                    <option value="1">User</option>
                    <option value="0">Admin</option>
                    </select>
	        </div> <!-- /form-group-->	        	 
            <style>
               .selectS{
                color:#8a817c;
                position:absolute;
                right:354px;
                font-size: 14px;
                height: 30px;
                width: 80px;
                display: block;
                align-self: center;
                background-color: transparent;
                border: none;
               }
            </style>
	         
	        	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick = "history.back()"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
	        
	        <button type="submit" name="submit" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	 
         <?php
            if ( isset( $_POST["submit"] ) ){
                $userID=$_POST['userID'];
                $userName=$_POST['userName'];
                $password=md5($_POST['upassword']);
                $telephone=$_POST['telephone'];
                $type=$_POST['Type'];
                
                

                $SQL = "INSERT INTO users (user_id,username,Password,Telephone,TypeUser) VALUES ('$userID','$userName','$password','$telephone','$type')";
                $result = mysqli_query($connect,$SQL);
                ?>
				<style>
                  .alert {
                    padding: 5px;
                    background-color: #2a9d8f;
                    color: black;
                    width: 550px;
                    height: 50px;
                    position:sticky;
                    left: 0px;
					margin-left: 20px;
                    
                  }

                  .closebtn {
                    margin-left: 50px;
                    color: black;
                    font-weight: bold;
                    font-size: 20px;
                    line-height: 30px;
                    cursor: pointer;
                    transition: 0.3s;
                  }

                  .closebtn:hover {
                    color: black;

                  }
                  </style>

                  <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>Utilisiteur Ajouter </strong>avec succés  !!
                  </div><?php
                
            }
?>    
    </div> <!-- /modal-content -->    
  </div> <!-- /modal -->
</div> 
<!-- /add  -->

<?php require_once 'includes/footer.php'; ?>
<!--Created By : Rim ELBADDAZI / EMSI RABAT -->