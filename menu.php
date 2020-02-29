<?php
include("classes/menuclasses.php");
$session = new Session();
$session->sessionStart();
if(isset($_GET["action"]) && $_GET["action"] == "cmd_logout")
{
	$logout = new Session();
	$logout->logout();
}
if(isset($_GET["action"]) && $_GET["action"] == "ujEllenfel")
{
	$meccsAdat = new Session();
	$meccsAdat->connect();
	$sajatCsapat=array();
	$ellenfelCsapat=array();
		$_SESSION["eredmeny1"]=0;
	$_SESSION["eredmeny2"]=0;
	$_SESSION["parbaj"]=0;
	$_SESSION['parbajEredmeny']="";
	$_SESSION["sajatId"]=$meccsAdat->sajatAzon();
	do
	{
		$_SESSION["ellenfelId"]=$meccsAdat->ellenfelAzon();
	}
	while($_SESSION["sajatId"]==$_SESSION["ellenfelId"] || $_SESSION["ellenfelId"]==0);
		for ($i = 1; $i <= $meccsAdat->csapattagokMaxId(); $i++) {
    	if($meccsAdat->getCsapata($i)==$_SESSION["sajatId"] and $meccsAdat->getKezdo($i)==1)
		{
			array_push($sajatCsapat, $meccsAdat->getJatekosAzon($i));
		}
		if($meccsAdat->getCsapata($i)==$_SESSION["ellenfelId"] and $meccsAdat->getKezdo($i)==1)
		{
			array_push($ellenfelCsapat, $meccsAdat->getJatekosAzon($i));
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
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="design/menust.css">
</head>
<table class="navbar">
	<tr>
		<?php 
		$felhAdat = new Session();
		$felhAdat->connect();?>
		<td class=tdPenz><?php number_format($felhAdat->felhasznalopenz(),0, '.', ' '); ?> zseton</td><?php
		$felhAdat->disconnect();?>
		<td><button><a href="menu.php?action=cmd_logout"><font color="white">Kijelentkezés</font></a></button></td>
	</tr>
	<tr>
		<?php 
		$felhAdat = new Session();
		$felhAdat->connect();?>
		<td colspan="2" class=trNev><?php $felhAdat->csapatnev(); ?></td><?php
		$felhAdat->disconnect();?>
	</tr>
</table>
<body>	
	<div class="testimonials">
		<a href="csapatom.php">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Csapatom<br><span></span></h2>
				</div>
				<div class="image">
					<i class="fa fa-users fa-5x" aria-hidden="true"></i>
				</div>
			</div>
		</div>
		</a>
		<a href="csomagok.php">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Csomagok<br><span></span></h2>
				</div>
				<div class="image">
					<i class="fa fa-shopping-basket fa-5x" aria-hidden="true"></i>
				</div>
			</div>
		</div>
		</a>
		<a href="menu.php?action=ujEllenfel">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Mérkőzés<br><span></span></h2>
				</div>
				<div class="image">
					<i class="fa fa-futbol-o fa-5x" aria-hidden="true"></i>
				</div>
			</div>
		</div>
		</a>
		<a href="fiokom.php">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Fiókom beállítása<br><span></span></h2>
				</div>
				<div class="image">
					<i class="fa fa-cog fa-5x" aria-hidden="true"></i>
				</div>
			</div>
		</div>
		</a>
		<?php
		$data = new Session();
		$data->connect();
		if($data->jogosultsagAzonositas()==3)
		{?>
			<a href="jatekosokszerk.php">
				<div class="card">
					<div class="content">
						<div class="details">
							<h2>Játékosok szerkesztése<br><span></span></h2>
						</div>
						<div class="image">
							<i class="fa fa-pencil fa-5x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
			<a href="felhasznalokszerk.php">
				<div class="card">
					<div class="content">
						<div class="details">
							<h2>Felhasználók szerkesztése<br><span></span></h2>
						</div>
						<div class="image">
							<i class="fa fa-user fa-5x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
		<?php
		}
		else if($data->jogosultsagAzonositas()==2)
		{?>
			<a href="jatekosokszerk.php">
				<div class="card">
					<div class="content">
						<div class="details">
							<h2>Játékosok szerkesztése<br><span></span></h2>
						</div>
						<div class="image">
							<i class="fa fa-pencil fa-5x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
		<?php
		}
		$data->disconnect();
		?>
		
	</div>
</body>
</html>