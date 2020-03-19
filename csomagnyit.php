<?php
include("classes/csomagnyitclasses.php");
$session = new Csnyit();
$session->sessionIndit();
$tipus=$session->csomagTipus();
$ar=0;
$csomagnyitas = new Csnyit();
$csomagnyitas->kapcsolodas();
if($_SESSION["csomagAzon"]==1)
{
	$ar=5000;
	$minPenz=1;
	$maxPenz=20000;
	$randPont=Rand($csomagnyitas->getMinOsszPontszam(),85);
	if($csomagnyitas->randPontJatekosokSzama($randPont)==0)
	{
		$tipus=0;
	}
	else
	{
		$kosaras=$csomagnyitas->kosarasAzon($randPont);
		$csapatAzon=$csomagnyitas->getCsapatAzon();	
	}
}
if($_SESSION["csomagAzon"]==2)
{
	$ar=50000;
	$minPenz=1000;
	$maxPenz=75000;
	$randPont=Rand(75,90);
	if($csomagnyitas->randPontJatekosokSzama($randPont)==0)
	{
		$tipus=0;
	}
	else
	{
		$kosaras=$csomagnyitas->kosarasAzon($randPont);
		$csapatAzon=$csomagnyitas->getCsapatAzon();	
	}
}
if($_SESSION["csomagAzon"]==3)
{
	$ar=150000;
	$minPenz=5000;
	$maxPenz=200000;
	$randPont=Rand(80,$csomagnyitas->getMaxOsszPontszam());
	if($csomagnyitas->randPontJatekosokSzama($randPont)==0)
	{
		$tipus=0;
	}
	else
	{
		$kosaras=$csomagnyitas->kosarasAzon($randPont);
		$csapatAzon=$csomagnyitas->getCsapatAzon();	
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Csomagok</title>
		<link href="design/komponensek/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="design/kartyastyle.css">
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
	if( $tipus == 0 && $csomagnyitas->fizetesLehetE($ar)==1)
	{
		$csomagnyitas->fizetes($ar) ?>
		<div class="felulet">
			<div class="kartya">
				<div class="tartalom">
					<div class="kep">
						<i class="fa fa-money fa-5x" style="color:#2B3D6B;" aria-hidden="true"></i>
					</div>
					<div class="adatok">
						<h2><?php echo $csomagnyitas->penzNyeremeny($minPenz,$maxPenz);?><br><span></span></h2>
					</div>
				</div>
			</div>
		</div>
	<?php }

	else if($tipus == 1 && $csomagnyitas->fizetesLehetE($ar)==1)
	{
		$csomagnyitas->fizetes($ar);
		if($csomagnyitas->csapattagE($kosaras,$csapatAzon)==0)
		{
			$csomagnyitas->jatekosHozzaad($kosaras,$csapatAzon);
		}
		else
		{
			$csomagnyitas->csomagElad($kosaras);
		} ?>
		<div class="felulet">
			<div class="kartya">
				<div class="tartalom">
					<div class="kep">
						<img src="kepek/jatekosok/<?php echo $csomagnyitas->getKep($kosaras);?>">
					</div>
					<div class="adatok">
						<h2><?php echo $csomagnyitas->getNev($kosaras); ?></h2>
						<table class="pontszamTable">
							<tr>
								<td class="hpontTD"><?php echo $csomagnyitas->get3pontos($kosaras);?></td>
								<td class="osszpontTD"><?php echo $csomagnyitas->getOsszpontszam($kosaras);?></td>
								<td class="zsakolasTD"><?php echo $csomagnyitas->getZsakolas($kosaras);?></td>
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
	$csomagnyitas->kapcsolatbontas();	
	?>
	</body>
</html>