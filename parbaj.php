<?php
include("classes/parbajclasses.php");
$session = new Session();
$session->sessionStart();
$parbaj = new Session();
$parbaj->connect();
$kosaras=$_SESSION["sajatJatekos"];
$kosaras2=$_SESSION['ellenfelJatekos'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Csomagok</title>
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="design/parbajstyle.css">
</head>
<table class="navbar">
	<tr>
		<td></td>
		<td></td>
		<td class="visszaTd"><button><a href="merkozes.php">Tovább</a></button></td>
	</tr>
</table>
<body>
	<center><h2><?php echo $_SESSION['parbajEredmeny'] ?></h2></center>
	<div class="testimonials">
			<div class="card">
					<div class="content">
						<div class="image">
							<img src="kepek/jatekosok/<?php echo $parbaj->getKep($kosaras);?>">
						</div>
						<div class="details">
							<h2><?php echo $parbaj->getNev($kosaras);?></h2>
						<table class="pontszamTable">
							<tr>
								<td id="hpontTD"><?php echo $parbaj->get3pontos($kosaras);?></td>
								<td id="osszpontTD"><?php echo $parbaj->getOsszpontszam($kosaras);?></td>
								<td id="zsakolasTD"><?php echo $parbaj->getZsakolas($kosaras);?></td>
							</tr>
						</table>
						</div>
					</div>
			</div>
			<div class="card">
					<div class="content">
						<div class="image">
							<img src="kepek/jatekosok/<?php echo $parbaj->getKep($kosaras2);?>">
						</div>
						<div class="details">
							<h2><?php echo $parbaj->getNev($kosaras2);?></h2>
						<table class="pontszamTable">
							<tr>
								<td id="hpontTD"><?php echo $parbaj->get3pontos($kosaras2);?></td>
								<td id="osszpontTD"><?php echo $parbaj->getOsszpontszam($kosaras2);?></td>
								<td id="zsakolasTD"><?php echo $parbaj->getZsakolas($kosaras2);?></td>
							</tr>
						</table>
						</div>
					</div>
			</div>
	</div>
</body>
</html>