<?php
include("classes/probaclasses.php");
$session = new Session();
$session->sessionStart();
$tipus=$session->csomagTipus();
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
		<td><button><a href="csomagok.php">Tovább</a></button></td>
	</tr>
</table>
<body>
		<?php
			$adatok = new Session();
			$adatok->connect();
		if( $tipus == 0)
		{?>
	
	<div class="testimonials">
			<div class="card">
			<div class="content">
				<div class="image">
					<i class="fa fa-money fa-5x" aria-hidden="true"></i>
				</div>
				<div class="details">
					<h2><?php echo $adatok->penzNyeremeny();?><br><span></span></h2>
				</div>
			</div>
		</div>
			</div>
		<?php
		}
		?>
			<?php
		if($_SESSION["csomagAzon"]==1)
		{
			$randPont=Rand($adatok->getMinOsszPontszam(),85);
			$kosaras=$adatok->kosarasAzon($randPont);
			$csapatAzon=$adatok->getCsapatAzon();
		}
		if($_SESSION["csomagAzon"]==2)
		{
			$randPont=Rand(75,90);
			$kosaras=$adatok->kosarasAzon($randPont);
			$csapatAzon=$adatok->getCsapatAzon();
		}
		if($_SESSION["csomagAzon"]==3)
		{
			$randPont=Rand(80,$adatok->getMaxOsszPontszam());
			$kosaras=$adatok->kosarasAzon($randPont);
			$csapatAzon=$adatok->getCsapatAzon();
		}
		if($tipus == 1)
		{
			if($adatok->csapattagE($kosaras,$csapatAzon)==0)
			{
				$adatok->jatekosHozzaad($kosaras,$csapatAzon);
			}
			else
			{
				$adatok->csomagElad($kosaras);
			}
	?>
	<div class="testimonials">
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="kepek/jatekosok/<?php echo $adatok->getKep($kosaras);?>">
						</div>
						<div class="details">
							<h2><?php echo $adatok->getNev($kosaras); echo $randPont;?></h2>
						<table>
							<tr>
								<td id="hpontTD"><?php echo $adatok->get3pontos($kosaras);?></td>
								<td id="osszpontTD"><?php echo $adatok->getOsszpontszam($kosaras);?></td>
								<td id="zsakolasTD"><?php echo $adatok->getZsakolas($kosaras);?></td>
							</tr>
						</table>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>

</body>
</html>