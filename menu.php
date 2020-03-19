<?php
include("classes/menuclasses.php");
$session = new MenuCl();
$session->sessionIndit();
$menuMuvelet = new MenuCl();
$menuMuvelet->kapcsolodas();
//KIJELENTKEZÉS
if(isset($_GET["action"]) && $_GET["action"] == "cmd_logout")
{
	$menuMuvelet->logout();
}
//MÉRKŐZÉS
if(isset($_GET["action"]) && $_GET["action"] == "ujEllenfel")
{
	$sajatCsapat=array();
	$ellenfelCsapat=array();
	$_SESSION["eredmeny1"]=0;
	$_SESSION["eredmeny2"]=0;
	$_SESSION["parbaj"]=0;
	$_SESSION['parbajEredmeny']="";
	$_SESSION["sajatId"]=$menuMuvelet->sajatAzon();
	
	do
	{
		$_SESSION["ellenfelId"]=$menuMuvelet->ellenfelAzon();
	}
	while($_SESSION["sajatId"]==$_SESSION["ellenfelId"] || $_SESSION["ellenfelId"]==7);

	for ($i = 1; $i <= $menuMuvelet->csapattagokMaxId(); $i++) {
		if($menuMuvelet->getCsapata($i)==$_SESSION["sajatId"] and $menuMuvelet->getKezdo($i)==1)
		{
			array_push($sajatCsapat, $menuMuvelet->getJatekosAzon($i));
		}
		if($menuMuvelet->getCsapata($i)==$_SESSION["ellenfelId"] and $menuMuvelet->getKezdo($i)==1)
		{
			array_push($ellenfelCsapat, $menuMuvelet->getJatekosAzon($i));
		}
	}
	
	$_SESSION['sajatCsapat'] = $sajatCsapat;
	$_SESSION['ellenfelCsapat'] = $ellenfelCsapat;
	?><meta http-equiv="refresh" content="1; url = merkozes.php"><?php
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Menü</title>
		<link href="design/komponensek/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="design/kartyastyle.css">
		<link rel="stylesheet" href="design/menustyle.css">
	</head>
	<table class="navbar">
		<tr>
			<td class=tdPenz><?php echo number_format($menuMuvelet->felhasznalopenz(),0,",","."); ?> zseton</td>
			<td><button><a href="menu.php?action=cmd_logout"><font color="white">Kijelentkezés</font></a></button></td>
		</tr>
		<tr>
			<td colspan="2" class=trNev><?php $menuMuvelet->csapatnev(); ?></td>
		</tr>
	</table>
	<body>	
		<div class="felulet">
			<a href="csapatom.php">
				<div class="kartya">
					<div class="tartalom">
						<div class="adatok">
							<h2>Csapatom<br><span></span></h2>
						</div>
						<div class="kep">
							<i class="fa fa-users fa-5x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
			<a href="csomagok.php">
				<div class="kartya">
					<div class="tartalom">
						<div class="adatok">
							<h2>Csomagok<br><span></span></h2>
						</div>
						<div class="kep">
							<i class="fa fa-shopping-basket fa-5x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
			<a href="menu.php?action=ujEllenfel">
				<div class="kartya">
					<div class="tartalom">
						<div class="adatok">
							<h2>Mérkőzés<br><span></span></h2>
						</div>
						<div class="kep">
							<i class="fa fa-futbol-o fa-5x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
			<a href="fiokom.php">
				<div class="kartya">
					<div class="tartalom">
						<div class="adatok">
							<h2>Fiókom beállítása<br><span></span></h2>
						</div>
						<div class="kep">
							<i class="fa fa-cog fa-5x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
			<?php
			if($menuMuvelet->jogosultsagAzonositas()==3)
			{?>
			<a href="jatekosokszerk.php">
				<div class="kartya">
					<div class="tartalom">
						<div class="adatok">
							<h2>Játékosok szerkesztése<br><span></span></h2>
						</div>
						<div class="kep">
							<i class="fa fa-pencil fa-5x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
			<a href="felhasznalokszerk.php">
				<div class="kartya">
					<div class="tartalom">
						<div class="adatok">
							<h2>Felhasználók szerkesztése<br><span></span></h2>
						</div>
						<div class="kep">
							<i class="fa fa-user fa-5x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
			<?php
			}
			else if($menuMuvelet->jogosultsagAzonositas()==2)
			{?>
			<a href="jatekosokszerk.php">
				<div class="kartya">
					<div class="tartalom">
						<div class="adatok">
							<h2>Játékosok szerkesztése<br><span></span></h2>
						</div>
						<div class="kep">
							<i class="fa fa-pencil fa-5x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
			<?php
			}
			$menuMuvelet->kapcsolatbontas();
			?>
		</div>
	</body>
</html>