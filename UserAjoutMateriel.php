<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/headerS.php'; ?>

<!DOCTYPE html>
<html >
<head>

<title>Ajouter un Matériel</title>
</head>

<body >
<form method = "POST">
  <div>
    <h3>Ajouter un matériel :</h3>
    
    <div class="info">
    <hr>
    <form class="form-horizontal" id="submitImportForm">
            
				<div class="col-sm-8">
	        	<span><label for="photo" >Importer photo </label></span>
					    <!-- the avatar markup -->			        
					        <input type="file" class="form-control" nom="photo" placeholder="Importer image" name="photo" class="file-loading" style="width:auto;"/>   
	
    
    <div>
    <span for="FaeTag"><b >FaeTag  </b></span>
    <input type="text" placeholder="Entrer FaeTag" name="FaeTag" id="FaeTag" required>
    
    <span for="Type"><b>Type  </b></span>
    <select id="Type" name="Type">
        <option value="Desktop">Desktop</option>
        <option value="Monitor">Monitor</option>
    </select>
    
    <div>
    <span for="Brand"><b>Brand       </b></span>
    <select id="Brand" name="Brand">
        <option value="Dell">Dell</option>
    </select>
    <span for="model"><b >Modele  </b></span>
    <input type="text" placeholder="Entrer modèle" name="model" id="model" required>
    
    <span for="Emplacement" ><b>Emplacement </b></span>
    <input type="text" placeholder="Entrer Emlacement matériel" value="Stock" name="Emplacement" id="Emplacement" required>
    </div>
    <div>
    <span for="Serial"><b>Serial      </b></span>
    <input type="text" placeholder="Entrer code Seriale" name="Serial" id="Serial" required>
    
    <span for="Etat"><b>Etat        </b></span>
    <select id="Etat" name="Etat">
        <option value="0">Neuf</option>
        <option value="1">Réparé</option>
        
    </select>
    </div>
    
</div>

    <hr style="width:155%;">
    <button type="submit" name="submit" class="registerbtn">Enregistrer</button>
  </div>
</form>
<?php
   $v=0;
  if ( isset( $_POST['submit'] ) ){
      
      $photo = "/images/".$_POST['photo']; 
      $FaeTag = $_POST['FaeTag']; 
      $type = $_POST['Type'];
      $brand=$_POST['Brand'];
      $model=$_POST['model'];
      $Emplacement=$_POST['Emplacement'];
      $Serial=$_POST['Serial'];
      $Etat=$_POST['Etat'];
      
      // afficher le résultat
      $SQL = "INSERT INTO matériel (FaeTag,type,brand,model,emplacement,serial,image,Etat) VALUES ('$FaeTag','$type','$brand','$model','$Emplacement','$Serial','$photo','$Etat')";
      $result = mysqli_query($connect,$SQL);
      $v=1;
    }
  if ($v==1){
    //affiche message bien ajouter
    ?>
    <style>
                  .alert {
                    padding: 5px;
                    background-color: #2a9d8f;
                    color: black;
                    width: 800px;
                    height: 50px;
                    position:sticky;
                    left: 0px;
                    
                  }

                  .closebtn {
                    margin-left: -800px;
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
                    <strong>Matériel Ajouté </strong>avec succés  !!
                  </div>
    <?php
  }
?>


</form>
</body>
<style>
    * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
  
}
span{
   display: inline-block;
   width: 300px;
   height: 50px;
   text-align: center;
   
   
}

/* Full-width input fields */
input[type=text], select {
  width: 40%;
  padding: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  margin: 1;
  
}
input[type=file] {
  width: 30%;
  padding:28px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
 
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #0077b6;
  color: white;
  padding: 8px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
  
}


.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text  section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</html>


<?php require_once 'includes/footer.php'; 
$connect->close();?>
<!--Created By : Rim ELBADDAZI / EMSI RABAT -->