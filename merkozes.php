<?php
include("classes/merkozesclasses.php");
$session = new Session();
$session->sessionStart();
$classes = new Session();
$classes->connect();
$sajatCsapat=array();
$ellenfelCsapat=array();
$_SESSION["eredmeny1"]=0;
$_SESSION["eredmeny2"]=0;
	for ($i = 1; $i <= $classes->csapattagokMaxId(); $i++) {
    	if($classes->getCsapata($i)==$_SESSION["sajatId"])
		{
			array_push($sajatCsapat, $classes->getJatekosAzon($i));
		}
		if($classes->getCsapata($i)==$_SESSION["ellenfelId"])
		{
			array_push($ellenfelCsapat, $classes->getJatekosAzon($i));
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mérkőzés</title>
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="design/merkozesstyle.css">
</head>
<table class="navbar">
	<tr>
		<td></td>
		<td></td>
		<td class="visszaTd"><button><a href="menu.php">Vissza</a></button></td>
	</tr>
	<tr>
		<td><h2><?php echo $classes->sajatCsapatnev() ?></h2></td>
		<td>
			<table class="eredmenySor">
				<tr>
					<td><h2><?php echo $_SESSION["eredmeny1"]; ?></h2></td>
					<td><h2>-</h2></td>
					<td><h2><?php echo $_SESSION["eredmeny2"]; ?></h2></td>
				</tr>
			</table>
		</td>
		<td><h2><?php echo $classes->ellenfelCsapatnev() ?></h2></td>
	</tr>
</table>
<body>
	<div class="testimonials">
		<?php 
		for ($i = 0; $i < 5; $i++) {
    			?>
			<?php 
			$kosaras= $sajatCsapat[$i] ?>
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
						<br />
						<form method="post">
							<input type="hidden" name="kosarasId" value="<?php echo $kosaras; ?>">
							<button id="pozicioGomb" name="action" value="btnParbaj">párbaj</button>
						</form>
					</div>
			</div>
		<?php
		}
		?>
	</div>
</body>
</html>