<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/hospedeDAO.php");
	
	$cpf = $_POST['cpf'];
	
	$conexao = new connection();
	$conexao->conectar();
	
	
	
	$hospededao = new HospedeDao();
	$res1 = $hospededao->consultar($cpf, $conexao->getConn());
	
	if($res1->num_rows>0) {
		
		$res = $hospededao->excluir($cpf, $conexao->getConn());
		echo "Excluído com sucesso";
	}
	else {
		echo "CPF inválido";
	}
		

?>
