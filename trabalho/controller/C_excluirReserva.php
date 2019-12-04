<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/reservaDAO.php");
	
	$nReserva = $_POST['numReserva'];
	
	// Estabelece conexão com o banco de dados
	$conexao = new connection();
	$conexao->conectar();
	
	
	
	$reservadao = new ReservaDAO();
	// Manda a reserva recebida no post por parametro para saber se ela existe no banco de dados
	$res1 = $reservadao->consultarReserva($nReserva, $conexao->getConn());
	
	//Caso ela exista
	if($res1->num_rows>0) {
		
		// Manda o numero da reserva recebida no post por parametro para ser excluida do banco de dados 
		$res = $reservadao->excluir($nReserva, $conexao->getConn());
		
		// Caso a exclusão tenha dado certo exibe uma mensagem de sucesso na interface
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
							Reserva excluida com sucesso!
						</div></body></html>";
		}
		// Caso a exclusão não tenha dado certo exibe uma mensagem de erro na interface
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
							Erro ao excluir reserva!
				</div></body></html>";
		}
	}
	// Caso o numero de reserva recebido no post não exista exibe uma mensagem de erro na interface
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
						Numero reserva invalido!
				</div></body></html>";
	}	
?>
