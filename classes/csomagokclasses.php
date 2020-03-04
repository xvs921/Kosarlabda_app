<?php
include("classes/adatbazisclasses.php");
class Csomag extends Adatbazis
{
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
		else
		{
			?> <script>alert("Nincs elég pénzed!")</script> 
			<meta http-equiv="refresh" tartalom="1; url = csomagok.php"> <?php
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
		else
		{
			?> <script>alert("Nincs elég pénzed!")</script> 
			<meta http-equiv="refresh" tartalom="1; url = csomagok.php"> <?php
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
		else
		{
			?> <script>alert("Nincs elég pénzed!")</script>
			<meta http-equiv="refresh" tartalom="1; url = csomagok.php"> <?php
		}
	}
} ?>