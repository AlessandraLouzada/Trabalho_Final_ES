<?php
class loginDao {
	
	function __construct(){ 
		
	}
	
	function validar($email, $senha, $conn){
		$result = $conn->query("SELECT * FROM hospede WHERE email = '$email' AND senha = '$senha'");
		return $result;
	}	
}
?>
