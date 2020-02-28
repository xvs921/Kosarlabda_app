<?php
include("classes/adatbazisclasses.php");
class Session extends Adatbazis
{
	public function getJatekosokSzama()
	{
		$this->sql = "SELECT MAX(id) FROM jatekosok";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["MAX(id)"];
	}
	public function getNev($azon)
	{
		$this->sql = "SELECT * FROM jatekosok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["nev"];
	}
	public function getOsszPontszam($azon)
	{
		$this->sql = "SELECT * FROM jatekosok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		echo $this->row["osszPontszam"];
	}
	public function get3pontos($azon)
	{
		$this->sql = "SELECT * FROM jatekosok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		echo $this->row["3pontos"];
	}
	public function getZsakolas($azon)
	{
		$this->sql = "SELECT * FROM jatekosok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		echo $this->row["zsakolas"];
	}
	public function getAr($azon)
	{
		$this->sql = "SELECT * FROM jatekosok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["ar"];
	}
	public function getKep($azon)
	{
		$this->sql = "SELECT * FROM jatekosok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["kep"];
	}
	public function setNev()
	{
		$this->sql = "SELECT * FROM jatekosok WHERE id='".$_POST["input_id"]."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		if($this->row["nev"]!=$_POST["input_nev"])
		{
			$this->meglevoJatekosNevek = "SELECT * FROM jatekosok WHERE nev = '".$_POST["input_nev"]."'";
			$this->jatekosnevekLekeres = $this->conn->query($this->meglevoJatekosNevek);
			if ($this->jatekosnevekLekeres->num_rows == 0)
			{
			$this->sql = "UPDATE jatekosok SET nev = '".$_POST["input_nev"]."' WHERE id = '".$_POST["input_id"]."'";
			$this->result = $this->conn->query($this->sql);
				?>
					<meta http-equiv="refresh" content="0; url = jatekosokszerk.php">
				<?php
			}
						else
			{?>
				<script>alert("Sikertelen adatmódosítás!")</script>
			<?php	
			}	  
	  	}
	  else
	  {?>
		<script>alert("Nem változtak az adatai!")</script>
	  <?php	
	  } 
	}
	public function setOsszpontszam()
	{
		if($_POST["input_osszPontszam"]>0 && $_POST["input_osszPontszam"]<100)
		{
			$this->sql = "UPDATE jatekosok SET osszPontszam = '".$_POST["input_osszPontszam"]."' WHERE id = '".$_POST["input_id"]."'";
			$this->result = $this->conn->query($this->sql);
				?>
					<meta http-equiv="refresh" content="0; url = jatekosokszerk.php">
				<?php
			}
	  else if($_POST["input_osszPontszam"]<=0)
	  {?>
		<script>alert("Nem lehet nulla, vagy annál kisebb!")</script>
	  <?php	
	  }
	  else if($_POST["input_osszPontszam"]>=100)
	  {?>
		<script>alert("Nem lehet száz, vagy annál nagyobb!")</script>
	  <?php	
	  } 
	}
		public function set3pontos()
	{
		if($_POST["input_3pontos"]>0 && $_POST["input_3pontos"]<100)
		{
			$this->sql = "UPDATE jatekosok SET 3pontos = '".$_POST["input_3pontos"]."' WHERE id = '".$_POST["input_id"]."'";
			$this->result = $this->conn->query($this->sql);
				?>
					<meta http-equiv="refresh" content="0; url = jatekosokszerk.php">
				<?php
			}
	  else if($_POST["input_3pontos"]<=0)
	  {?>
		<script>alert("Nem lehet nulla, vagy annál kisebb!")</script>
	  <?php	
	  }
	  else if($_POST["input_3pontos"]>=100)
	  {?>
		<script>alert("Nem lehet száz, vagy annál nagyobb!")</script>
	  <?php	
	  } 
	}
			public function setZsakolas()
	{
		if($_POST["input_zsakolas"]>0 && $_POST["input_zsakolas"]<100)
		{
			$this->sql = "UPDATE jatekosok SET zsakolas = '".$_POST["input_zsakolas"]."' WHERE id = '".$_POST["input_id"]."'";
			$this->result = $this->conn->query($this->sql);
				?>
					<meta http-equiv="refresh" content="0; url = jatekosokszerk.php">
				<?php
			}
	  else if($_POST["input_zsakolas"]<=0)
	  {?>
		<script>alert("Nem lehet nulla, vagy annál kisebb!")</script>
	  <?php	
	  }
	  else if($_POST["input_zsakolas"]>=100)
	  {?>
		<script>alert("Nem lehet száz, vagy annál nagyobb!")</script>
	  <?php	
	  } 
	}
				public function setAr()
	{
		if($_POST["input_ar"]>0)
		{
			$this->sql = "UPDATE jatekosok SET ar = '".$_POST["input_ar"]."' WHERE id = '".$_POST["input_id"]."'";
			$this->result = $this->conn->query($this->sql);
				?>
					<meta http-equiv="refresh" content="0; url = jatekosokszerk.php">
				<?php
			}
	  else if($_POST["input_zsakolas"]<=0)
	  {?>
		<script>alert("Nem lehet negatív!")</script>
	  <?php	
	  }
	}
	public function setKep()
	{
		$this->sql = "UPDATE felhasznalok SET kep='".$_POST["input_kep"]."' WHERE id='".$_POST["input_id"]."'";
		$this->result = $this->conn->query($this->sql);
		?>
					<meta http-equiv="refresh" content="0; url = felhasznalokszerk.php">
				<?php
	}
}
?>