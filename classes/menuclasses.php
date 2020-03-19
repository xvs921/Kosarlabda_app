<?php
include("classes/adatbazisclasses.php");
class MenuCl extends Adatbazis
{
	public function kijelentkezes()
	{
		$_SESSION["bejelentkezettAllapot"] = "";
		header("location: index.php");
	}
	//FELHASZNÁLÓ ADATAI
	public function jogosultsagAzonositas()
	{  
		$this->sql = "SELECT COUNT(id) FROM jogok WHERE `felhasznalok.id` = '".$_SESSION["bejelentkezettAllapot"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["COUNT(id)"];
	}
	
	public function felhasznalopenz()
	{
		$this->sql = "SELECT penz FROM felhasznalok WHERE id = '".$_SESSION["bejelentkezettAllapot"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["penz"];  
	}
	
	public function csapatnev()
	{
		$this->sql = "select * from felhasznalok f 
		left join csapatok cs on cs.id=f.`csapatok.id`
		where f.id='".$_SESSION["bejelentkezettAllapot"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		echo $this->row["nev"];
	}
	
	//MÉRKŐZÉS KÉT CSAPATA
	public function sajatAzon()
	{
		$this->sql = "SELECT * FROM felhasznalok f LEFT JOIN csapatok cs on cs.id=f.`csapatok.id` WHERE f.id='".$_SESSION["bejelentkezettAllapot"]."'";
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
	
	//MÉRKŐZÉS JÁTÉKOSLISTA
	public function csapattagokMaxId()
	{
		$this->sql = "SELECT MAX(id) FROM csapattagok";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["MAX(id)"];
	}
	
	public function getCsapata($azon)
	{
		$this->sql = "SELECT `csapatok.id` FROM csapattagok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["csapatok.id"];
	}
	
	public function getJatekosAzon($azon)
	{
		$this->sql = "SELECT `jatekosok.id` FROM csapattagok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["jatekosok.id"];
	}
	
	public function getKezdo($azon)
	{
		$this->sql = "SELECT kezdo FROM csapattagok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["kezdo"];
	}
} ?>