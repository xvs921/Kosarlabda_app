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
    
  // GLOBAL
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

	public function sajatJatekoslista()
	{
	$this->sql = "SELECT `jatekosok.id` FROM csapattagok WHERE `csapatok.id`='".$_SESSION["sajatId"]."' AND kezdo=1";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["jatekosok.id"];
	}

  public function sajatCsapatnev()
  {
	$this->sql = "SELECT * FROM felhasznalok f 
	LEFT JOIN csapatok cs on cs.id=f.`csapatok.id`
	where f.id='".$_SESSION["login_state"]."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["nev"];
  }
	public function ellenfelCsapatnev()
  {
	$this->sql = "SELECT * FROM felhasznalok f 
	LEFT JOIN csapatok cs on cs.id=f.`csapatok.id`
	where f.id='".$_SESSION["ellenfelId"]."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["nev"];
  }
	
public function getJatekosAzon($azon)
  {
	$this->sql = "SELECT `jatekosok.id` FROM csapattagok WHERE id='".$azon."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["jatekosok.id"];
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
public function parbaj($osszpont,$osszpont2)
  {
	if($osszpont>$osszpont2)
	{
		$_SESSION['parbajEredmeny']="A te játékosod nyert!";
		$_SESSION["eredmeny1"]++;
	}
		else if($osszpont==$osszpont2)
		{
			$_SESSION['parbajEredmeny']="Döntetlen!";
			$_SESSION["eredmeny1"]++;
			$_SESSION["eredmeny2"]++;
		}
		else
		{
			$_SESSION['parbajEredmeny']="A másik játékos nyert!";
			$_SESSION["eredmeny2"]++;
		}
  }
public function sajatGyozelem()
  {
	$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1, nyert=nyert+1 WHERE id='".$_SESSION['sajatId']."'";
	$this->result = $this->conn->query($this->sql);
	$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1, vesztett=vesztett+1 WHERE id='".$_SESSION['ellenfelId']."'";
	$this->result = $this->conn->query($this->sql);
	
  }
	public function ellenfelGyozelem()
  {
	$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1, nyert=nyert+1 WHERE id='".$_SESSION['ellenfelId']."'";
	$this->result = $this->conn->query($this->sql);
	$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1, vesztett=vesztett+1 WHERE id='".$_SESSION['sajatId']."'";
	$this->result = $this->conn->query($this->sql);
  }
		public function dontetlen()
  {
	$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1 WHERE id='".$_SESSION['sajatId']."'";
	$this->result = $this->conn->query($this->sql);
	$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1 WHERE id='".$_SESSION['ellenfelId']."'";
	$this->result = $this->conn->query($this->sql);
  }
} ?>