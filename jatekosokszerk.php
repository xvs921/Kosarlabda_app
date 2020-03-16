<?php
  include("classes/jatekosokszerkclasses.php");
	$_SESSION["felv_nev"]="";
	$_SESSION["felv_osszPontszam"]="";
	$_SESSION["felv_3pontos"]="";
	$_SESSION["felv_zsakolas"]="";
	$_SESSION["felv_ar"]="";
	$_SESSION["felv_kep"]="";
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Játékosok szerkesztése</title>
	  <script src="https://code.jquery.com/jquery.min.js"></script>
	  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="design/jatekosokszerkstyle.css">	  
  </head>
	<table class="navbar">
	<tr>
		<td class="felvetelGomb"><button type="button" data-toggle="modal" data-target="#exampleModalCenter">Felvétel</button></td>
		<td class="visszaGomb"><button><a href="menu.php">Vissza</a></button></td>
	</tr>
  </table>
  <body>
	<?php $felhszerk = new Session();
	$felhszerk->connect();
	for($i=1; $i<=$felhszerk->getJatekosokSzama(); $i++)
	{
		if(!$felhszerk->getNev($i)==""){
		?>
		<div class="row">
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <p>Név</p>
				  <input class="form-control" type="text" name="input_nev" value="<?php echo $felhszerk->getNev($i);?>">
				</div>
			  <div class="col-lg-2 col-md-6">
				  <p>Összpontszám</p>
				  <input class="form-control" type="text" name="input_osszPontszam" value="<?php echo $felhszerk->getOsszPontszam($i);?>">
				</div>
			  <div class="col-lg-2 col-md-6">
				  <p>Hárompontos</p>
				  <input class="form-control" type="text" name="input_3pontos" value="<?php echo $felhszerk->get3pontos($i);?>">
				</div>
			  <div class="col-lg-2 col-md-6">
				  <p>Zsákolás</p>
				  <input class="form-control" type="text" name="input_zsakolas" value="<?php echo $felhszerk->getZsakolas($i);?>">
				</div>
			  <div class="col-lg-2 col-md-6">
				  <p>Ár</p>
				  <input class="form-control" type="text" name="input_ar" value="<?php echo $felhszerk->getAr($i) ?>">
				</div>
			  <div class="col-lg-2 col-md-6">
				  <p>Kép</p>
				  <input class="form-control" type="text" name="input_kep" value="<?php echo $felhszerk->getKep($i);?>">
				</div>
			  <div class="col-sm-12" style="text-align:center">
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnModositas">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
			</div>
			</form>
		</div>
	  	<br />
		<?php
		}
	}
	   if(isset($_POST["action"]) && $_POST["action"] == "btnModositas")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->jatekosModositas();
			$adatok->disconnect();
		}
	  	if(isset($_POST["action"]) && $_POST["action"] == "btnFelvetel")
		{	
			$_SESSION["felv_nev"]=$_POST["input_nev"];
			$_SESSION["felv_osszPontszam"]=$_POST["input_osszPontszam"];
			$_SESSION["felv_3pontos"]=$_POST["input_3pontos"];
			$_SESSION["felv_zsakolas"]=$_POST["input_zsakolas"];
			$_SESSION["felv_ar"]=$_POST["input_ar"];
			$_SESSION["felv_kep"]=$_POST["input_kep"];
  			$adatok = new Session();
			$adatok->connect();
			$adatok->ujJatekos();
			$adatok->disconnect();
		}
	?>
	 <!--- FELVÉTEL MODAL--->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
		  <center><h2 class="modal-title" id="exampleModalLongTitle">Felvétel űrlap</h2></center>
        <form method="post">
		  <div class="row">
			  <div class="col-md-6">
				  <center><p class="modalSzoveg">Név</p></center>
				  <input class="form-control" type="text" name="input_nev" value="<?php echo $_SESSION["felv_nev"]; ?>">
				</div>
			  <div class="col-md-6">
				  <center><p class="modalSzoveg">Összpontszám</p></center>
				  <input class="form-control" type="text" name="input_osszPontszam" value="<?php echo $_SESSION["felv_osszPontszam"]; ?>">
				</div>
			  <div class="col-md-6">
				  <center><p class="modalSzoveg">Hárompontos</p></center>
				  <input class="form-control" type="text" name="input_3pontos" value="<?php echo $_SESSION["felv_3pontos"]; ?>">
				</div>
			  <div class="col-md-6">
				  <center><p class="modalSzoveg">Zsákolás</p></center>
				  <input class="form-control" type="text" name="input_zsakolas" value="<?php echo $_SESSION["felv_zsakolas"]; ?>">
				</div>
			  <div class="col-md-6">
				  <center><p class="modalSzoveg">Ár</p></center>
				  <input class="form-control" type="text" name="input_ar" value="<?php echo $_SESSION["felv_ar"]; ?>">
				</div>
			  <div class="col-md-6">
				  <center><p class="modalSzoveg">Kép</p></center>
				  <input class="form-control" type="text" name="input_kep" value="<?php echo $_SESSION["felv_kep"]; ?>">
				</div>
			</div>
			<center><p class="modalSzoveg">A pontszámok 1 és 99 között kell legyenek!</p></center>
			<input type="hidden" name="action" value="btnFelvetel">
			<div style="text-align:right"><input type="submit" class="btn btn-primary" value="Felvétel" id="loginbtn"></div>
		  </form>
      </div>
    </div>
  </div>
</div>
	  
	  
  </body>
</html> 			  