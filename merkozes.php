<?php
include("classes/merkozesclasses.php");
$session = new Session();
$session->sessionStart();
$classes = new Session();
$classes->connect();

if($_SESSION["parbaj"]==5)
{
	echo "vege";
	if($_SESSION["eredmeny1"]>$_SESSION["eredmeny2"])
	{
		$classes->sajatGyozelem();
	}
	else if($_SESSION["eredmeny1"]<$_SESSION["eredmeny2"])
	{
		$classes->ellenfelGyozelem();
	}
	else
	{
		$classes->dontetlen();
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
		for ($i = 0; $i <count($_SESSION['sajatCsapat']); $i++) {
			if($_SESSION['sajatCsapat'][$i]!=-1)
			{
			$kosaras=$_SESSION['sajatCsapat'][$i] ?>
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
		}
		if(isset($_POST["action"]) && $_POST["action"] == "btnParbaj")
		{	
			//saját csapat párbaj
			$_SESSION["sajatJatekos"]=$_POST["kosarasId"];
			$azon=array_search($_POST["kosarasId"], $_SESSION['sajatCsapat']);
			$csere=array($azon => -1);
			$cserel=array_replace($_SESSION['sajatCsapat'],$csere);	
			$_SESSION['sajatCsapat']=$cserel;
			//ellenfél csapat párbaj
			$ellenfelJatekos;
			do
			{
				$ellenfelJatekos=rand(0, 4);				
			}
			while($_SESSION['ellenfelCsapat'][$ellenfelJatekos] == -1);
				
				$_SESSION['ellenfelJatekos']=$_SESSION['ellenfelCsapat'][$ellenfelJatekos];
				$azon2=array_search($_SESSION['ellenfelJatekos'], $_SESSION['ellenfelCsapat']);
				$csere2=array($azon2 => -1);
				$cserel2=array_replace($_SESSION['ellenfelCsapat'],$csere2);	
				$_SESSION['ellenfelCsapat']=$cserel2;

			//párbaj
			$kosaras=$_SESSION["sajatJatekos"];
			$osszpont=$classes->getOsszpontszam($kosaras)+$classes->get3pontos($kosaras)+$classes->getZsakolas($kosaras);
			$kosaras2=$_SESSION['ellenfelJatekos'];
			$osszpont2=$classes->getOsszpontszam($kosaras2)+$classes->get3pontos($kosaras2)+$classes->getZsakolas($kosaras2);
			$classes->parbaj($osszpont,$osszpont2);
			$_SESSION["parbaj"]++;
			//echo '<pre>'; print_r($_SESSION['sajatCsapat']); echo '</pre>';
			?><meta http-equiv="refresh" content="1; url = parbaj.php"><?php
		}
		?>
	</div>
</body>
</html>