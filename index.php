<?php
include("classes/indexclasses.php");
$session = new Bejelent();
$session->bejelentkezesSession();
$belepes = new Bejelent();
$belepes->kapcsolodas();
$_SESSION["reg_nev"] = 0;
if(isset($_POST["action"]) && $_POST["action"] == "cmd_signin")
{
	if(empty($_POST["input_felhasznalonev"]) || empty($_POST["input_jelszo"]))
	{
		?> <script>alert("Nem adta meg a felhasználónevet, vagy a jelszót!")</script> <?php
	}
	else
	{
		$belepes->bejelentkezes($_POST["input_felhasznalonev"], $_POST["input_jelszo"]);
	}
}
$belepes->kapcsolatbontas();
?>	
<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kosárlabda játék</title>
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
							<center><h1 class="login-panel-title">Kosárlabda játék</h1></center>
								<div class="login-panel-section">
									<div class="form-group">
										<div class="input-group margin-bottom-sm">
											<span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
											<input class="form-control" type="text" placeholder="Felhasználónév" name="input_felhasznalonev">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
											<input class="form-control" type="password" placeholder="Jelszó" name="input_jelszo">
										</div>
									</div>
									<a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=fejleszt@gmail.com&su=Elfelejtett jelszó&body=A fiókhoz tartozó felhasználónév és email cím megadása szükséges!&tf=1" class="pull-right">Elfelejtett jelszó</a>
								</div>
								<div class="login-panel-section">
									<input type="hidden" name="action" value="cmd_signin">
									<input type="submit" class="btn btn-default" value="Bejelentkezés" id="loginbtn"> | <a 	href="regisztracio.php">Regisztráció</a>
								</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>