<?php
include("classes/adatbazisclasses.php");
class Session extends Adatbazis
{
  public function getCsapat()
  {  
	$this->sql = "SELECT `csapatok.id` FROM felhasznalok WHERE id='".$_SESSION["login_state"]."'";
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
  public function getJatekosok($azon)
  {
	$this->sql = "SELECT `jatekosok.id` FROM csapattagok WHERE id='".$azon."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["jatekosok.id"];
  }
  public function osszesCsapattag()
  {
	$this->sql = "SELECT Max(id) FROM csapattagok";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["Max(id)"];
  }
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
	public function getKezdo($kosaras,$csapatAzon)
  {
	$this->sql = "SELECT kezdo FROM csapattagok WHERE `jatekosok.id`='".$kosaras."' AND `csapatok.id`='".$csapatAzon."'";
	$this->result = $this->conn->query($this->sql);
	$this->row = $this->result->fetch_assoc();
	return $this->row["kezdo"];
  }
  public function setElad()
  {
	$this->sql = "UPDATE csapattagok SET `csapatok.id`= 2 WHERE `jatekosok.id`='".$_POST["kosarasId"]."' AND `csapatok.id`='".$_POST["csapatId"]."'";
	$this->result = $this->conn->query($this->sql);
	  	  ?>
					<meta http-equiv="refresh" content="0; url = csapatom.php">
				<?php
  }
  public function getKezdokSzama($csapatAzon)
  {
	$this->sql = "SELECT * FROM csapattagok WHERE kezdo=1 AND `csapatok.id`='".$csapatAzon."'";
	$this->result = $this->conn->query($this->sql);
    return $this->result->num_rows;
  }
  public function setKezdo()
  {
	$this->sql = "UPDATE csapattagok SET kezdo=1 WHERE `jatekosok.id`='".$_POST["kosarasId"]."' AND `csapatok.id`='".$_POST["csapatId"]."'";
	$this->result = $this->conn->query($this->sql);
	  ?>
					<meta http-equiv="refresh" content="0; url = csapatom.php">
				<?php
  }
  public function setCsere()
  {
	$this->sql = "UPDATE csapattagok SET kezdo=0 WHERE `jatekosok.id`='".$_POST["kosarasId"]."' AND `csapatok.id`='".$_POST["csapatId"]."'";
	$this->result = $this->conn->query($this->sql);
	 ?>
					<meta http-equiv="refresh" content="0; url = csapatom.php">
				<?php
  }
} ?>