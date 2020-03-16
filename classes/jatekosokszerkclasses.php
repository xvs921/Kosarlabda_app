<?php
include("classes/jatekoskartyaclasses.php");
class Session extends Jatekos
{
	public function getJatekosokSzama()
	{
		$this->sql = "SELECT MAX(id) FROM jatekosok";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["MAX(id)"];
	}
	
	public function getAr($azon)
	{
		$this->sql = "SELECT * FROM jatekosok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["ar"];
	}

	public function ujJatekos()
	{
		if($_POST["input_nev"]!="" && $_POST["input_osszPontszam"]!="" && $_POST["input_3pontos"]!="" && $_POST["input_zsakolas"]!="" && $_POST["input_ar"]!="" && $_POST["input_kep"]!="")
		{
			$this->meglevoJatekosNevek = "SELECT * FROM jatekosok WHERE nev = '".$_POST["input_nev"]."'";
			$this->jatekosnevekLekeres = $this->conn->query($this->meglevoJatekosNevek);
			
			if($_POST["input_osszPontszam"]>=100 || $_POST["input_osszPontszam"]<=0 || $_POST["input_3pontos"]>=100 || $_POST["input_3pontos"]<=0 || $_POST["input_zsakolas"]>=100 || $_POST["input_zsakolas"]<=0)
			{
				?> <script>alert("Hibás pontszámot adott meg! (1 és 99 közötti legyen!)")</script> <?php
			}
			else if($this->jatekosnevekLekeres->num_rows != 0)
			{
				?> <script>alert("Már létezik játékos ilyen névvel!")</script> <?php
			}
			else
			{
				$this->sql = "INSERT INTO jatekosok(nev, osszPontszam, 3pontos, zsakolas, ar, kep) VALUES ('".$_POST["input_nev"]."','".$_POST["input_osszPontszam"]."','".$_POST["input_3pontos"]."','".$_POST["input_zsakolas"]."','".$_POST["input_ar"]."','".$_POST["input_kep"]."')";
				$this->result = $this->conn->query($this->sql);
				?> <meta http-equiv="refresh" content="0; url = jatekosokszerk.php"> <?php
			}
		}
		else
		{
			?> <script>alert("Nem töltött ki egy mezőt!")</script> <?php
		}
	}
	public function jatekosModositas()
	{
		//NÉV
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
			}
			else
			{
				?> <script>alert("Sikertelen adatmódosítás!")</script> <?php	
			}	  
		} 
		//ÖSSZPONTSZÁM
		if($_POST["input_osszPontszam"]>0 && $_POST["input_osszPontszam"]<100)
		{
			$this->sql = "UPDATE jatekosok SET osszPontszam = '".$_POST["input_osszPontszam"]."' WHERE id = '".$_POST["input_id"]."'";
			$this->result = $this->conn->query($this->sql);
		}
		else if($_POST["input_osszPontszam"]<=0)
		{
			?> <script>alert("Nem lehet nulla, vagy annál kisebb!")</script> <?php	
		}
		else if($_POST["input_osszPontszam"]>=100)
		{
			?> <script>alert("Nem lehet száz, vagy annál nagyobb!")</script> <?php	
		}
		
		//3PONTOS
		if($_POST["input_3pontos"]>0 && $_POST["input_3pontos"]<100)
		{
			$this->sql = "UPDATE jatekosok SET 3pontos = '".$_POST["input_3pontos"]."' WHERE id = '".$_POST["input_id"]."'";
			$this->result = $this->conn->query($this->sql);
		}
		else if($_POST["input_3pontos"]<=0)
		{
			?> <script>alert("Nem lehet nulla, vagy annál kisebb!")</script> <?php	
		}
		else if($_POST["input_3pontos"]>=100)
		{
			?> <script>alert("Nem lehet száz, vagy annál nagyobb!")</script> <?php	
		}
		
		//ZSÁKOLÁS
		if($_POST["input_zsakolas"]>0 && $_POST["input_zsakolas"]<100)
		{
			$this->sql = "UPDATE jatekosok SET zsakolas = '".$_POST["input_zsakolas"]."' WHERE id = '".$_POST["input_id"]."'";
			$this->result = $this->conn->query($this->sql);
		}
		else if($_POST["input_zsakolas"]<=0)
		{
			?> <script>alert("Nem lehet nulla, vagy annál kisebb!")</script> <?php	
		}
		else if($_POST["input_zsakolas"]>=100)
		{
			?> <script>alert("Nem lehet száz, vagy annál nagyobb!")</script> <?php	
		} 
		
		//ÁR
		if($_POST["input_ar"]>0)
		{
			$this->sql = "UPDATE jatekosok SET ar = '".$_POST["input_ar"]."' WHERE id = '".$_POST["input_id"]."'";
			$this->result = $this->conn->query($this->sql);
		}
		else if($_POST["input_zsakolas"]<=0)
		{
			?> <script>alert("Nem lehet negatív!")</script> <?php	
		}
		
		//KÉP
		$this->sql = "UPDATE jatekosok SET kep='".$_POST["input_kep"]."' WHERE id='".$_POST["input_id"]."'";
		$this->result = $this->conn->query($this->sql);
		
		?> <meta http-equiv="refresh" content="0; url = jatekosokszerk.php"> <?php
		//NEM VÁLTOZOTT
		if($this->row["nev"]==$_POST["input_nev"] and $this->row["osszPontszam"]==$_POST["input_osszPontszam"] and $this->row["3pontos"]==$_POST["input_3pontos"] and $this->row["zsakolas"]==$_POST["input_zsakolas"] and $this->row["ar"]==$_POST["input_ar"] and $this->row["kep"]==$_POST["input_kep"])
		{
			?> <script>alert("Nem változtak az adatai!")</script> <?php	
		}
	}
} ?>