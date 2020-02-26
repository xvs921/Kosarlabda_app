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
	<link rel="stylesheet" href="design/csapatomstyle.css">
</head>
		  <table class="navbar">
	<tr>
		<td></td>
		<td class="visszaGomb"><button><a href="menu.php">Vissza</a></button></td>
	</tr>
  </table>
<body>	
	<h1><center>Kezdőjátékosok</center></h1>
	<div class="testimonials">
		<?php
		$jatekosokListazas = new Session();
		$jatekosokListazas->connect();
		$csapatAzon=$jatekosokListazas->getCsapat();
		for($i=1;$i<=$jatekosokListazas->osszesCsapattag();$i++)
		{
			if($jatekosokListazas->getCsapata($i)==$csapatAzon && $jatekosokListazas->getCsapata($i)!=null)
			{
				$kosaras=$jatekosokListazas->getJatekosok($i);
				if($jatekosokListazas->getKezdo($kosaras,$csapatAzon)==1){?>
				<div class="card">
					<div class="content">
						<table id="modositoTable">
							<tr>
								<td>
								<form method="post">
									<input type="hidden" name="kosarasId" value="<?php echo $kosaras; ?>">
									<input type="hidden" name="csapatId" value="<?php echo $csapatAzon; ?>">
				  					<input type="hidden" name="action" value="btnElad">
				  					<input type="submit" class="btn btn-default" id="eladGomb" value="elad" id="loginbtn">
								</form>
								</td>
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
							<td>
								<form method="post">
									<input type="hidden" name="kosarasId" value="<?php echo $kosaras; ?>">
									<input type="hidden" name="csapatId" value="<?php echo $csapatAzon; ?>">
									<button id="pozicioGomb" name="action" value="btnCsere">csere</button>
								</form>
							</td>
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
								<td>
									<form method="post">
										<input type="hidden" name="kosarasId" value="<?php echo $kosaras; ?>">
										<input type="hidden" name="csapatId" value="<?php echo $csapatAzon; ?>">
										<input type="hidden" name="action" value="btnElad">
										<input type="submit" class="btn btn-default" id="eladGomb" value="elad" id="loginbtn">
									</form>
								</td>
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
								<td>
							<form method="post">
									<input type="hidden" name="kosarasId" value="<?php echo $kosaras; ?>">
									<input type="hidden" name="csapatId" value="<?php echo $csapatAzon; ?>">
									<button id="pozicioGomb" name="action" value="btnKezdo">kezdő</button>
								</form>
						</td>
					</div>
				</div>
<?php
}
}
}
$jatekosokListazas->disconnect();
if(isset($_POST["action"]) && $_POST["action"] == "btnElad")
{
	$adatok = new Session();
	$adatok->connect();
	$adatok->setElad();
	$adatok->disconnect();
}
if(isset($_POST["action"]) && $_POST["action"] == "btnCsere")
{
	$adatok = new Session();
	$adatok->connect();
	$adatok->setCsere();
	$adatok->disconnect();
}
if(isset($_POST["action"]) && $_POST["action"] == "btnKezdo")
{
	$adatok = new Session();
	$adatok->connect();
	$csapatAzon=$adatok->getCsapat();
	if($adatok->getKezdokSzama($csapatAzon)==5)
	{?>
		<script>alert("Előbb cserének kell beállítania egy játékost!")</script>
	<?php
	}
	else{
		$adatok->setKezdo();
	}
	$adatok->disconnect();
}
?>
	</div>
</body>
</html>