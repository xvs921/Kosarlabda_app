<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" >
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
    
    <link rel="stylesheet" type="text/css" href="masikdesingn.css" >
</head>
<body>

<?php if ($_SESSION["bejelentkezi_allapot"]==FALSE) { ?>

<div class="container">
    <div class="login-form col-md-4 offset md-4">
        <h1 class="title">login here</h1>
    </div>
<form method="POST">
    <div class="form-group">
        <input type="text" name="input_felhasznalonev" class="form-control" placeholder="felhasználónév">
    </div>
    <div class="form-group">
        <input type="password" name="input_jelszo" class="form-control" placeholder="jelszó">
    </div>
    <input type="hidden" name="action" value="cmd_bejelentkezes">
						<input type="submit" value="Bejelentkezés" class="btn btn-primary btn-block">
    
    </form>
</div>
    
    
    
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