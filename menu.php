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
	<link rel="stylesheet" href="menustyle.css">
</head>
<span>
	<button><a href="menu.php?action=cmd_logout">Logout</a></button>
</span>
<body>	
	<div class="testimonials">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Csapatom<br><span></span></h2>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Csomagok<br><span></span></h2>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Mérkőzés<br><span></span></h2>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Csapatom<br><span></span></h2>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Csomagok<br><span></span></h2>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Mérkőzés<br><span></span></h2>
				</div>
			</div>
		</div>
	</div>
</body>
</html>