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
  
  // INDEX
  public function indexSessionStart()
	{
		session_start();
  }
  // SIGN IN
  public function signinSessionStart()
  {
    session_start();
    if(!isset($_SESSION["login_state"]))
    {
      $_SESSION["login_state"] = "";
    }
    if($_SESSION["login_state"] != "")
    {
      header("location:menu.php");
      die();
    }
  }
  public function signin($felhasznalonev, $jelszo)
  {
    $this->sql = "SELECT * FROM felhasznalok WHERE felhasznalonev = '".$felhasznalonev."'";
    $this->result = $this->conn->query($this->sql);
    if ($this->result->num_rows == 1)
    {
      $this->row = $this->result->fetch_assoc();
      if (password_verify($jelszo, $this->row["jelszo"]))
      {
        $_SESSION["login_state"] = $this->row["id"];
        header("location:menu.php");
        die();
      }
      else
      {
		  echo "Sikertelen!";
      }
    }
    else
    { 
		echo "Érvénytelen felhasználónév";
    }
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
} ?>