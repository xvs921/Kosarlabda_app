<?php
include("classes/csomagokclasses.php");
$session = new Session();
$session->sessionStart();
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
		<a href="csapatom.php">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Kezdők szerencséje<br><span></span></h2>
				</div>
				<div class="image">
					<i class="fa fa-eur fa-5x" aria-hidden="true"></i>
				</div>
			</div>
		</div>
		</a>
		<a href="xd.html">
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
		</a>
		<a href="xd.html">
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
		</a>		
	</div>
</body>
</html>