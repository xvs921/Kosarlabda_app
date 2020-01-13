<?php
  include("classes/felhasznalokszerkclasses.php");
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Felhasználók szerkesztése</title>
	  <script src="https://code.jquery.com/jquery.min.js"></script>
	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="design/felhasznalokszerkstyle.css">
  </head>
  <body>
	<?php $felhszerk = new Session();
	$felhszerk->connect();
	for($i=1; $i<=$felhszerk->getFelhasznalokSzama(); $i++)
	{
		if(!$felhszerk->getFelhasznalonev($i)==""){
		?>
		<div class="row">
		  <div class="col-lg-2 col-md-6">Felhasználónév módosítása<br /><?php echo $felhszerk->getFelhasznalonev($i); ?></div>
		  <div class="col-lg-2  col-md-6">Email módosítása<br /><?php $felhszerk->getEmail($i); ?></div>
		  <div class="col-lg-2 col-md-6">Csapatnév módosítása<br /><?php $felhszerk->getCsapatnev($i); ?></div>
		  <div class="col-lg-2 col-md-6">Pénz módosítása<br /><?php $felhszerk->getPenz($i); ?></div>
		  <div class="col-lg-2 col-md-6">Aktivitás módosítása<br /><?php $felhszerk->getAktiv($i); ?></div>
		  <div class="col-lg-2 col-md-6">Jelszó módosítása<br />Jelszo</div>
		</div>
	  	<br />
		<?php
		}
	}
	?>
  </body>
</html>