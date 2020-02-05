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
	
  	public function sessionStart()
	{
		session_start();
		if ($_SESSION["login_state"] == "")
		{
			header("location: index.php");
			die();
		}
  }
	
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
  /*public function getCsapat()
  {  
	$this->sql = "SELECT `csapatok.id` FROM felhasznalok WHERE id='".$_SESSION["login_state"]."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["csapatok.id"];
  }
  public function getCsapata($azon)
  {
	$this->sql = "SELECT `csapatok.id` FROM csapattagok WHERE id='".$azon."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["csapatok.id"];
  }*/
  public function KosarasAzon($randPont)
  {
	$this->sql = "SELECT id,nev FROM jatekosok WHERE osszPontszam='".$randPont."' ORDER BY RAND() LIMIT 1";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["id"];
  }
public function getNev($kosaras)
  {
	$this->sql = "SELECT nev FROM jatekosok WHERE id='".$kosaras."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["nev"];
  }
	public function getOsszpontszam($kosaras)
  {
	$this->sql = "SELECT osszPontszam FROM jatekosok WHERE id='".$kosaras."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["osszPontszam"];
  }
	public function get3pontos($kosaras)
  {
	$this->sql = "SELECT 3pontos FROM jatekosok WHERE id='".$kosaras."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["3pontos"];
  }
		public function getZsakolas($kosaras)
  {
	$this->sql = "SELECT zsakolas FROM jatekosok WHERE id='".$kosaras."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["zsakolas"];
  }
	public function getKep($kosaras)
  {
	$this->sql = "SELECT kep FROM jatekosok WHERE id='".$kosaras."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["kep"];
  }
	public function getMinOsszPontszam()
  {
	$this->sql = "SELECT MIN(osszpontszam) FROM jatekosok";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["MIN(osszpontszam)"];
  }
public function getCsapattagokSzama()
  {
	$this->sql = "SELECT id FROM csapattagok WHERE `csapatok.id`=(SELECT `csapatok.id` FROM felhasznalok WHERE id= '".$_SESSION["login_state"]."')";
	$this->result = $this->conn->query($this->sql);
    return $this->result->num_rows;
  }
  public function jatekosHozzaad($jatekosid,$csapatAzon)
  {
	$this->sql = "INSERT INTO csapattagok(`csapatok.id`, `jatekosok.id`, sorszam, kezdo) VALUES ('".$csapatAzon."','".$jatekosid."',(SELECT Max(sorszam)+1 FROM csapattagok cs1 WHERE `csapatok.id`='".$csapatAzon."'),0)";
	$this->result = $this->conn->query($this->sql);
	 echo $this->sql;
  }
  public function getCsapatAzon()
  {
	$this->sql = "SELECT `csapatok.id` FROM felhasznalok WHERE id= '".$_SESSION["login_state"]."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["csapatok.id"];
  }
  	public function penzNyeremeny()
	{
		$penz=rand(500, 8000);
		$this->sql = "UPDATE felhasznalok SET penz=penz+'".$penz."' WHERE id='".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
		return $penz;
	}	
	/*
  public function setCsere()
  {
	$this->sql = "UPDATE csapattagok SET kezdo=0 WHERE `jatekosok.id`='".$_POST["kosarasId"]."' AND `csapatok.id`='".$_POST["csapatId"]."'";
	$this->result = $this->conn->query($this->sql);
	 ?>
					<meta http-equiv="refresh" content="0; url = csapatom.php">
				<?php
  }*/
} ?>