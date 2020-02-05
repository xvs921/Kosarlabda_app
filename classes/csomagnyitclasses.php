<?php
class Sess
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
	public function csomagTipus() {
		$tipus=rand(0, 1);
		return $tipus; 
    }
	public function penzNyeremeny()
	{
		$penz=rand(500, 8000);
		$this->sql = "UPDATE felhasznalok SET penz=penz+'".$penz."' WHERE id='".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
		return $penz;
	}
	
/*public function getNev($kosaras)
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
  }*/
} ?>