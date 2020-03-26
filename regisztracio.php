<?php
include("classes/regisztracioclasses.php");
$regi = new Regiszt();
$regi->kapcsolodas();
$felv_nev="";
$felv_email="";
if(isset($_POST["action"]) && $_POST["action"] == "cmd_regisztracio")
{
	$felv_nev=$_POST["input_felhasznalonev"];
	$felv_email=$_POST["input_email"];
	if(empty($_POST["input_felhasznalonev"]) || empty($_POST["input_email"]) || empty($_POST["input_jelszo"]) || empty($_POST["input_jelszo_ujra"]))
	{
		?> <script>alert("Nem adott meg egy szükséges adatot!")</script><?php
	}
	else
	{     
		$regi->regisztracio();
	}
}
$regi->kapcsolatbontas();
?>
<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kosárlabda játék regisztráció</title>
		<link href="design/komponensek/css/bootstrap.mini.css" rel="stylesheet">	 
		<link href="design/komponensek/css/font-awesome.min.css" rel="stylesheet">
		<link href="design/komponensek/css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
			<form method="POST">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-centered">
						<div class="login-panel">
							<center><h1 class="login-panel-title">Kosárlabda játék regisztráció</h1></center>
							<div class="login-panel-section">
								<div class="form-group">
									<div class="input-group margin-bottom-sm">
										<span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
										<input class="form-control" type="text" placeholder="Felhasználónév" name="input_felhasznalonev" value="<?php echo $felv_nev ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
										<input class="form-control" type="email" placeholder="Email cím" name="input_email" value="<?php echo $felv_email ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
										<input class="form-control" type="password" placeholder="Jelszó" name="input_jelszo">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
										<input class="form-control" type="password" placeholder="Jelszó újra" name="input_jelszo_ujra">
									</div>
								</div>
							</div>
							<div class="login-panel-section">
								<input type="hidden" name="action" value="cmd_regisztracio">
								<input type="submit" class="btn btn-default" value="Regisztráció" id="loginbtn"> | 
								<a href="index.php">Bejelentkezés</a>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>