<?php 
require_once 'php_action/db_connect.php';
session_start();
if(isset($_SESSION['userId'])) {
	header('location:'.$store_url.'dashboard.php');		
}

$errors = array();

if($_POST) {		

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Entrez un Nom d' Utilisateur";
		} 

		if($password == "") {
			$errors[] = "Entrez un Mot de Passe ";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];

				// set session
				
				$_SESSION['userId'] = $user_id;
				$_SESSION['username']=$username;
				if($value['TypeUser']==0){
				header('location:'.$store_url.'dashboard.php');
				
			    }else{
					if($value['TypeUser']==1)
					header('location:'.$store_url.'dashboardS.php');
				}
				//ADD HERE AN OTHER LINK FOR SIMPLE USER INTERFACE 
			
			} else{
				
				$errors[] = "Nom utilisateur / Mot Passe Incorrect ";
			} // /else
		} else {		
			$errors[] = "Utilisateur n'existe Pas !! ";		
		} // /else
	} // /else not empty username // password
	
} // /if $_POST
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">	

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row vertical">
			<div class="col-md-5 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Login</h3>
					</div>
					<div class="logo">
					  <br>
                      <img src="/images/logo.png" alt="texte alternatif"/>
                      <link rel="stylesheet" href="C:\Users\Rim\Desktop\stage 1\login.css">
                      <br>
					</div>
					<div class="panel-body">

						<div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
							<fieldset>
							  <div class="form-group">
								    <br>
									<label for="username" class="col-sm-2 control-label">Nom </label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="username" name="username" placeholder="Nom Utilisateur " autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Mot Passe</label>
									<div class="col-sm-10">
									  <input type="password" class="form-control" id="password" name="password" placeholder="Mot Passe" autocomplete="off" />
									</div>
								</div>								
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" class="btn btn-success"> <i class="glyphicon glyphicon-log-in"></i> Log In</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->	
	<style type="text/css">
		.logo {
         width: 200px;
         margin: auto;
        }

       .logo img {
        width: 110%;
        height: 60px;
        box-shadow: 0px 0px 3px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
       }
    </style>
</body>

</html>
<!--Created By : Rim ELBADDAZI / EMSI RABAT -->







	