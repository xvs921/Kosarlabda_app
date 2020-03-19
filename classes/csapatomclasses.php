<?php
include("classes/jatekoskartyaclasses.php");
class CsapatLista extends Jatekos
{
	//CSAPATADATOK
	public function getCsapat()
	{  
		$this->sql = "SELECT `csapatok.id` FROM felhasznalok WHERE id='".$_SESSION["bejelentkezettAllapot"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["csapatok.id"];
	}
	
	public function getCsapata($azon)
	{
		$this->sql = "SELECT `csapatok.id` FROM csapattagok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["csapatok.id"];
	}
	
	public function osszesCsapattag()
	{
		$this->sql = "SELECT Max(id) FROM csapattagok";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["Max(id)"];
	}
	
	public function getCsapattagokSzama($csapatAzon)
	{
		$this->sql = "SELECT COUNT(id) FROM csapattagok WHERE `csapatok.id`='".$csapatAzon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["COUNT(id)"];
	}
	
	public function getKezdokSzama($csapatAzon)
	{
		$this->sql = "SELECT COUNT(id) FROM csapattagok WHERE kezdo=1 AND `csapatok.id`='".$csapatAzon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["COUNT(id)"];
	}
	
	//JÁTÉKOSADATOK
	public function getJatekosok($azon)
	{
		$this->sql = "SELECT `jatekosok.id` FROM csapattagok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["jatekosok.id"];
	}
	
	public function getKezdo($kosaras,$csapatAzon)
	{
		$this->sql = "SELECT kezdo FROM csapattagok WHERE `jatekosok.id`='".$kosaras."' AND `csapatok.id`='".$csapatAzon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["kezdo"];
	}
	
	//GOMBOK
	public function setKezdo()
	{
		$this->sql = "UPDATE csapattagok SET kezdo=1 WHERE `jatekosok.id`='".$_POST["kosarasId"]."' AND `csapatok.id`='".$_POST["csapatId"]."'";
		$this->result = $this->conn->query($this->sql);
		?> <meta http-equiv="refresh" content="0; url = csapatom.php"> <?php
	}
	
	public function setCsere()
	{
		$this->sql = "UPDATE csapattagok SET kezdo=0 WHERE `jatekosok.id`='".$_POST["kosarasId"]."' AND `csapatok.id`='".$_POST["csapatId"]."'";
		$this->result = $this->conn->query($this->sql);
		?> <meta http-equiv="refresh" content="0; url = csapatom.php"> <?php
	}
	
	public function setElad()
	{
		$this->sql = "UPDATE csapattagok SET `csapatok.id`= 7 WHERE `jatekosok.id`='".$_POST["kosarasId"]."' AND `csapatok.id`='".$_POST["csapatId"]."'";
		$this->result = $this->conn->query($this->sql);
		?> <meta http-equiv="refresh" content="0; url = csapatom.php"> <?php
	}
} ?>