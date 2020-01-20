<?php
include("classes/csapatomclasses.php");
$session = new Session();
$session->sessionStart();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menü</title>
	<link rel="stylesheet" href="design/styl.css">
</head>
<body>	

	<h1><center>Kezdőjátékosok</center></h1>
	<div class="testimonials">
		<?php
		$jatekosokListazas = new Session();
		$jatekosokListazas->connect();
		$csapatAzon=$jatekosokListazas->getCsapat();
		for($i=1;$i<=$jatekosokListazas->osszesCsapattag();$i++)
		{
			if($jatekosokListazas->getCsapata($i)==$csapatAzon)
			{
				$kosaras=$jatekosokListazas->getJatekosok($i);
				if($jatekosokListazas->getKezdo($kosaras,$csapatAzon)==1){?>
				<div class="card">
					<div class="content">
						<table id="modositoTable">
							<tr>
								<td><button id="eladGomb">elad</button></td>
							</tr>
						</table>
						<div class="image">
							<img src="kepek/jatekosok/<?php echo $jatekosokListazas->getKep($kosaras);?>">
						</div>
						<div class="details">
							<h2><?php echo $jatekosokListazas->getNev($kosaras);?></h2>
						<table>
							<tr>
								<td id="hpontTD"><?php echo $jatekosokListazas->get3pontos($kosaras);?></td>
								<td id="osszpontTD"><?php echo $jatekosokListazas->getOsszpontszam($kosaras);?></td>
								<td id="zsakolasTD"><?php echo $jatekosokListazas->getZsakolas($kosaras);?></td>
							</tr>
						</table>
						</div>
							<td><button id="pozicioGomb">csere</button></td>
					</div>
				</div>
		<?php
			}
			}
		}
		?>
	</div>
	<h1><center>Cserejátékosok</center></h1>
	<div class="testimonials">
	<?php
		for($i=1;$i<=$jatekosokListazas->osszesCsapattag();$i++)
		{
			if($jatekosokListazas->getCsapata($i)==$csapatAzon)
			{
				$kosaras=$jatekosokListazas->getJatekosok($i);
				if($jatekosokListazas->getKezdo($kosaras,$csapatAzon)==0){?>
				<div class="card">
					<div class="content">
						<table id="modositoTable">
							<tr>
								<td><button id="eladGomb">elad</button></td>
							</tr>
						</table>
						<div class="image">
							<img src="kepek/jatekosok/<?php echo $jatekosokListazas->getKep($kosaras);?>">
						</div>
						<div class="details">
							<h2><?php echo $jatekosokListazas->getNev($kosaras);?></h2>
						<table>
							<tr>
								<td id="hpontTD"><?php echo $jatekosokListazas->get3pontos($kosaras);?></td>
								<td id="osszpontTD"><?php echo $jatekosokListazas->getOsszpontszam($kosaras);?></td>
								<td id="zsakolasTD"><?php echo $jatekosokListazas->getZsakolas($kosaras);?></td>
							</tr>
						</table>
						</div>
								<td><button id="pozicioGomb">kezdő</button></td>
					</div>
				</div>
		<?php
			}
			}
		}
		$jatekosokListazas->disconnect();
		?>
	</div>
</body>
</html>