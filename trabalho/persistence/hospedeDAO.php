<?php
class hospedeDao {
	
	function __construct(){ 
		
	}
	// Ïnsere um hospede na tabela hospede

	function cadastrar($hospede, $conn) {
		$sql = "INSERT INTO hospede (nome,cpf,nasc,email,senha,telefone ) values ('".
			($hospede->getNome())."','".
			($hospede->getCpf())."','".
			($hospede->getNasc())."','".
			($hospede->getEmail())."','".
			($hospede->getSenha()). "','".
			($hospede->getTelefone())."')";
		
		if($conn->query($sql) == TRUE) {
			
			echo "<!DOCTYPE html>
					<html>
						<head>
							<link rel='stylesheet' type ='text/css' href='http://localhost/trabalho/css/home.css'>
							<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
							<meta name='viewport' content='width=device-width, initial-scale=1.0'>
							<title>Vila Nova Hotel</title>
						</head>
						<body>

							<header>
								Vila Nova<br>
								<div id='botao'>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/homeFuncionario.html'\"><font color=white>Home</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/acomodacaoFuncionario.html'\"><font color=white>Acomodações</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/servicoFuncionario.html'\"><font color=white>Serviços</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/reserva.html'\"><font color=white>Reservas</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/fReservarFuncionario.html'\"><font color=white> Fazer Reserva</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/sobreFuncionario.html'\"><font color=white>Sobre</font></button>
									<button type='button' onclick=\"window.location='http://localhost/trabalho/view/conferircadastro.html'\"><font color=white>Conferir Cadastro</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/home.html'\"><font color=white>Sair</font></button>
								</div>
							</header>
							 <div id ='aviso'>
								Dados Salvos!
							</div></body></html>";
		}
		else {
			echo "<!DOCTYPE html>
					<html>
						<head>
							<link rel='stylesheet' type ='text/css' href='http://localhost/trabalho/css/home.css'>
							<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
							<meta name='viewport' content='width=device-width, initial-scale=1.0'>
							<title>Vila Nova Hotel</title>
						</head>
						<body>

							<header>
								Vila Nova<br>
								<div id='botao'>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/homeFuncionario.html'\"><font color=white>Home</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/acomodacaoFuncionario.html'\"><font color=white>Acomodações</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/servicoFuncionario.html'\"><font color=white>Serviços</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/reserva.html'\"><font color=white>Reservas</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/fReservarFuncionario.html'\"><font color=white> Fazer Reserva</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/view/sobreFuncionario.html'\"><font color=white>Sobre</font></button>
									<button type='button' onclick=\"window.location='http://localhost/trabalho/view/conferircadastro.html'\"><font color=white>Conferir Cadastro</font></button>
									<button	type='button' onclick=\"window.location='http://localhost/trabalho/home.html'\"><font color=white>Sair</font></button>
								</div>
							</header>
							 <div id ='aviso'>
								Não Salvou Dados!
							</div></body></html>";
		}
	}
	// Selecionada os dados de um determinado hospede com o cpf passado por parametro
	function consultar($cpf, $conn){
		$res = $conn->query("SELECT nome, cpf, nasc, email, senha, telefone FROM hospede WHERE cpf=".$cpf);
		return $res;
	}
	// Exclui os dados de um determinado hospede com o cpf passado por parametro
	function excluir($cpf, $conn){
		$res = $conn->query("DELETE FROM hospede WHERE cpf=".$cpf);
		return $res;
	}
	// Altera dados de um determinado hospede pässändo parametro por os dädos ä serem älterädos
	function altera($nome, $cpf, $email, $nasc, $telefone, $senha, $conn){
		$res = $conn->query("UPDATE hospede SET email='". $email . "',nasc='".$nasc."',telefone='" . $telefone . "',nome='" . $nome . "',senha='" . $senha . "'WHERE cpf=" .$cpf);
		return $res;
	}
}

?>
