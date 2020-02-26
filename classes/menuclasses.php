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
  public function logout()
	{
	  $_SESSION["login_state"] = "";
	  header("location: index.php");
  }
  
	public function disconnect()
	{
		$this->conn->close();
  }
  
  public function jogosultsagAzonositas()
  {  
	$this->sql = "SELECT * FROM jogok WHERE `felhasznalok.id` = '".$_SESSION["login_state"]."'";
    $this->result = $this->conn->query($this->sql);
	return $this->result->num_rows;
  }
  public function felhasznalopenz()
  {
	$this->sql = "SELECT penz FROM felhasznalok WHERE id = '".$_SESSION["login_state"]."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	echo $this->row["penz"];  
  }
  public function csapatnev()
  {
	$this->sql = "select * from felhasznalok f 
	left join csapatok cs on cs.id=f.`csapatok.id`
	where f.id='".$_SESSION["login_state"]."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	echo $this->row["nev"];
  }
		public function sajatAzon()
	{
		$this->sql = "SELECT * FROM felhasznalok f 
	LEFT JOIN csapatok cs on cs.id=f.`csapatok.id`
	where f.id='".$_SESSION["login_state"]."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["id"];
	}
	public function ellenfelAzon()
  {
	$this->sql = "SELECT id FROM csapatok ORDER BY RAND() LIMIT 1";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["id"];
  }
} ?>