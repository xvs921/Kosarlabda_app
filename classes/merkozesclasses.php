<?php
include("classes/jatekoskartyaclasses.php");
class Merkozes extends Jatekos
{
	public function sajatJatekoslista()
	{
		$this->sql = "SELECT `jatekosok.id` FROM csapattagok WHERE `csapatok.id`='".$_SESSION["sajatId"]."' AND kezdo=1";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["jatekosok.id"];
	}

	public function sajatCsapatnev()
	{
		$this->sql = "SELECT * FROM felhasznalok f 
		LEFT JOIN csapatok cs on cs.id=f.`csapatok.id`
		where f.id='".$_SESSION["bejelentkezettAllapot"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["nev"];
	}
	public function ellenfelCsapatnev()
	{
		$this->sql = "SELECT nev FROM csapatok WHERE id='".$_SESSION["ellenfelId"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["nev"];
	}

	public function getJatekosAzon($azon)
	{
		$this->sql = "SELECT `jatekosok.id` FROM csapattagok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["jatekosok.id"];
	}
	public function parbaj($osszpont,$osszpont2)
	{
		if($osszpont>$osszpont2)
		{
			$_SESSION['parbajEredmeny']="A te játékosod nyert!";
			$_SESSION["eredmeny1"]++;
		}
		else if($osszpont==$osszpont2)
		{
			$_SESSION['parbajEredmeny']="Döntetlen!";
			$_SESSION["eredmeny1"]++;
			$_SESSION["eredmeny2"]++;
		}
		else
		{
			$_SESSION['parbajEredmeny']="A másik játékos nyert!";
			$_SESSION["eredmeny2"]++;
		}
	}
	
	public function sajatGyozelem()
	{
		$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1, nyert=nyert+1 WHERE id='".$_SESSION['sajatId']."'";
		$this->result = $this->conn->query($this->sql);
		$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1, vesztett=vesztett+1 WHERE id='".$_SESSION['ellenfelId']."'";
		$this->result = $this->conn->query($this->sql);
		$this->sql = "UPDATE felhasznalok SET penz=penz+5000 WHERE `csapatok.id`='".$_SESSION['sajatId']."'";
		$this->result = $this->conn->query($this->sql);
		$this->sql = "INSERT INTO `meccsek`(`datum`, `csapat1.id`, `csapat2.id`, `eredmeny1`, `eredmeny2`) VALUES (CURRENT_TIMESTAMP(),'".$_SESSION['sajatId']."','".$_SESSION['ellenfelId']."','".$_SESSION['eredmeny1']."','".$_SESSION['eredmeny2']."')";
		$this->result = $this->conn->query($this->sql);
	}
	public function ellenfelGyozelem()
	{
		$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1, nyert=nyert+1 WHERE id='".$_SESSION['ellenfelId']."'";
		$this->result = $this->conn->query($this->sql);
		$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1, vesztett=vesztett+1 WHERE id='".$_SESSION['sajatId']."'";
		$this->result = $this->conn->query($this->sql);
		$this->sql = "UPDATE felhasznalok SET penz=penz+2500 WHERE `csapatok.id`='".$_SESSION['ellenfelId']."'";
		$this->result = $this->conn->query($this->sql);
		$this->sql = "INSERT INTO `meccsek`(`datum`, `csapat1.id`, `csapat2.id`, `eredmeny1`, `eredmeny2`) VALUES (CURRENT_TIMESTAMP(),'".$_SESSION['sajatId']."','".$_SESSION['ellenfelId']."','".$_SESSION['eredmeny1']."','".$_SESSION['eredmeny2']."')";
		$this->result = $this->conn->query($this->sql);
	}

	public function dontetlen()
	{
		$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1 WHERE id='".$_SESSION['sajatId']."'";
		$this->result = $this->conn->query($this->sql);
		$this->sql = "UPDATE csapatok SET lejatszott=lejatszott+1 WHERE id='".$_SESSION['ellenfelId']."'";
		$this->result = $this->conn->query($this->sql);
		$this->sql = "UPDATE felhasznalok SET penz=penz+2500 WHERE `csapatok.id`='".$_SESSION['sajatId']."'";
		$this->result = $this->conn->query($this->sql);
		$this->sql = "UPDATE felhasznalok SET penz=penz+2500 WHERE `csapatok.id`='".$_SESSION['ellenfelId']."'";
		$this->result = $this->conn->query($this->sql);
		$this->sql = "INSERT INTO `meccsek`(`datum`, `csapat1.id`, `csapat2.id`, `eredmeny1`, `eredmeny2`) VALUES (CURRENT_TIMESTAMP(),'".$_SESSION['sajatId']."','".$_SESSION['ellenfelId']."','".$_SESSION['eredmeny1']."','".$_SESSION['eredmeny2']."')";
		$this->result = $this->conn->query($this->sql);
	}
} ?>