<?php
class Session
{
	public $servername = "localhost:3306";
	public $username = "root";
	public $password = "";
	public $dbname = "kosarlabdaapp";
	public $conn = NULL;
	public $sql = NULL;
	public $result = NULL;
	public $row = NULL;

public function connect()
{
	$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
	if ($this->conn->connect_error)
	{
		die ("Connection failed: " . $this->conn->connect_error);
	}
	$this->conn->query("SET NAMES 'UTF8';");
}
  
public function disconnect()
{
	$this->conn->close();
}

public function registration($felhasznalonev, $email, $jelszo, $jelszoujra)
{	
	$this->meglevoFelhasznalonevek = "SELECT * FROM felhasznalok WHERE felhasznalonev = '".$_POST["input_felhasznalonev"]."'";
    $this->meglevoEmailek = "SELECT * FROM felhasznalok WHERE email = '".$_POST["input_email"]."'";
    $this->felhasznalonevekLekeres = $this->conn->query($this->meglevoFelhasznalonevek);
    $this->emailekLekeres = $this->conn->query($this->meglevoEmailek);
    $this->uppercase = preg_match('@[A-Z]@', $jelszo);
    $this->lowercase = preg_match('@[a-z]@', $jelszo);
    $this->number = preg_match('@[0-9]@', $jelszo);
    if ($this->felhasznalonevekLekeres->num_rows == 0 && $this->emailekLekeres->num_rows == 0 && $jelszo == $jelszoujra && $this->uppercase && $this->lowercase && $this->number)
    {
      $this->sql = "INSERT INTO felhasznalok(felhasznalonev, email, jelszo,csapatok.id, penz, aktiv) VALUES ('".$felhasznalonev."', '".$email."', '".password_hash($jelszo, PASSWORD_DEFAULT)."','0','0','1')";
      if ($this->conn->query($this->sql))
      { ?>
		<script>alert("Sikeres regisztráció!")</script>
        <meta http-equiv="refresh" content="1; url = index.php"> <?php
      }
      else
      { ?>
        <script>alert("Hiba lépett fel, kérem végezze el újra!")</script>
		<?php
      }
    }
    else
    {
		if ($jelszo != $jelszoujra)
        {?>
        	<script>alert("Nem egyezik a két jelszó!")</script>
		<?php	
        }
        if (strlen($jelszo) < 8)
        {?>
        	<script>alert("A jelszó nem lehet 8 karakternél rövidebb!")</script>
		<?php	
        }
        if (!$this->uppercase || !$this->lowercase || !$this->number)
        {?>
        	<script>alert("A jelszónak tartalmaznia kell számot, kis- és nagybetűt!")</script>
		<?php	
        }
        if ($this->felhasznalonevekLekeres->num_rows != 0)
        {?>
        	<script>alert("Ez a felhasználónév foglalt!")</script>
		<?php	
        }
        if ($this->emailekLekeres->num_rows != 0)
        {
        ?>
        	<script>alert("Ez az email cím foglalt!")</script>
		<?php	
        }
    }
  }
}
?>