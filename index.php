   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
session_start();
if(!isset($_SESSION["bejelentkezi_allapot"])) { 
	$_SESSION["bejelentkezi_allapot"]=FALSE;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="indexdesign.css">
</head>
<body>

<?php if ($_SESSION["bejelentkezi_allapot"]==FALSE) { ?>
<form method="POST">
<div class="container>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h2>Bejelentkezés</h2>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="input_felhasznalonev" class="form-control" placeholder="felhaslónév">						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="input_jelszo" class="form-control" placeholder="jelszó">
					</div>
					<div class="form-group">
                        <input type="hidden" name="action" value="cmd_bejelentkezes">
						<input type="submit" value="Bejelentkezés" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
    
<?php } ?>
    
<?php if ($_SESSION["bejelentkezi_allapot"]==TRUE) { ?>
<form method="POST">
	<input type="hidden" name="action" value="cmd_kijelentkezes">
	<input type="submit" value="Kijelentkezés">
</form>
<?php } ?>

<?php
if (isset($_POST["action"]) and $_POST["action"]=="cmd_kijelentkezes"){ 
	$_SESSION["bejelentkezi_allapot"]=FALSE;
	header("Location: index.php");
}
if (isset($_POST["action"]) and $_POST["action"]=="cmd_bejelentkezes"){
	if (isset($_POST["input_felhasznalonev"]) and 
		!empty($_POST["input_felhasznalonev"]) and
		isset($_POST["input_jelszo"]) and 
		!empty($_POST["input_jelszo"])
		){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "kosarlabda_app";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "SELECT felhasznalonev, jelszo FROM felhasznalok 
					WHERE felhasznalonev = '".$_POST["input_felhasznalonev"]."' and 
						  jelszo='".$_POST["input_jelszo"]."'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) == 1) {
				echo "Van ilyen felhasználó!";
				$_SESSION["bejelentkezi_allapot"]=TRUE;
				//header("Location: termekek/index.php");
			} else {
				echo "Nincs ilyen felhasználó!";
				$_SESSION["bejelentkezi_allapot"]=FALSE;
				header("Location: index.php");
			}
			mysqli_close($conn);		
	}
}
?> 

</body>
</html>