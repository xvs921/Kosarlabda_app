<?php
include("classes/felhasznalokszerkclasses.php");
$felhszerk = new FelhSzrk();
$felhszerk->kapcsolodas();
if(isset($_POST["action"]) && $_POST["action"] == "btnModositas")
{
	$felhszerk->felhasznaloModositas();
}
if(isset($_POST["action"]) && $_POST["action"] == "btnAktiv")
{
	$felhszerk->setAktivitas(1);
}
if(isset($_POST["action"]) && $_POST["action"] == "btnInaktiv")
{
	$felhszerk->setAktivitas(0);
}
?>
<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Felhasználók szerkesztése</title>
		<script src="design/komponensek/js/jquery.min.js"></script>
		<link href="design/komponensek/css/bootstrap.mini.css" rel="stylesheet" type="text/css" />
		<script src="design/komponensek/js/bootstrap.min.js"></script>
		<link href="design/felhasznalokszerkstyle.css" rel="stylesheet" type="text/css">
	</head>
	<table class="navbar">
		<tr>
			<td></td>
			<td class="visszaGomb"><button><a href="menu.php">Vissza</a></button></td>
		</tr>
	</table>
	<body>
		<?php
		for($i=1; $i<=$felhszerk->getFelhasznalokSzama(); $i++)
		{
			if(!$felhszerk->getFelhasznalonev($i)==""){
				?>
				<div class="row">
					<form method="post">
						<div class="col-lg-2 col-md-6">
							<p>Név</p>
							<input class="form-control" type="text" name="input_felhasznalonev" value="<?php echo $felhszerk->getFelhasznalonev($i);?>">
						</div>
						<div class="col-lg-2 col-md-6">
							<p>Email</p>
							<input class="form-control" type="text" name="input_email" value="<?php echo $felhszerk->getEmail($i);?>">
						</div>
						<div class="col-lg-2 col-md-6">
							<p>Csapatnév</p>
							<input class="form-control" type="text" name="input_csapatnev" value="<?php echo $felhszerk->getCsapatnev($i);?>">
						</div>
						<div class="col-lg-2 col-md-6">
							<p>Pénz</p>
							<input class="form-control" type="text" name="input_penz" value="<?php echo $felhszerk->getPenz($i);?>">
						</div>
						<div class="col-lg-2 col-md-6">
							<p>Jogosultság</p>
							<select name="input_jogosultsag" class="form-control">
								<?php
								if($felhszerk->getJogosultsag($i)==3)
								{ ?>
									<option value="3" selected>admin</option>
									<option value="2">moderátor</option>
									<option value="1">felhasználó</option>
								<?php } 
								else if($felhszerk->getJogosultsag($i)==2)
								{ ?>
									<option value="3">admin</option>
									<option value="2" selected>moderátor</option>
									<option value="1">felhasználó</option>
								<?php }
								else if($felhszerk->getJogosultsag($i)==1)
								{ ?>
									<option value="3">admin</option>
									<option value="2">moderátor</option>
									<option value="1" selected>felhasználó</option>
								<?php } ?>
							</select>
						</div>
						<div class="col-lg-2 col-md-6">
							<p>Elfogadás</p>
							<input type="hidden" name="input_id" value="<?php echo $i; ?>">
							<input type="hidden" name="action" value="btnModositas">
							<input type="submit" class="form-control" id="modositBtn" value="Módosítás" id="loginbtn">
						</div>
					</form>
					<form method="post">
						<div class="col-sm-12" style="text-align:center;">
							<input type="hidden" name="input_id" value="<?php echo $i; ?>">
							<?php
							if($felhszerk->getAktiv($i)==0)
							{
								?> <input type="hidden" name="action" value="btnAktiv">
								<input type="submit" class="btn btn-default" value="Aktivál"> <?php
							}
							else
							{
								?> <input type="hidden" name="action" value="btnInaktiv">
								<input type="submit" class="btn btn-default" value="Inaktivál"> <?php
							}
							?>
						</div>
					</form>
				</div><br />
			<?php }
		}
		$felhszerk->kapcsolatbontas();
		?>
	</body>
</html>