<?php
include("classes/adatbazisclasses.php");
class Bejelent extends Adatbazis 
{
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
			if (password_verify($jelszo, $this->row["jelszo"]) && $this->row["aktiv"]==1)
			{
				$_SESSION["login_state"] = $this->row["id"];
				header("location:menu.php");
				die();
			}
			else if($this->row["aktiv"]==0)
			{
				?><script>alert("A fiókja inaktív!")</script><?php
			}
			else
			{
				?><script>alert("Hibás jelszót adott meg!")</script><?php
			}
		}
		else
		{
			?><script>alert("Nem létező felhasználónév!")</script><?php
		}
	}
} ?>