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
  public function csomagNyit1()
  {
	  	$ar=5000;
	  	$this->sql = "SELECT penz FROM felhasznalok WHERE id='".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		$penz=$this->row["penz"];
	  	if($penz-$ar>=0)
		{
			$_SESSION["csomagAzon"] = 1;
	  		header("location: csomagnyit.php");
		}
  }
	  public function csomagNyit2()
  {
	  	  $ar=50000;
	  	$this->sql = "SELECT penz FROM felhasznalok WHERE id='".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		$penz=$this->row["penz"];
	  	if($penz-$ar>=0)
		{
			$_SESSION["csomagAzon"] = 2;
	  		header("location: csomagnyit.php");
		}
  }
	  public function csomagNyit3()
  {
	  	  	$ar=150000;
	  	$this->sql = "SELECT penz FROM felhasznalok WHERE id='".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		$penz=$this->row["penz"];
	  	if($penz-$ar>=0)
		{
			$_SESSION["csomagAzon"] = 3;
	  		header("location: csomagnyit.php");
		}
  }
} ?>