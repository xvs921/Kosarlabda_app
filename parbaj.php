<?php
include("classes/merkozesclasses.php");
$session = new Session();
$session->sessionStart();
$classes = new Session();
$classes->connect();
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
		<td><button><a href="merkozes.php">Tovább</a></button></td>
	</tr>
</table>
<body>
	<div class="testimonials">
			<?php $kosaras=1 ?>
			<div class="card">
					<div class="content">
						<div class="image">
							<img src="kepek/jatekosok/<?php echo $classes->getKep($kosaras);?>">
						</div>
						<div class="details">
							<h2><?php echo $classes->getNev($kosaras);?></h2>
						<table class="pontszamTable">
							<tr>
								<td id="hpontTD"><?php echo $classes->get3pontos($kosaras);?></td>
								<td id="osszpontTD"><?php echo $classes->getOsszpontszam($kosaras);?></td>
								<td id="zsakolasTD"><?php echo $classes->getZsakolas($kosaras);?></td>
							</tr>
						</table>
						</div>
					</div>
			</div>
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Nagyok asztala<br><span>150 000 zseton</span></h2>
				</div>
				<div class="image">
					<i class="fa fa-bolt fa-5x" aria-hidden="true"></i>
				</div>
			</div>
			<form method="post">
				<input type="hidden" name="csomag_id" value="3">
				  <input type="hidden" name="action" value="csomag3">
				  <input type="submit" class="btn btn-default" value="Nyitás" id="loginbtn">
			</form>
		</div>
	</div>
</body>
</html>