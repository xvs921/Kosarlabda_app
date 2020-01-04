<?php
include("indexclasses.php");
$session = new Session();
$session->sessionStart();
if(isset($_GET["action"]) && $_GET["action"] == "cmd_logout")
{
	$logout = new Session();
	$logout->logout();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Testimonials Card</title>
	<link rel="stylesheet" href="menust.css">
</head>
<table class="navbar">
	<tr><td></td><td></td><td><button><a href="menu.php?action=cmd_logout">Logout</a></button></td></tr>
</table>
<body>	
	<div class="testimonials">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Csapatom<br><span></span></h2>
				</div>
				<div class="image">
					<img src="img.jpg">
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Csomagok<br><span></span></h2>
				</div>
				<div class="image">
					<img src="img2.png">
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Mérkőzés<br><span></span></h2>
				</div>
				<div class="image">
					<img src="img3.jpg">
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Fiókom beállítása<br><span></span></h2>
				</div>
				<div class="image">
					<img src="img4.png">
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Játékosok szerkesztése<br><span></span></h2>
				</div>
				<div class="image">
					<img src="img5.jpg">
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Felhasználók szerkesztése<br><span></span></h2>
				</div>
				<div class="image">
					<img src="img6.png">
				</div>
			</div>
		</div>
	</div>
</body>
</html>