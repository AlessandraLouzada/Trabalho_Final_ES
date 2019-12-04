<!-- Fäz ä conexão com o bänco de dädos e reornä ä conexão -->
<?php
class connection {
	private $servername="localhost";
	private $username="root";
	private $password="";
	private $bd="vila nova";
	private $conn=null;
	
	function __construct() {}
	
	function conectar() {
		if($this->conn == null) {
			$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->bd);
		}
		if(!$this->conn) {
			die("Conexão falhou. $conn->connect_error");
		}
	}
	
	function getConn() {
		return $this->conn;
	}
	
}


?>
