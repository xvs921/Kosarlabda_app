<?php
include("classes/csomagnyitclasses.php");
$session = new Session();
$session->sessionStart();
$tipus=$session->csomagTipus();
$ar=0;
$adatok = new Session();
$adatok->connect();
if($_SESSION["csomagAzon"]==1)
{
		$ar=5000;
		$minPenz=1;
		$maxPenz=20000;
		$randPont=Rand($adatok->getMinOsszPontszam(),85);
		if($adatok->randPontJatekosokSzama($randPont)==0)
		{
			$tipus=0;
		}
		else
		{
			$kosaras=$adatok->kosarasAzon($randPont);
			$csapatAzon=$adatok->getCsapatAzon();	
		}
	}
	if($_SESSION["csomagAzon"]==2)
	{
		$ar=50000;
		$minPenz=1000;
		$maxPenz=75000;
		$randPont=Rand(75,90);
		if($adatok->randPontJatekosokSzama($randPont)==0)
		{
			$tipus=0;
		}
		else
		{
			$kosaras=$adatok->kosarasAzon($randPont);
			$csapatAzon=$adatok->getCsapatAzon();	
		}
	}
	if($_SESSION["csomagAzon"]==3)
	{
		$ar=150000;
		$minPenz=5000;
		$maxPenz=200000;
		$randPont=Rand(80,$adatok->getMaxOsszPontszam());
		if($adatok->randPontJatekosokSzama($randPont)==0)
		{
			$tipus=0;
		}
		else
		{
			$kosaras=$adatok->kosarasAzon($randPont);
			$csapatAzon=$adatok->getCsapatAzon();	
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Csomagok</title>
		<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="design/jatekoskartyastyle.css">
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
	if( $tipus == 0 && $adatok->fizetesLehetE($ar)==1)
	{
		$adatok->fizetes($ar) ?>
		<div class="felulet">
			<div class="kartya">
				<div class="tartalom">
					<div class="kep">
						<i class="fa fa-money fa-5x" aria-hidden="true"></i>
					</div>
					<div class="adatok">
						<h2><?php echo $adatok->penzNyeremeny($minPenz,$maxPenz);?><br><span></span></h2>
					</div>
				</div>
			</div>
		</div>
	<?php }

	else if($tipus == 1 && $adatok->fizetesLehetE($ar)==1)
	{
		$adatok->fizetes($ar);
		if($adatok->csapattagE($kosaras,$csapatAzon)==0)
		{
			$adatok->jatekosHozzaad($kosaras,$csapatAzon);
		}
		else
		{
			$adatok->csomagElad($kosaras);
		} ?>
		<div class="felulet">
			<div class="kartya">
				<div class="tartalom">
					<div class="kep">
						<img src="kepek/jatekosok/<?php echo $adatok->getKep($kosaras);?>">
					</div>
					<div class="adatok">
						<h2><?php echo $adatok->getNev($kosaras); ?></h2>
						<table class="pontszamTable">
							<tr>
								<td class="hpontTD"><?php echo $adatok->get3pontos($kosaras);?></td>
								<td class="osszpontTD"><?php echo $adatok->getOsszpontszam($kosaras);?></td>
								<td class="zsakolasTD"><?php echo $adatok->getZsakolas($kosaras);?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	<?php }
		else
	{
		?> <script>alert("Nincs elég pénzed!")</script> 
		<meta http-equiv="refresh" content="0; url = csomagok.php"> <?php
	}
	?>
	</body>
</html>