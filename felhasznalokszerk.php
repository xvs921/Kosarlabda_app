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
	  <table class="navbar">
	<tr>
		<td></td>
		<td class="visszaGomb"><button><a href="menu.php">Vissza</a></button></td>
	</tr>
  </table>
  <body>
	<?php $felhszerk = new Session();
	$felhszerk->connect();
	for($i=1; $i<=$felhszerk->getFelhasznalokSzama(); $i++)
	{
		if(!$felhszerk->getFelhasznalonev($i)==""){
		?>
		<div class="row">
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <input class="form-control" type="text" name="input_felhasznalonev" value="<?php echo $felhszerk->getFelhasznalonev($i);?>">
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnFelhnev">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <input class="form-control" type="text" name="input_email" value="<?php echo $felhszerk->getEmail($i);?>">
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnEmail">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <input class="form-control" type="text" name="input_csapatnev" value="<?php echo $felhszerk->getCsapatnev($i);?>">
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnCsapatnev">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <input class="form-control" type="text" name="input_penz" value="<?php echo $felhszerk->getPenz($i);?>">
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnPenz">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <select name="input_jogosultsag" class="form-control">
					 <?php
					 if($felhszerk->getJogosultsag($i)==3)
					 {?>
					 	<option value="1" selected>admin</option>
                  	 	<option value="2">moderátor</option>
                  	 	<option value="3">felhasználó</option><?php 
					 } 
					 else if($felhszerk->getJogosultsag($i)==2)
					 {?>
					 	<option value="1">admin</option>
                  	 	<option value="2" selected>moderátor</option>
                  	 	<option value="3">felhasználó</option><?php 
					 }
					 else
					 {?>
					 	<option value="1">admin</option>
                  	 	<option value="2">moderátor</option>
                  	 	<option value="3" selected>felhasználó</option><?php 
					 }?>
                  </select>
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnJogosultsag">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
			<form method="post">
			  <div class="col-lg-2 col-md-6">
				  <?php
					if($felhszerk->getAktiv($i)==1)
					{
						?><p class="form-control">Aktív</p><?php
					}
					else
					{
						?><p class="form-control">Inaktív</p><?php
					}
					?>
				  <input type="hidden" name="input_id" value="<?php echo $i; ?>">
				  <input type="hidden" name="action" value="btnAtivitas">
				  <input type="submit" class="btn btn-default" value="Módosítás" id="loginbtn">
				</div>
			</form>
		</div>
	  	<br />
		<?php
		}
	}
	  	if(isset($_POST["action"]) && $_POST["action"] == "btnFelhnev")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->setFelhnev();
			$adatok->disconnect();
		}
	  	  	if(isset($_POST["action"]) && $_POST["action"] == "btnEmail")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->setEmail();
			$adatok->disconnect();
		}
	  	  	  	if(isset($_POST["action"]) && $_POST["action"] == "btnCsapatnev")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->setCsapatnev();
			$adatok->disconnect();
		}
	    	  	if(isset($_POST["action"]) && $_POST["action"] == "btnJogosultsag")
		{
  			$adatok = new Session();
			$adatok->connect();
			$adatok->setJogosultsag();
			$adatok->disconnect();
		}
	?>
  </body>
</html>