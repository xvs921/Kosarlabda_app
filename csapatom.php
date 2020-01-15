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

	<div class="testimonials">
		<?php
		$jatekosokListazas = new Session();
		$jatekosokListazas->connect();
		$csapatAzon=$jatekosokListazas->getCsapat();
		for($i=1;$i<=$jatekosokListazas->osszesCsapattag();$i++)
		{
			if($jatekosokListazas->getCsapata($i)==$csapatAzon)
			{
				$kosaras=$jatekosokListazas->getJatekosok($i);?>
				<div class="card">
					<div class="content">
						<button>elad</button>
						<div class="image">
							<img src="kepek/jatekosok/<?php echo $jatekosokListazas->getKep($kosaras);?>">
						</div>
						<div class="details">
							<h2><?php echo $jatekosokListazas->getNev($kosaras);?></h2>
						<table>
							<tr>
								<td><?php echo $jatekosokListazas->get3pontos($kosaras);?></td>
								<td><?php echo $jatekosokListazas->getOsszpontszam($kosaras);?></td>
								<td><?php echo $jatekosokListazas->getZsakolas($kosaras);?></td>
							</tr>
						</table>
						</div>
						<button>kezdo</button>
					</div>
				</div>
		<?php
			}
		}
		$jatekosokListazas->disconnect();
		?>
	</div>
</body>
</html>