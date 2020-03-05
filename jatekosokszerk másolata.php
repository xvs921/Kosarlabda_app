<?php
  include("classes/jatekosokszerkclasses.php");
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
	  <link rel="stylesheet" type="text/css" href="design/felhasznalokszerkstyle.css">	  
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
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnNev">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <p>Összpontszám</p>
				  <input class="form-control" type="text" name="input_osszPontszam" value="<?php echo $felhszerk->getOsszPontszam($i);?>">
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnOsszPontszam">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <p>Hárompontos</p>
				  <input class="form-control" type="text" name="input_3pontos" value="<?php echo $felhszerk->get3pontos($i);?>">
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btn3pontos">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <p>Zsákolás</p>
				  <input class="form-control" type="text" name="input_zsakolas" value="<?php echo $felhszerk->getZsakolas($i);?>">
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnZsakolas">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <p>Ár</p>
				  <input class="form-control" type="text" name="input_ar" value="<?php echo $felhszerk->getAr($i);?>">
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnAr">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <p>Kép</p>
				  <input class="form-control" type="text" name="input_kep" value="<?php echo $felhszerk->getKep($i);?>">
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnKep">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
		</div>
	  	<br />
		<?php
		}
	}
	  	if(isset($_POST["action"]) && $_POST["action"] == "btnNev")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->setNev();
			$adatok->disconnect();
		}
	  	  	if(isset($_POST["action"]) && $_POST["action"] == "btnOsszPontszam")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->setOsszPontszam();
			$adatok->disconnect();
		}
	  	  	  	if(isset($_POST["action"]) && $_POST["action"] == "btn3pontos")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->set3pontos();
			$adatok->disconnect();
		}
	    	  	if(isset($_POST["action"]) && $_POST["action"] == "btnZsakolas")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->setZsakolas();
			$adatok->disconnect();
		}
	  	    	  	if(isset($_POST["action"]) && $_POST["action"] == "btnAr")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->setAr();
			$adatok->disconnect();
		}
	  	  	    	  	if(isset($_POST["action"]) && $_POST["action"] == "btnKep")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->setKep();
			$adatok->disconnect();
		}
	  	  	  	    	  	if(isset($_POST["action"]) && $_POST["action"] == "btnFelvetel")
		{
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
				  <center><p>Név</p></center>
				  <input class="form-control" type="text" name="input_nev" value="">
				</div>
			  <div class="col-md-6">
				  <center><p>Összpontszám</p></center>
				  <input class="form-control" type="text" name="input_osszPontszam" value="">
				</div>
			  <div class="col-md-6">
				  <center><p>Hárompontos</p></center>
				  <input class="form-control" type="text" name="input_3pontos" value="">
				</div>
			  <div class="col-md-6">
				  <center><p>Zsákolás</p></center>
				  <input class="form-control" type="text" name="input_zsakolas" value="">
				</div>
			  <div class="col-md-6">
				  <center><p>Ár</p></center>
				  <input class="form-control" type="text" name="input_ar" value="">
				</div>
			  <div class="col-md-6">
				  <center><p>Kép</p></center>
				  <input class="form-control" type="text" name="input_kep" value="">
				</div>
			</div>
			 <input type="hidden" name="action" value="btnFelvetel">
			<div style="text-align:right"><input type="submit" class="btn btn-primary" value="Felvétel" id="loginbtn"></div>
		  </form>
      </div>
    </div>
  </div>
</div>
	  
	  
  </body>
</html> 			  