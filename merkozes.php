<?php
include("classes/merkozesclasses.php");
$session = new Session();
$session->sessionStart();
$classes = new Session();
$classes->connect();
$_SESSION["vegeredmeny"]=0;
if($_SESSION["parbaj"]==5)
{
	if($_SESSION["eredmeny1"]>$_SESSION["eredmeny2"])
	{
		$classes->sajatGyozelem();
		$_SESSION["vegeredmeny"]=1;
	}
	else if($_SESSION["eredmeny1"]<$_SESSION["eredmeny2"])
	{
		$classes->ellenfelGyozelem();
		$_SESSION["vegeredmeny"]=2;
	}
	else if($_SESSION["eredmeny1"]==$_SESSION["eredmeny2"])
	{
		$classes->dontetlen();
		$_SESSION["vegeredmeny"]=3;
	}
	$_SESSION["parbaj"]=6;
	?> <script>
	var eredmeny1='<?php echo $_SESSION["eredmeny1"];?>';
	var eredmeny2='<?php echo $_SESSION["eredmeny2"];?>';
	alert("A végeredmény\n"+eredmeny1+"-"+eredmeny2)</script><?php
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
	<link rel="stylesheet" href="design/jatekoskartyastyle.css">
</head>
<table class="navbar">
	<tr>
		<td></td>
		<td></td>
		<td class="visszaTd">
			<?php if($_SESSION["parbaj"]==6)
		{?>
			<button><a href="menu.php">Tovább</a></button>
						<?php 
		}?>
		</td>
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
								<td class="hpontTD"><?php echo $classes->get3pontos($kosaras);?></td>
								<td class="osszpontTD"><?php echo $classes->getOsszpontszam($kosaras);?></td>
								<td class="zsakolasTD"><?php echo $classes->getZsakolas($kosaras);?></td>
							</tr>
						</table>
						</div>
						<br />
						<form method="post">
							<input type="hidden" name="kosarasId" value="<?php echo $kosaras; ?>">
							<button class="parbajButton" name="action" value="btnParbaj">párbaj</button>
						</form>
					</div>
			</div>
		<?php
			}
		}
		if($_SESSION["parbaj"]==6 && $_SESSION["vegeredmeny"]!=0)
		{
			?><div class="card">
				<div class="content">
					<div class="image">
						<?php if($_SESSION["vegeredmeny"]==1){?> <i class="fa fa-trophy fa-5x" aria-hidden="true"></i> <?php } else if($_SESSION["vegeredmeny"]==2){?> <i class="fa fa-times fa-5x" aria-hidden="true"></i> <?php } else if($_SESSION["vegeredmeny"]==3){?> <i class="fa fa-trophy fa" aria-hidden="true"></i> <?php }?>
					</div>
					<div class="details">
						<h2><?php if($_SESSION["vegeredmeny"]==1){echo "Nyertél";} else if($_SESSION["vegeredmeny"]==2){echo "Vesztettél";} else if($_SESSION["vegeredmeny"]==3){echo "Döntetlen";}?><br><span></span></h2>
					</div>
				</div>
			</div><?php
			$_SESSION["vegeredmeny"]=0;
		}
		else if($_SESSION["parbaj"]==6 && $_SESSION["vegeredmeny"]==0)
		{
				?> <script>alert("A mérkőzés véget ért!)</script> 
				<meta http-equiv="refresh" content="1; url = menu.php"><?php
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