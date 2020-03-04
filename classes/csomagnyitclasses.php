<?php
include("classes/jatekoskartyaclasses.php");
class Session extends Jatekos
{
	public function fizetes($osszeg)
	{
		$this->sql = "UPDATE felhasznalok SET penz = penz-'".$osszeg."' WHERE id = '".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
	}
	
	public function csomagTipus() {
		$tipus=rand(0, 1);
		return $tipus;
	}

	public function KosarasAzon($randPont)
	{
		$this->sql = "SELECT id FROM jatekosok WHERE osszPontszam='".$randPont."' ORDER BY RAND() LIMIT 1";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["id"];
	}
	
	public function randPontJatekosokSzama($randPont)
	{
		$this->sql = "SELECT COUNT(id) FROM jatekosok WHERE osszPontszam='".$randPont."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["COUNT(id)"];
	}

	public function getMinOsszPontszam()
	{
		$this->sql = "SELECT MIN(osszpontszam) FROM jatekosok";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["MIN(osszpontszam)"];
	}
	public function getMaxOsszPontszam()
	{
		$this->sql = "SELECT Max(osszpontszam) FROM jatekosok";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["Max(osszpontszam)"];
	}
	public function getCsapattagokSzama()
	{
		$this->sql = "SELECT COUNT(id) FROM csapattagok WHERE `csapatok.id`=(SELECT `csapatok.id` FROM felhasznalok WHERE id= '".$_SESSION["login_state"]."')";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["COUNT(id)"];
	}
	public function jatekosHozzaad($jatekosid,$csapatAzon)
	{
		$this->sql = "INSERT INTO csapattagok(`csapatok.id`, `jatekosok.id`, sorszam, kezdo) VALUES ('".$csapatAzon."','".$jatekosid."',(SELECT Max(sorszam)+1 FROM csapattagok cs1 WHERE `csapatok.id`='".$csapatAzon."'),0)";
		$this->result = $this->conn->query($this->sql);
	}
	public function fizetesLehetE($osszeg)
	{
		$this->sql = "SELECT penz FROM felhasznalok WHERE id='".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		$penz=$this->row["penz"];
		if($penz-$osszeg>=0)
		{
			return 1;
		}
		else
		{
			return -1;
		}
	}
	public function getCsapatAzon()
	{
		$this->sql = "SELECT `csapatok.id` FROM felhasznalok WHERE id= '".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["csapatok.id"];
	}
	public function penzNyeremeny($minPenz,$maxPenz)
	{
		$penz=rand($minPenz,$maxPenz);
		$this->sql = "UPDATE felhasznalok SET penz=penz+'".$penz."' WHERE id='".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
		return $penz;
	}
	//JÁTÉKOS A CSAPATODBAN VAN-E
	public function csapattagE($kosaras,$csapat)
	{
		$this->sql = "SELECT * FROM csapattagok WHERE `jatekosok.id`='".$kosaras."' AND `csapatok.id`='".$csapat."'";
		$this->result = $this->conn->query($this->sql);
		return $this->result->num_rows;
	}	
	
	public function csomagElad($kosaras)
	{
		$this->sql = "UPDATE felhasznalok SET penz=penz+(SELECT ar FROM jatekosok WHERE id='".$kosaras."') WHERE id='".$_SESSION["login_state"]."'";
		$this->result = $this->conn->query($this->sql);
		?><script>alert("A csapatodban van, így az árát kapod!")</script> <?php
	}
}?>