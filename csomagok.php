<?php
include("classes/csnyitclasses.php");
$session = new Session();
$session->sessionStart();
	  	    	  	if(isset($_POST["action"]) && $_POST["action"] == "csomag1")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->csomagNyit1();
			$adatok->disconnect();
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Csomagok</title>
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="design/csomagokstyle.css">
</head>
<table class="navbar">
	<tr>
		<td></td>
		<td><button><a href="menu.php">Vissza</a></button></td>
	</tr>
</table>
<body>
	<div class="testimonials">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Kezdők szerencséje<br><span></span></h2>
				</div>
				<div class="image">
					<i class="fa fa-eur fa-5x" aria-hidden="true"></i>
				</div>
			</div>
			<form method="post">
				<input type="hidden" name="csomag_id" value="1">
				  <input type="hidden" name="action" value="csomag1">
				  <input type="submit" class="btn btn-default" value="Nyitás" id="loginbtn">
			</form>
			</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Arany középút<br><span></span></h2>
				</div>
				<div class="image">
					<i class="fa fa-lightbulb-o fa-5x" aria-hidden="true"></i>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Nagyok asztala<br><span></span></h2>
				</div>
				<div class="image">
					<i class="fa fa-bolt fa-5x" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>
</body>
</html>