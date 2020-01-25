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
  public function getCsapat()
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
  }
  public function getJatekosok($azon)
  {
	$this->sql = "SELECT `jatekosok.id` FROM csapattagok WHERE id='".$azon."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["jatekosok.id"];
  }
  public function osszesCsapattag()
  {
	$this->sql = "SELECT id FROM csapattagok";
	$this->result = $this->conn->query($this->sql);
    return $this->result->num_rows;
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
	public function getKezdo($kosaras,$csapatAzon)
  {
	$this->sql = "SELECT kezdo FROM csapattagok WHERE `jatekosok.id`='".$kosaras."' AND `csapatok.id`='".$csapatAzon."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["kezdo"];
  }
} ?>