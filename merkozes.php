<?php
include("classes/merkozesclasses.php");
$session = new Session();
$session->sessionStart();
$classes = new Session();
$classes->connect();
$_SESSION["eredmeny1"]=0;
$_SESSION["eredmeny2"]=0;
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
			$_SESSION["sajatJatekos"]=$_POST["kosarasId"];
			$azon=array_search($_POST["kosarasId"], $_SESSION['sajatCsapat']);
			$csere=array($azon => -1);
			$cserel=array_replace($_SESSION['sajatCsapat'],$csere);	
			$_SESSION['sajatCsapat']=$cserel;
			//echo '<pre>'; print_r($_SESSION['sajatCsapat']); echo '</pre>';
			?><meta http-equiv="refresh" content="1; url = merkozes.php"><?php
		}
		?>
	</div>
</body>
</html>