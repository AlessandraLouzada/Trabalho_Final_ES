<?php
class hospedeDao {
	
	function __construct(){ 
		
	}
	
	function cadastrar($hospede, $conn) {
		$sql = "INSERT INTO hospede (nome,cpf,nasc,email,senha,telefone ) values ('".
			($hospede->getNome())."','".
			($hospede->getCpf())."','".
			($hospede->getNasc())."','".
			($hospede->getEmail())."','".
			($hospede->getSenha()). "','".
			($hospede->getTelefone())."')";
		
		echo "<br>" .$sql;
		if($conn->query($sql) == TRUE) {
			echo "DADOS SALVOS.<br /><br /><a href=\"http://localhost/trabalho/home.html\">VOLTAR</a>";
		}
		else {
			die("ERRO! NÃO SALVOU OS DADOS.<br /><br /><a href=\"http://localhost/trabalho/home.html\">VOLTAR</a>");
		}
	}
	function consultar($cpf, $conn){
		$res = $conn->query("SELECT nome, cpf, nasc, email, senha, telefone FROM hospede WHERE cpf=".$cpf);
		return $res;
	}
	
	function excluir($cpf, $conn){
		$res = $conn->query("DELETE FROM hospede WHERE cpf=".$cpf);
		return $res;
	}
	
	function altera($nome, $cpf, $email, $nasc, $telefone, $senha, $conn){
		$res = $conn->query("UPDATE hospede SET email='". $email . "',nasc='".$nasc."',telefone='" . $telefone . "',nome='" . $nome . "',senha='" . $senha . "'WHERE cpf=" .$cpf);
		return $res;
	}
}

?>
