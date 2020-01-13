
<?php
class Session
{
	public $servername = "localhost:3306";
	public $username = "root";
	public $password = "";
	public $dbname = "kosarlabdaapp";
	public $conn = NULL;
	public $sql = NULL;
	public $result = NULL;
	public $row = NULL;

	public function connect()
	{
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error)
		{
			die ("Connection failed: " . $this->conn->connect_error);
		}
		$this->conn->query("SET NAMES 'UTF8';");
	}

	public function disconnect()
	{
		$this->conn->close();
	}
	public function getFelhasznalokSzama()
	{
		$this->sql = "SELECT MAX(id) FROM felhasznalok";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["MAX(id)"];
	}
	public function getFelhasznalonev($azon)
	{
		$this->sql = "SELECT * FROM felhasznalok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		return $this->row["felhasznalonev"];
	}
	public function getEmail($azon)
	{
		$this->sql = "SELECT * FROM felhasznalok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		echo $this->row["email"];
	}
	public function getCsapatnev($azon)
	{
		$this->sql = "SELECT * FROM felhasznalok f 
		LEFT JOIN csapatok cs ON cs.id=f.`csapatok.id` WHERE f.id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		echo $this->row["nev"];
	}
	public function getPenz($azon)
	{
		$this->sql = "SELECT * FROM felhasznalok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		echo $this->row["penz"];
	}
	public function getAktiv($azon)
	{
		$this->sql = "SELECT * FROM felhasznalok WHERE id='".$azon."'";
		$this->result = $this->conn->query($this->sql);
		$this->row = $this->result->fetch_assoc();
		echo $this->row["aktiv"];
	}
}
?>