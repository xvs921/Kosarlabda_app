<?php
  include("classes/regisztracioclasses.php");
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kosárlabda játék regisztráció</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">	 
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
  <div class="container-fluid">
    <form method="POST">
	  <div class="row">
        <div class="col-md-4 col-md-offset-4 col-centered">
            <div class="login-panel">
				<center><h1 class="login-panel-title">Kosárlabda játék regisztráció</h1></center>
                <div class="login-panel-section">
                    <div class="form-group">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                            <input class="form-control" type="text" placeholder="Felhasználónév" name="input_felhasznalonev">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                            <input class="form-control" type="text" placeholder="Email cím" name="input_email">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                            <input class="form-control" type="password" placeholder="Jelszó" name="input_jelszo">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                            <input class="form-control" type="password" placeholder="Jelszó újra" name="input_jelszo_ujra">
                        </div>
                    </div>
                    </div>
                <div class="login-panel-section">
					<input type="hidden" name="action" value="cmd_registration">
					<input type="submit" class="btn btn-default" value="Regisztráció" id="loginbtn"> | 
					<a href="index.php">Bejelentkezés</a>
                </div>
            </div>
        </div>
      </div>
	  </form>
	  </div>
<?php
        if(isset($_POST["action"]) && $_POST["action"] == "cmd_registration")
        {
          if(empty($_POST["input_felhasznalonev"]) || empty($_POST["input_email"]) || empty($_POST["input_jelszo"]) || empty($_POST["input_jelszo_ujra"]))
          {
	  		?> <script>alert("Nem adott meg egy szükséges adatot!")</script><?php
          }
          else
          {     
            $data = new Regisztracio();
            $data->connect();
            $data->regisztracio($_POST["input_felhasznalonev"], $_POST["input_email"], $_POST["input_jelszo"], $_POST["input_jelszo_ujra"]);
            $data->disconnect();
          }
        }?>
  </body>
</html>