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
    public function csomagNyit1() {
		header("location: csomagnyit.php");
        $this->sql = "UPDATE felhasznalok SET penz=penz-5000 WHERE id= '".$_SESSION["login_state"]."'";
        $this->conn->query($this->sql);
		$_SESSION["csomagAzon"]=1;
    }
	    public function csomagNyit2() {
		header("location: csomagnyit.php");
        $this->sql = "UPDATE felhasznalok SET penz=penz-50000 WHERE id= '".$_SESSION["login_state"]."'";
        $this->conn->query($this->sql);
		$_SESSION["csomagAzon"]=2;
    }
	    public function csomagNyit3() {
		header("location: csomagnyit.php");
        $this->sql = "UPDATE felhasznalok SET penz=penz-150000 WHERE id= '".$_SESSION["login_state"]."'";
        $this->conn->query($this->sql);
			$_SESSION["csomagAzon"]=3;
    }
} ?>