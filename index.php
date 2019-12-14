<?php
  include("classes.php");
  $session = new Session();
  $session->signinSessionStart(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kosárlabda játék</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/awesome-bootstrap-checkbox.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
<section>
  <span class="header-ribbon"/>
  <div class="container-fluid">
    <form method="POST">
	  <div class="row">
        <div class="col-md-4 col-md-offset-4 col-centered">
            <div class="login-panel">
				<center><h4 class="login-panel-title">Kosárlabda játék</h4></center>
                <div class="login-panel-section">
                    <div class="form-group">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                            <input class="form-control" type="text" placeholder="Felhasználónév" name="input_felhasznalonev">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                            <input class="form-control" type="password" placeholder="Jelszó" name="input_jelszo">
                        </div>
                    </div>
                        <a href="#" class="pull-right">Elfelejtett jelszó</a>
                    </div>
                <div class="login-panel-section">
					<input type="hidden" name="action" value="cmd_signin">
                    <input type="submit" class="btn btn-default" value="Bejelentkezés" id="loginbtn"> | <a href="#">Regisztráció</a>
                </div>
            </div>
        </div>
      </div>
	  </form>
	  </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
<?php
        if(isset($_POST["action"]) && $_POST["action"] == "cmd_signin")
        {
          if(empty($_POST["input_felhasznalonev"]) || empty($_POST["input_jelszo"]))
          { ?>
            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content error-modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">You have to fill all the blank!</div>
                </div>
              </div>
            </div> <?php
          }
          else
          {     
            $data = new Session();
            $data->connect();
            $data->signin($_POST["input_felhasznalonev"], $_POST["input_jelszo"]);
            $data->disconnect();
          }
        }?>
</section>
  </body>
</html>