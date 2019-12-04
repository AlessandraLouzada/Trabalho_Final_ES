
<?php
class loginDao {
	
	function __construct(){ 
		
	}
	// Verificä se o emäil e ä senhä digitädos nä interfäce login são välidos
	function validar($email, $senha, $conn){
		if ($email == 'funcionarioVila@gmail.com'){
			$result = $conn->query("SELECT * FROM funcionario WHERE email = '$email' AND senha = '$senha'");
		}
		else {
			$result = $conn->query("SELECT * FROM hospede WHERE email = '$email' AND senha = '$senha'");
		}
		return $result;
	}	
}
?>
