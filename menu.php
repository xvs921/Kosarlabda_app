<?php
include("menuclasses.php");
$session = new Session();
$session->sessionStart();
if(isset($_GET["action"]) && $_GET["action"] == "cmd_logout")
{
	$logout = new Session();
	$logout->logout();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menü</title>
	<link rel="stylesheet" href="menust.css">
</head>
<table class="navbar">
	<tr>
		<?php 
		$felhAdat = new Session();
		$felhAdat->connect();?>
		<td class=tdPenz><?php $felhAdat->felhasznalopenz(); ?> coin</td><?php
		$felhAdat->disconnect();?>
		<td><button><a href="menu.php?action=cmd_logout">Kijelentkezés</a></button></td>
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
		<a href="xd.html">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Csapatom<br><span></span></h2>
				</div>
				<div class="image">
					<img src="img.jpg">
				</div>
			</div>
		</div>
		</a>
		<a href="xd.html">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Csomagok<br><span></span></h2>
				</div>
				<div class="image">
					<img src="img2.png">
				</div>
			</div>
		</div>
		</a>
		<a href="xd.html">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Mérkőzés<br><span></span></h2>
				</div>
				<div class="image">
					<img src="img3.jpg">
				</div>
			</div>
		</div>
		</a>
		<a href="xd.html">
		<div class="card">
			<div class="content">
				<div class="details">
					<h2>Fiókom beállítása<br><span></span></h2>
				</div>
				<div class="image">
					<img src="img4.png">
				</div>
			</div>
		</div>
		</a>
		<?php
		$data = new Session();
		$data->connect();
		if($data->jogosultsagAzonositas()==3)
		{?>
			<a href="xd.html">
				<div class="card">
					<div class="content">
						<div class="details">
							<h2>Játékosok szerkesztése<br><span></span></h2>
						</div>
						<div class="image">
							<img src="img5.jpg">
						</div>
					</div>
				</div>
			</a>
			<a href="xd.html">
				<div class="card">
					<div class="content">
						<div class="details">
							<h2>Felhasználók szerkesztése<br><span></span></h2>
						</div>
						<div class="image">
							<img src="img6.png">
						</div>
					</div>
				</div>
			</a>
		<?php
		}
		else if($data->jogosultsagAzonositas()==2)
		{?>
			<a href="xd.html">
				<div class="card">
					<div class="content">
						<div class="details">
							<h2>Játékosok szerkesztése<br><span></span></h2>
						</div>
						<div class="image">
							<img src="img5.jpg">
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