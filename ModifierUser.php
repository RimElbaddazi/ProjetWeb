<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<head>
<link rel="stylesheet" href="StyleModifierUsers.css" />
</head>
<body>
<!-- edit user-->
<div class="panel panel-default">
<div class="panel-heading">
<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Gérer Les Utilisateurs </div></div>
<div class="popup" id="popup">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        
	        <h4 class="modal-title"><i class="fa fa-edit"></i>Modifier Utilisateur</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">
          <form method="POST">
                <div>
                            <input name="UserS"  type="text" placeholder="Entrer Nom Utilisateur ..." >
                            <button type="submit" name="submit" class="A"><i class="fa fa-search"></i></button>
                </div><br>
                     
         </form>
         <?php
            $orderResult['username']="";
            $orderResult['Password']="";
            $orderResult['Telephone']="";
             if(isset( $_POST["submit"] )){
                $userN=$_POST['UserS']; 
                $orderSql = "SELECT * FROM users where username='$userN'";
                $orderQuery = $connect->query($orderSql);
                $orderResult = $orderQuery->fetch_assoc();
             }  
         ?> 
         <form method="POST">
                <div>
                    <label>Nom </label  >
                    <input  name="N"  class="X" value="<?php echo $orderResult['username'] ?>";>
                </div>
                <div>
                    <label>Mot Passe </label>
                    <input type="password" name="P" value="<?php echo $orderResult['Password'] ?>";>
                </div>
                <div>
                    <label>Télephone <label>
                    <input type="phone" name="T" value="<?php echo $orderResult['Telephone'] ?>">
                </div>
        
        

		<div class="modal-footer editUserFooter">
			 <button type="button" class="btn btn-danger" data-dismiss="modal" onclick = "location.href='users.php'"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer </button>
			 <button type="submit" class="btn btn-success" id="editProductBtn" name="submitE"data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer </button>
		</div> <!-- /modal-footer -->	
        </form>	<?php ?>		     
		<?php     
        			     	
         if ( isset( $_POST["submitE"] ) ){  
            $P= md5($_POST['P']);
            $T=$_POST['T']; 
            $N=$_POST['N']; 
            $SQL="UPDATE users SET Password='$P',Telephone='$T' where username='$N'";
            $result=mysqli_query($connect,$SQL);
            ?><style>
                  .alert {
                    padding: 5px;
                    background-color: #2a9d8f;
                    color: black;
                    width: 550px;
                    height: 50px;
                    position:sticky;
                    left: 0px;
                    
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
                    <strong>Utilisiteur Modifier </strong>avec succés  !!
                  </div><?php
           }
	    ?>			  
	      	

</div>
</div>
</div>
</div>
</div>
</div>
<body>
<?php require_once 'includes/footer.php'; ?>