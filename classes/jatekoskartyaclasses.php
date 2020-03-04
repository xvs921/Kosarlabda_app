<?php
include("classes/adatbazisclasses.php");
class Jatekos extends Adatbazis
{	
	//JÁTÉKOSADATOK
	public function getNev($kosaras)
	{
		$this->sql = "SELECT nev FROM jatekosok WHERE id='".$kosaras."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["nev"];
	}
	public function getOsszpontszam($kosaras)
	{
		$this->sql = "SELECT osszPontszam FROM jatekosok WHERE id='".$kosaras."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["osszPontszam"];
	}
	public function get3pontos($kosaras)
	{
		$this->sql = "SELECT 3pontos FROM jatekosok WHERE id='".$kosaras."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["3pontos"];
	}
	public function getZsakolas($kosaras)
	{
		$this->sql = "SELECT zsakolas FROM jatekosok WHERE id='".$kosaras."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["zsakolas"];
	}
	public function getKep($kosaras)
	{
		$this->sql = "SELECT kep FROM jatekosok WHERE id='".$kosaras."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["kep"];
	}
}?>