<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/hospedeDAO.php");
	
	$cpf = $_POST['cpf'];
	
	// Estabelece conexão com o banco de dados
	$conexao = new connection();
	$conexao->conectar();
	
	$hospededao = new HospedeDao();
	//Verifica se o cpf passado no post esta cadastrado no sistema
	$res1 = $hospededao->consultar($cpf, $conexao->getConn());
	
	// Caso o cpf exista no banco de dados
	if($res1->num_rows>0) {
		
		// Manda o cpf recebido no post por parametro para ser excluido
		$res = $hospededao->excluir($cpf, $conexao->getConn());
		
		//Caso a exclusão tenha dado certo exibe uma mensagem de sucesso na interface
		if ($res === TRUE){
		
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
						Cadastro excluido com sucesso!
					</div></body></html>";
		}
		//Caso contrario exibe uma mensagem de erro na interface
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
						Erro ao excluir cadastro!
					</div></body></html>";
		}
	}
	// Se o cpf não existir no banco de dados exibe uma mensagem de erro na interface
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
						CPF invalido!
					</div></body></html>";
	}	
?>
