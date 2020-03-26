<?php
class Adatbazis
{
	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "kosarlabdaapp";
	public $conn = NULL;
	public $sql = NULL;
	public $result = NULL;
	public $row = NULL;
	
	public function sessionIndit()
	{
		session_start();
		if ($_SESSION["bejelentkezettAllapot"] == "")
		{
			header("location: index.php");
			die();
		}
	}
	
	public function kapcsolodas()
	{
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error)
		{
			die ("Connection failed: " . $this->conn->connect_error);
		}
		$this->conn->query("SET NAMES 'UTF8';");
	}

	public function kapcsolatbontas()
	{
		$this->conn->close();
	}
}?>