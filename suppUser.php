<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'?>

<!-- categories brand -->
<form method="POST">
<div >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i>Supprimer un utilisateur </h4>
      </div>
      <div class="modal-body">
        
      	<div class="removeUserMessages" ></div>
          <div class="form-group" >
	        	<label for="userName" class="col-sm-3 control-label">Nom Utilisateur: </label>
				        <div class="col-sm-8" >
                         <input type="text" name="userN" id="username" placeholder="Nom Utilisateur" autocomplete="off">
                        
			            </div> <!-- /form-group-->
        <br><br><p>&nbsp;&nbsp;&nbsp;&nbsp;Confirmer s'il vous plaît </p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick = "location.href='users.php'"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer </button>
        <button   type="submit"  class="btn btn-primary" id="submit" name="submitB" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i>Enregistrer</button>
           </div>
     
           
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</form><!-- /.modal -->
<!-- /categories brand -->

<?php
     if ( isset( $_POST["submitB"] ) ){
     $NameUser=$_POST['userN'];
     $SQL="DELETE FROM users WHERE username='$NameUser'";
     $result=mysqli_query($connect,$SQL);
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
					          margin-left: 300px;
                    
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
                    <strong>Utilisiteur Bien Supprimer </strong>  !!
                  </div><?php
    }
     ?>  
<?php require_once 'includes/footer.php'; ?>
<!--Created By : Rim ELBADDAZI / EMSI RABAT -->