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
  public function csomag1()
  {
	  	/*$ar=5000;
	  	$this->sql = "SELECT penz FROM felhasznalok WHERE id='".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		$penz=$this->row["penz"];*/
	  echo 5000;
	  	/*if($penz-$ar>=0)
		{
			$_SESSION["csomag"] = 1;
	  		header("location: csomagnyit.php");
			echo $_SESSION["csomag"];
	  		$this->sql = "UPDATE felhasznalok SET penz = penz-5000 WHERE id = 1";
			$this->result = $this->conn->query($this->sql);
		}*/
  }
	  public function csomag2()
  {
	  $_SESSION["csomag"] = 2;
	  echo $_SESSION["csomag"];
	  header("location: csomagnyit.php");
  }
	  public function csomag3()
  {
	  $_SESSION["csomag"] = 3;
	  header("location: csomagnyit.php");
  }
} ?>